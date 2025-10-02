<template>
    <Head title="عجلة الاختيار الذكية - منصة مُعين" />

    <ArabicDashboardLayout>
                    <div class="min-h-screen bg-gray-100 p-6 overflow-auto">
                <div class="max-w-7xl mx-auto">
                <!-- العنوان الرئيسي -->
                <div class="mb-6">
                    <h2 class="text-3xl font-bold text-gray-800 flex items-center">
                        <span class="text-4xl ml-3">🎡</span>
                        عجلة الاختيار الذكية
                    </h2>
                    <p class="text-gray-600 mt-1">
                        أداة ممتعة للاختيار العشوائي مدعومة بالذكاء الاصطناعي
                    </p>
                </div>

                <!-- تخطيط شبكي للمحتوى -->
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <!-- الجانب الأيسر: العجلة والنتيجة -->
                    <div class="space-y-6">
                        <!-- بطاقة العجلة -->
                        <div class="bg-white rounded-xl shadow-sm p-6">
                            <div class="text-center">
                                <!-- العجلة -->
                                <div class="inline-block p-6 bg-gradient-to-br from-blue-100 to-purple-100 rounded-full mb-4">
                                    <div class="w-24 h-24 md:w-32 md:h-32 bg-white rounded-full flex items-center justify-center shadow-lg">
                                        <span class="text-4xl md:text-6xl" :class="{'animate-spin': loading}">🎡</span>
                                    </div>
                                </div>
                                
                                <h3 class="text-xl font-bold text-gray-800 mb-2">عجلة الاختيار</h3>
                                <p class="text-sm text-gray-600 mb-4">
                                    انقر على الزر أدناه لتدوير العجلة
                                </p>

                                <!-- زر التدوير -->
                                <button
                                    @click="spinWheel"
                                    :disabled="loading || !hasOptions"
                                    class="w-full bg-gradient-to-r from-blue-600 to-purple-600 text-white px-6 py-3 rounded-lg font-semibold hover:from-blue-700 hover:to-purple-700 transition-all shadow-lg disabled:opacity-50 disabled:cursor-not-allowed"
                                >
                                    {{ loading ? 'جاري الاختيار...' : 'تدوير العجلة! 🎡' }}
                                </button>
                            </div>
                        </div>

                        <!-- بطاقة النتيجة -->
                        <div v-if="selectedOption" class="bg-white rounded-xl shadow-sm p-6">
                            <div class="text-center">
                                <div class="bg-gradient-to-r from-green-50 to-blue-50 rounded-xl p-6 border border-green-200">
                                    <h4 class="text-xl font-bold text-green-800 mb-2">🎉 النتيجة المختارة</h4>
                                    <p class="text-3xl font-bold text-green-700 mb-4">{{ selectedOption }}</p>
                                    
                                    <!-- إحصائيات سريعة -->
                                    <div class="grid grid-cols-2 gap-3 text-sm">
                                        <div class="bg-white p-3 rounded-lg">
                                            <div class="text-blue-600">الترتيب</div>
                                            <div class="font-bold text-blue-800">{{ options.indexOf(selectedOption) + 1 }}</div>
                                        </div>
                                        <div class="bg-white p-3 rounded-lg">
                                            <div class="text-purple-600">الاحتمالية</div>
                                            <div class="font-bold text-purple-800">{{ (100 / options.length).toFixed(1) }}%</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- الجانب الأيمن: إدخال البيانات والخيارات -->
                    <div class="space-y-6 overflow-auto max-h-screen">
                        <!-- بطاقة إدارة الخيارات -->
                        <div class="bg-white rounded-xl shadow-sm p-6">
                            <h3 class="text-lg font-bold text-gray-800 mb-4">إدارة الخيارات</h3>
                            
                            <!-- أزرار اختيار المصدر -->
                            <div class="flex flex-wrap gap-2 mb-4">
                                <button
                                    @click="dataSource = 'manual'"
                                    :class="[
                                        'px-3 py-2 rounded-lg text-sm font-medium transition-colors flex items-center gap-1',
                                        dataSource === 'manual' 
                                            ? 'bg-blue-600 text-white' 
                                            : 'bg-gray-100 text-gray-700 hover:bg-gray-200'
                                    ]"
                                >
                                    📝 يدوي
                                </button>
                                <button
                                    @click="dataSource = 'file'"
                                    :class="[
                                        'px-3 py-2 rounded-lg text-sm font-medium transition-colors flex items-center gap-1',
                                        dataSource === 'file' 
                                            ? 'bg-blue-600 text-white' 
                                            : 'bg-gray-100 text-gray-700 hover:bg-gray-200'
                                    ]"
                                >
                                    📁 ملف
                                </button>
                                <button
                                    @click="dataSource = 'classes'"
                                    :class="[
                                        'px-3 py-2 rounded-lg text-sm font-medium transition-colors flex items-center gap-1',
                                        dataSource === 'classes' 
                                            ? 'bg-blue-600 text-white' 
                                            : 'bg-gray-100 text-gray-700 hover:bg-gray-200'
                                    ]"
                                >
                                    🏫 فصول
                                </button>
                            </div>

                            <!-- الإدخال اليدوي -->
                            <div v-show="dataSource === 'manual'" class="bg-blue-50 p-4 rounded-xl border border-blue-200 overflow-auto">
                                <label for="options" class="block text-sm font-semibold text-gray-800 mb-3">
                                    ✍️ أدخل الخيارات (خيار واحد في كل سطر)
                                </label>
                                <textarea
                                    id="options"
                                    v-model="optionsText"
                                    rows="8"
                                    class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-sm bg-white font-medium text-gray-900 resize-none overflow-auto"
                                    placeholder="أحمد&#10;فاطمة&#10;محمد&#10;عائشة&#10;علي&#10;مريم"
                                ></textarea>
                                <p class="text-xs text-gray-600 mt-2 font-medium">اكتب اسم واحد في كل سطر</p>
                            </div>

                            <!-- رفع ملف نصي -->
                            <div v-show="dataSource === 'file'" class="bg-green-50 p-4 rounded-xl border border-green-200">
                                <label class="block text-sm font-semibold text-gray-800 mb-3">
                                    📁 اختر ملف نصي (.txt)
                                </label>
                                <div class="border-2 border-dashed border-blue-300 rounded-lg p-6 text-center hover:border-blue-500 hover:bg-blue-50 transition-all bg-white">
                                    <input
                                        id="fileInput"
                                        type="file"
                                        accept=".txt"
                                        @change="handleFileUpload"
                                        class="hidden"
                                        ref="fileInputRef"
                                    />
                                    <div class="space-y-3">
                                        <div class="text-4xl">📄</div>
                                        <p class="text-sm font-medium text-gray-700">اسحب الملف أو انقر للاختيار</p>
                                        <button
                                            @click="$refs.fileInputRef.click()"
                                            class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-blue-700 transition-all transform hover:scale-105 shadow-lg"
                                        >
                                            📎 اختيار ملف
                                        </button>
                                    </div>
                                </div>
                                <p class="text-xs text-gray-500 mt-1">
                                    اسم واحد في كل سطر
                                </p>
                            </div>

                            <!-- من الفصول المحفوظة -->
                            <div v-show="dataSource === 'classes'">
                                <div v-if="loadingClasses" class="text-center py-4">
                                    <div class="animate-spin rounded-full h-6 w-6 border-b-2 border-blue-600 mx-auto"></div>
                                    <p class="text-sm text-gray-600 mt-2">جاري التحميل...</p>
                                </div>
                                
                                <div v-else-if="classes.length === 0" class="text-center py-6">
                                    <div class="text-3xl mb-2">🏫</div>
                                    <p class="text-sm text-gray-700 font-medium mb-2">لا توجد فصول محفوظة</p>
                                    <p class="text-xs text-gray-500 mb-3">يجب إضافة فصول في الملف الشخصي أولاً</p>
                                    <p class="text-xs text-gray-400 mb-3">تأكد من تسجيل الدخول وإعداد الفصول في ملفك الشخصي</p>
                                    <Link 
                                        href="/teacher-profile" 
                                        class="inline-flex items-center gap-1 bg-blue-600 text-white px-3 py-2 rounded-lg text-xs font-medium hover:bg-blue-700 transition-colors"
                                    >
                                        <span>⚙️</span>
                                        إعداد الفصول
                                    </Link>
                                </div>
                                
                                <div v-else class="bg-purple-50 p-4 rounded-xl border border-purple-200">
                                    <label class="block text-sm font-semibold text-gray-800 mb-3">
                                        🏦 اختر الفصل
                                    </label>
                                    <select
                                        v-model="selectedClassId"
                                        @change="loadStudentsFromClass"
                                        class="w-full px-4 py-3 border-2 border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white text-gray-900 font-medium"
                                    >
                                        <option value="" class="text-gray-500">اختر فصلاً...</option>
                                        <option 
                                            v-for="classItem in classes" 
                                            :key="classItem.id" 
                                            :value="classItem.id"
                                            class="font-medium"
                                        >
                                            {{ classItem.name }} - {{ classItem.grade }} ({{ classItem.stage }})
                                        </option>
                                    </select>
                                    <p class="text-xs text-gray-600 mt-2 font-medium">سيتم تحميل قائمة الطلاب تلقائياً</p>
                                    
                                    <div v-if="selectedClassId && loadingStudents" class="mt-2 text-center">
                                        <div class="animate-spin rounded-full h-4 w-4 border-b-2 border-blue-600 mx-auto"></div>
                                        <p class="text-xs text-gray-600 mt-1">جاري تحميل الطلاب...</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- بطاقة عرض الخيارات -->
                        <div v-if="options.length > 0" class="bg-gradient-to-r from-indigo-50 to-purple-50 rounded-xl shadow-lg p-6 border-2 border-indigo-200">
                            <div class="flex items-center justify-between mb-4">
                                <h4 class="text-xl font-bold text-gray-800 flex items-center gap-2">
                                    🎯 الخيارات ({{ options.length }})
                                </h4>
                                <div class="flex gap-2">
                                    <button
                                        @click="shuffleOptions"
                                        class="bg-yellow-500 text-white px-3 py-2 rounded-lg font-semibold hover:bg-yellow-600 transition-all transform hover:scale-105 shadow-md text-sm"
                                        title="خلط الخيارات"
                                    >
                                        🔀 خلط
                                    </button>
                                    <button
                                        @click="clearOptions"
                                        class="bg-red-500 text-white px-3 py-2 rounded-lg font-semibold hover:bg-red-600 transition-all transform hover:scale-105 shadow-md text-sm"
                                        title="مسح الخيارات"
                                    >
                                        🗑️ مسح
                                    </button>
                                </div>
                            </div>
                            
                            <!-- عرض الخيارات في شبكة -->
                            <div class="max-h-60 overflow-auto bg-white rounded-lg p-4 border border-gray-200 scrollbar-thin scrollbar-thumb-blue-500 scrollbar-track-gray-200">
                                <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-3">
                                    <div 
                                        v-for="(option, index) in options" 
                                        :key="index"
                                        :class="[
                                            'px-3 py-2 rounded-lg text-sm text-center transition-all transform hover:scale-105 font-medium border-2',
                                            selectedOption === option 
                                                ? 'bg-gradient-to-r from-green-400 to-blue-500 text-white border-green-500 shadow-lg animate-pulse' 
                                                : 'bg-gray-50 text-gray-700 hover:bg-blue-50 border-gray-200'
                                        ]"
                                    >
                                        {{ option }}
                                        <div v-if="selectedOption === option" class="mt-1 text-lg">🏆</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- إحصائيات مفصلة للنتيجة -->
                <div v-if="selectedOption" class="mt-6">
                    <div class="bg-white rounded-xl shadow-sm p-6">
                        <h3 class="text-lg font-bold text-gray-800 mb-4">📊 إحصائيات مفصلة</h3>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                            <div class="bg-blue-50 p-4 rounded-lg text-center">
                                <div class="text-sm text-blue-600">المختار</div>
                                <div class="font-bold text-blue-800 text-lg">{{ selectedOption }}</div>
                            </div>
                            <div class="bg-purple-50 p-4 rounded-lg text-center">
                                <div class="text-sm text-purple-600">إجمالي الخيارات</div>
                                <div class="font-bold text-purple-800 text-lg">{{ options.length }}</div>
                            </div>
                            <div class="bg-green-50 p-4 rounded-lg text-center">
                                <div class="text-sm text-green-600">الترتيب</div>
                                <div class="font-bold text-green-800 text-lg">{{ options.indexOf(selectedOption) + 1 }}</div>
                            </div>
                            <div class="bg-orange-50 p-4 rounded-lg text-center">
                                <div class="text-sm text-orange-600">احتمالية الاختيار</div>
                                <div class="font-bold text-orange-800 text-lg">{{ (100 / options.length).toFixed(1) }}%</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </ArabicDashboardLayout>
