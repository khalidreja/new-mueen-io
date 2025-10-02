<template>
    <div class="space-y-4">
        <!-- اختيار الفصل -->
        <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">
                📚 اختر الفصل
            </label>
            <select
                v-model="selectedClassId"
                @change="onClassChange"
                class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white text-gray-900"
            >
                <option value="">اختر فصلاً...</option>
                <option 
                    v-for="classItem in availableClasses" 
                    :key="classItem.id" 
                    :value="classItem.id"
                >
                    {{ classItem.name }} - {{ classItem.grade }} ({{ classItem.stage }})
                </option>
            </select>
        </div>

        <!-- اختيار الطالب -->
        <div v-if="selectedClassId && students.length > 0">
            <label class="block text-sm font-medium text-gray-700 mb-2">
                👤 اختر الطالب
            </label>
            <div class="relative">
                <select
                    v-model="selectedStudentId"
                    @change="onStudentChange"
                    class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white text-gray-900"
                >
                    <option value="">اختر طالباً...</option>
                    <option value="manual">✍️ كتابة يدوية</option>
                    <option 
                        v-for="student in students" 
                        :key="student.id" 
                        :value="student.id"
                    >
                        {{ student.name }}
                    </option>
                </select>
            </div>
        </div>

        <!-- إدخال يدوي للاسم -->
        <div v-if="showManualInput">
            <label class="block text-sm font-medium text-gray-700 mb-2">
                ✍️ اكتب اسم الطالب يدوياً
            </label>
            <input
                v-model="manualStudentName"
                @input="onManualInput"
                type="text"
                placeholder="اكتب اسم الطالب..."
                class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-gray-900"
            />
        </div>

        <!-- عرض المواد (إذا كانت مطلوبة) -->
        <div v-if="showSubjects && selectedClassSubjects.length > 0">
            <label class="block text-sm font-medium text-gray-700 mb-2">
                📖 المواد الدراسية
            </label>
            <div class="flex flex-wrap gap-2">
                <span 
                    v-for="subject in selectedClassSubjects" 
                    :key="subject"
                    class="px-3 py-1 bg-blue-100 text-blue-800 rounded-full text-sm font-medium"
                >
                    {{ subject }}
                </span>
            </div>
        </div>

        <!-- عرض معلومات الطالب المختار -->
        <div v-if="selectedStudentName" class="bg-green-50 border border-green-200 rounded-lg p-4">
            <div class="flex items-center space-x-reverse space-x-2">
                <div class="flex-shrink-0">
                    <div class="w-8 h-8 bg-green-500 rounded-full flex items-center justify-center">
                        <span class="text-white text-sm font-bold">✓</span>
                    </div>
                </div>
                <div class="flex-1">
                    <p class="text-sm font-medium text-green-800">
                        الطالب المختار: <span class="font-bold">{{ selectedStudentName }}</span>
                    </p>
                    <p v-if="selectedClassName" class="text-xs text-green-600">
                        الفصل: {{ selectedClassName }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</template>

<script setup lang="ts">
import { ref, computed, watch, onMounted } from 'vue'

// أنواع البيانات
interface Student {
    id: number
    name: string
    number: number
}

interface ClassData {
    id: number
    name: string
    stage: string
    grade: string
    subjects: string[]
    students: Student[]
}

// Props
interface Props {
    showSubjects?: boolean
    placeholder?: string
}

const props = withDefaults(defineProps<Props>(), {
    showSubjects: false,
    placeholder: 'اختر طالباً...'
})

// Emits
const emit = defineEmits<{
    studentSelected: [studentName: string, classData?: ClassData, subjects?: string[]]
    classSelected: [classData: ClassData]
}>()

// المتغيرات التفاعلية
const availableClasses = ref<ClassData[]>([])
const selectedClassId = ref<string>('')
const selectedStudentId = ref<string>('')
const manualStudentName = ref<string>('')
const loading = ref<boolean>(false)

// المتغيرات المحسوبة
const showManualInput = computed(() => selectedStudentId.value === 'manual')

const selectedClass = computed(() => {
    return availableClasses.value.find(cls => cls.id == parseInt(selectedClassId.value))
})

const students = computed(() => {
    return selectedClass.value?.students || []
})

const selectedClassName = computed(() => {
    return selectedClass.value ? `${selectedClass.value.name} - ${selectedClass.value.grade}` : ''
})

const selectedClassSubjects = computed(() => {
    return selectedClass.value?.subjects || []
})

const selectedStudentName = computed(() => {
    if (showManualInput.value) {
        return manualStudentName.value
    }
    
    const student = students.value.find(s => s.id == parseInt(selectedStudentId.value))
    return student?.name || ''
})

// مراقبة التغييرات
watch(selectedStudentName, (newName) => {
    if (newName) {
        emit('studentSelected', newName, selectedClass.value, selectedClassSubjects.value)
    }
})

watch(selectedClass, (newClass) => {
    if (newClass) {
        emit('classSelected', newClass)
    }
})

// الدوال
const loadClasses = async () => {
    loading.value = true
    try {
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content')
        
        const response = await fetch('/api/teacher-classes', {
            method: 'GET',
            headers: {
                'Accept': 'application/json',
                'Content-Type': 'application/json',
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': csrfToken || ''
            },
            credentials: 'same-origin'
        })
        
        if (response.ok) {
            const data = await response.json()
            availableClasses.value = data.classes || []
        } else {
            console.error('Failed to load classes:', response.status)
            availableClasses.value = []
        }
    } catch (error) {
        console.error('Error loading classes:', error)
        availableClasses.value = []
    } finally {
        loading.value = false
    }
}

const onClassChange = () => {
    // إعادة تعيين الطالب المختار عند تغيير الفصل
    selectedStudentId.value = ''
    manualStudentName.value = ''
}

const onStudentChange = () => {
    // مسح الإدخال اليدوي عند اختيار طالب من القائمة
    if (selectedStudentId.value !== 'manual') {
        manualStudentName.value = ''
    }
}

const onManualInput = () => {
    // مسح الطالب المختار من القائمة عند الكتابة اليدوية
    if (manualStudentName.value) {
        selectedStudentId.value = 'manual'
    }
}

// تحميل الفصول عند تحميل المكون
onMounted(() => {
    loadClasses()
})

// تصدير الدوال للاستخدام الخارجي
defineExpose({
    reset: () => {
        selectedClassId.value = ''
        selectedStudentId.value = ''
        manualStudentName.value = ''
    },
    getSelectedData: () => ({
        studentName: selectedStudentName.value,
        className: selectedClassName.value,
        classData: selectedClass.value,
        subjects: selectedClassSubjects.value
    })
})
</script>