</template>

<script setup>
import { Head, Link } from '@inertiajs/vue3'
import ArabicDashboardLayout from '@/layouts/ArabicDashboardLayout.vue'
import { ref, computed, onMounted } from 'vue'
import { router } from '@inertiajs/vue3'

// البيانات الأساسية
const optionsText = ref('أحمد\nفاطمة\nمحمد\nعائشة\nعلي\nمريم')
const selectedOption = ref('')
const loading = ref(false)
const dataSource = ref('manual') // manual, file, classes

// بيانات الفصول
const classes = ref([])
const selectedClassId = ref('')
const loadingClasses = ref(false)
const loadingStudents = ref(false)

// مراجع العناصر
const fileInputRef = ref(null)

// الخيارات المحسوبة
const options = computed(() => {
    return optionsText.value
        .split('\n')
        .map(option => option.trim())
        .filter(option => option.length > 0)
})

const hasOptions = computed(() => {
    return options.value.length > 0
})

// تحميل الفصول عند التحميل
onMounted(async () => {
    console.log('Wheel component mounted, loading classes...')
    await loadClasses()
})

// تحميل الفصول من الخادم
const loadClasses = async () => {
    loadingClasses.value = true
    try {
        // الحصول على CSRF token
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
            classes.value = data.classes || []
            console.log('Classes loaded:', data.classes)
        } else if (response.status === 401 || response.status === 403) {
            console.log('User not authenticated, redirecting to login')
            // إعادة توجيه للتسجيل
            window.location.href = '/login'
        } else {
            console.error('API Response error:', response.status, response.statusText)
            classes.value = []
        }
    } catch (error) {
        console.error('Error loading classes:', error)
        classes.value = []
    } finally {
        loadingClasses.value = false
    }
}

// تحميل الطلاب من الفصل المحدد
const loadStudentsFromClass = async () => {
    if (!selectedClassId.value) {
        optionsText.value = ''
        return
    }
    
    loadingStudents.value = true
    try {
        // البحث عن الفصل في البيانات المحملة محلياً
        const selectedClass = classes.value.find(c => c.id == selectedClassId.value)
        console.log('Selected class:', selectedClass)
        
        if (selectedClass && selectedClass.students) {
            const students = selectedClass.students || []
            console.log('Students found:', students)
            
            const activeStudents = students
                .filter(student => student.is_active && student.name && student.name.trim())
                .map(student => student.name.trim())
            
            console.log('Active students:', activeStudents)
            optionsText.value = activeStudents.join('\n')
        } else {
            console.log('No class or students found')
            optionsText.value = ''
        }
    } catch (error) {
        console.error('Error loading students:', error)
        optionsText.value = ''
    } finally {
        loadingStudents.value = false
    }
}

// التعامل مع رفع الملف
const handleFileUpload = (event) => {
    const file = event.target.files[0]
    if (!file) return
    
    const reader = new FileReader()
    reader.onload = (e) => {
        const content = e.target.result
        optionsText.value = content
            .split('\n')
            .map(line => line.trim())
            .filter(line => line.length > 0)
            .join('\n')
    }
    reader.readAsText(file)
}

// تدوير العجلة
const spinWheel = async () => {
    if (!hasOptions.value) return
    
    loading.value = true
    selectedOption.value = ''
    
    // محاكاة تأثير دوران العجلة
    await new Promise(resolve => setTimeout(resolve, 2000))
    
    // اختيار عشوائي
    const randomIndex = Math.floor(Math.random() * options.value.length)
    selectedOption.value = options.value[randomIndex]
    
    loading.value = false
}

// خلط الخيارات
const shuffleOptions = () => {
    const optionsArray = [...options.value]
    for (let i = optionsArray.length - 1; i > 0; i--) {
        const j = Math.floor(Math.random() * (i + 1));
        [optionsArray[i], optionsArray[j]] = [optionsArray[j], optionsArray[i]]
    }
    optionsText.value = optionsArray.join('\n')
}

// مسح الخيارات
const clearOptions = () => {
    if (confirm('هل أنت متأكد من مسح جميع الخيارات؟')) {
        optionsText.value = ''
        selectedOption.value = ''
        selectedClassId.value = ''
    }
}
</script>