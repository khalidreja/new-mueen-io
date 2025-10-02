<template>
    <Head title="إدارة خطط الدروس - منصة مُعين" />

    <ArabicDashboardLayout>
        <div class="min-h-screen bg-gray-50 dark:bg-gray-900 overflow-auto" dir="rtl">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                <!-- Header -->
                <div class="flex items-center justify-between mb-8">
                    <div>
                        <h2 class="text-3xl font-bold text-gray-800 dark:text-gray-200 flex items-center">
                            <span class="text-4xl ml-3">📚</span>
                            إدارة خطط الدروس
                        </h2>
                        <p class="text-gray-600 dark:text-gray-400 dark:text-gray-400 mt-1">
                            عرض وإدارة جميع خطط الدروس المرتبطة بفصولك ومواد التدريس
                        </p>
                    </div>
                    <Link 
                        href="/objectives-generator" 
                        class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition-colors flex items-center"
                    >
                        <span class="ml-2">➕</span>
                        إنشاء خطة جديدة
                    </Link>
                </div>

                <!-- Statistics Cards -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                    <div class="bg-white dark:bg-gray-800 rounded-lg p-6 shadow-sm">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-blue-100 dark:bg-blue-900 text-blue-600 dark:text-blue-400">
                                <span class="text-2xl">📄</span>
                            </div>
                            <div class="mr-4">
                                <p class="text-sm font-medium text-gray-600 dark:text-gray-400 dark:text-gray-400">إجمالي الخطط</p>
                                <p class="text-2xl font-bold text-gray-900 dark:text-gray-100 dark:text-gray-100">{{ lessonPlans?.data?.length || 0 }}</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-white dark:bg-gray-800 rounded-lg p-6 shadow-sm">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-green-100 dark:bg-green-900 text-green-600 dark:text-green-400">
                                <span class="text-2xl">✅</span>
                            </div>
                            <div class="mr-4">
                                <p class="text-sm font-medium text-gray-600 dark:text-gray-400 dark:text-gray-400">نشطة</p>
                                <p class="text-2xl font-bold text-gray-900 dark:text-gray-100 dark:text-gray-100">{{ activeCount }}</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-white dark:bg-gray-800 rounded-lg p-6 shadow-sm">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-yellow-100 dark:bg-yellow-900 text-yellow-600 dark:text-yellow-400">
                                <span class="text-2xl">📝</span>
                            </div>
                            <div class="mr-4">
                                <p class="text-sm font-medium text-gray-600 dark:text-gray-400 dark:text-gray-400">مسودات</p>
                                <p class="text-2xl font-bold text-gray-900 dark:text-gray-100 dark:text-gray-100">{{ draftCount }}</p>
                            </div>
                        </div>
                    </div>
                    
                    <div class="bg-white dark:bg-gray-800 rounded-lg p-6 shadow-sm">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-purple-100 dark:bg-purple-900 text-purple-600 dark:text-purple-400">
                                <span class="text-2xl">🎓</span>
                            </div>
                            <div class="mr-4">
                                <p class="text-sm font-medium text-gray-600 dark:text-gray-400 dark:text-gray-400">مكتملة</p>
                                <p class="text-2xl font-bold text-gray-900 dark:text-gray-100 dark:text-gray-100">{{ completedCount }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Filters -->
                <div class="bg-white dark:bg-gray-800 rounded-lg p-6 shadow-sm mb-8">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 dark:text-gray-200 mb-4">تصفية الخطط</h3>
                    <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">المادة</label>
                            <select v-model="selectedFilters.subject" @change="applyFilters" 
                                    class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                <option value="">جميع المواد</option>
                                <option v-for="subject in availableSubjects" :key="subject" :value="subject">
                                    {{ subject }}
                                </option>
                            </select>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">الصف</label>
                            <select v-model="selectedFilters.grade" @change="applyFilters"
                                    class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                <option value="">جميع الصفوف</option>
                                <option v-for="grade in availableGrades" :key="grade" :value="grade">
                                    {{ grade }}
                                </option>
                            </select>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">الفصل</label>
                            <select v-model="selectedFilters.class_name" @change="applyFilters"
                                    class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                <option value="">جميع الفصول</option>
                                <option v-for="className in availableClasses" :key="className" :value="className">
                                    {{ className }}
                                </option>
                            </select>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">الحالة</label>
                            <select v-model="selectedFilters.status" @change="applyFilters"
                                    class="w-full px-3 py-2 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                <option value="">جميع الحالات</option>
                                <option value="draft">مسودة</option>
                                <option value="active">نشط</option>
                                <option value="completed">مكتمل</option>
                                <option value="archived">مؤرشف</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Lesson Plans Grid -->
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8" v-if="lessonPlans?.data?.length > 0">
                    <div v-for="plan in lessonPlans.data" :key="plan.id" 
                         class="bg-white dark:bg-gray-800 rounded-lg shadow-sm hover:shadow-md transition-shadow duration-200">
                        <div class="p-6">
                            <!-- Header with Status -->
                            <div class="flex justify-between items-start mb-4">
                                <div class="flex-1">
                                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-2">{{ plan.title }}</h3>
                                    <div class="flex items-center text-sm text-gray-600 dark:text-gray-400 space-x-4 space-x-reverse">
                                        <span class="flex items-center">
                                            <span class="ml-1">📚</span>
                                            {{ plan.subject }}
                                        </span>
                                        <span class="flex items-center">
                                            <span class="ml-1">🎓</span>
                                            {{ plan.grade }}
                                        </span>
                                    </div>
                                </div>
                                <div class="flex flex-col items-end space-y-2">
                                    <span :class="getStatusBadgeClass(plan.status)" class="px-2 py-1 rounded-full text-xs font-medium">
                                        {{ getStatusText(plan.status) }}
                                    </span>
                                </div>
                            </div>

                            <!-- Class and Duration Info -->
                            <div class="flex items-center justify-between text-sm text-gray-600 dark:text-gray-400 mb-4">
                                <span class="flex items-center">
                                    <span class="ml-1">🏫</span>
                                    {{ plan.class_name }}
                                </span>
                                <span class="flex items-center">
                                    <span class="ml-1">⏱️</span>
                                    {{ plan.duration }} دقيقة
                                </span>
                            </div>

                            <!-- Content Preview -->
                            <div class="text-sm text-gray-700 mb-4">
                                <p class="line-clamp-3">{{ plan.content?.substring(0, 150) }}...</p>
                            </div>

                            <!-- Date Info -->
                            <div class="text-xs text-gray-500 dark:text-gray-400 mb-4">
                                <div v-if="plan.lesson_date" class="flex items-center mb-1">
                                    <span class="ml-1">📅</span>
                                    تاريخ الدرس: {{ formatDate(plan.lesson_date) }}
                                </div>
                                <div class="flex items-center">
                                    <span class="ml-1">📝</span>
                                    تم الإنشاء: {{ formatDate(plan.created_at) }}
                                </div>
                            </div>

                            <!-- Actions -->
                            <div class="flex items-center justify-between pt-4 border-t border-gray-200">
                                <div class="flex space-x-2 space-x-reverse">
                                    <button @click="viewPlan(plan)" 
                                            class="text-blue-600 hover:text-blue-800 text-sm font-medium">
                                        عرض
                                    </button>
                                    <button @click="editPlan(plan)" 
                                            class="text-green-600 hover:text-green-800 text-sm font-medium">
                                        تعديل
                                    </button>
                                    <button @click="duplicatePlan(plan)" 
                                            class="text-purple-600 hover:text-purple-800 text-sm font-medium">
                                        نسخ
                                    </button>
                                </div>
                                <div class="flex space-x-2 space-x-reverse">
                                    <select @change="updateStatus(plan, ($event.target as HTMLSelectElement).value)" :value="plan.status"
                                            class="text-xs px-2 py-1 border border-gray-300 rounded focus:ring-1 focus:ring-blue-500">
                                        <option value="draft">مسودة</option>
                                        <option value="active">نشط</option>
                                        <option value="completed">مكتمل</option>
                                        <option value="archived">مؤرشف</option>
                                    </select>
                                    <button @click="deletePlan(plan)" 
                                            class="text-red-600 hover:text-red-800 text-sm font-medium">
                                        حذف
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Empty State -->
                <div v-if="!lessonPlans?.data?.length" class="text-center py-12">
                    <div class="text-6xl mb-4">📚</div>
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-gray-100 mb-2">لا توجد خطط دروس محفوظة</h3>
                    <p class="text-gray-600 dark:text-gray-400 mb-6">ابدأ بإنشاء خطة درس جديدة باستخدام مولد خطط الدروس</p>
                    <Link href="/objectives-generator" 
                          class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition-colors inline-flex items-center">
                        <span class="ml-2">➕</span>
                        إنشاء خطة جديدة
                    </Link>
                </div>

                <!-- Pagination -->
                <div v-if="lessonPlans?.data?.length > 0 && lessonPlans.last_page > 1" class="flex justify-center">
                    <nav class="flex items-center space-x-2 space-x-reverse">
                        <Link v-if="lessonPlans.prev_page_url" :href="lessonPlans.prev_page_url"
                              class="px-3 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 dark:border-gray-600 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-600">
                            السابق
                        </Link>
                        <span class="px-3 py-2 bg-blue-600 text-white rounded-lg">
                            {{ lessonPlans.current_page }} من {{ lessonPlans.last_page }}
                        </span>
                        <Link v-if="lessonPlans.next_page_url" :href="lessonPlans.next_page_url"
                              class="px-3 py-2 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 dark:border-gray-600 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-600">
                            التالي
                        </Link>
                    </nav>
                </div>
            </div>
        </div>

        <!-- View Modal -->
        <div v-if="showViewModal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center z-50 p-4">
            <div class="bg-white dark:bg-gray-800 rounded-lg max-w-4xl w-full max-h-[90vh] overflow-y-auto">
                <div class="sticky top-0 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-600 px-6 py-4">
                    <div class="flex justify-between items-center">
                        <h3 class="text-xl font-bold text-gray-900 dark:text-gray-100">{{ selectedPlan?.title }}</h3>
                        <button @click="closeViewModal" class="text-gray-400 hover:text-gray-600 dark:text-gray-400">
                            <span class="text-2xl">×</span>
                        </button>
                    </div>
                </div>
                
                <div class="p-6" v-if="selectedPlan">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <h4 class="font-semibold text-gray-800 mb-2">معلومات الدرس</h4>
                            <div class="space-y-2 text-sm">
                                <div><strong>المادة:</strong> {{ selectedPlan.subject }}</div>
                                <div><strong>الصف:</strong> {{ selectedPlan.grade }}</div>
                                <div><strong>الفصل:</strong> {{ selectedPlan.class_name }}</div>
                                <div><strong>المدة:</strong> {{ selectedPlan.duration }} دقيقة</div>
                                <div v-if="selectedPlan.lesson_date"><strong>تاريخ الدرس:</strong> {{ formatDate(selectedPlan.lesson_date) }}</div>
                                <div><strong>الحالة:</strong> {{ getStatusText(selectedPlan.status) }}</div>
                            </div>
                        </div>
                        
                        <div v-if="selectedPlan.objectives && selectedPlan.objectives.length > 0">
                            <h4 class="font-semibold text-gray-800 mb-2">الأهداف</h4>
                            <ul class="list-disc list-inside text-sm space-y-1">
                                <li v-for="objective in selectedPlan.objectives" :key="objective">{{ objective }}</li>
                            </ul>
                        </div>
                    </div>
                    
                    <div class="mb-6">
                        <h4 class="font-semibold text-gray-800 mb-2">محتوى الدرس</h4>
                        <div class="bg-gray-50 rounded-lg p-4 prose max-w-none">
                            <div v-html="selectedPlan.content.replace(/\n/g, '<br>')"></div>
                        </div>
                    </div>
                    
                    <div v-if="selectedPlan.activities && selectedPlan.activities.length > 0" class="mb-6">
                        <h4 class="font-semibold text-gray-800 mb-2">الأنشطة</h4>
                        <ul class="list-disc list-inside text-sm space-y-1">
                            <li v-for="activity in selectedPlan.activities" :key="activity">{{ activity }}</li>
                        </ul>
                    </div>
                    
                    <div v-if="selectedPlan.resources && selectedPlan.resources.length > 0" class="mb-6">
                        <h4 class="font-semibold text-gray-800 mb-2">المصادر المطلوبة</h4>
                        <ul class="list-disc list-inside text-sm space-y-1">
                            <li v-for="resource in selectedPlan.resources" :key="resource">{{ resource }}</li>
                        </ul>
                    </div>
                    
                    <div v-if="selectedPlan.assessment" class="mb-6">
                        <h4 class="font-semibold text-gray-800 mb-2">أساليب التقييم</h4>
                        <div class="bg-gray-50 rounded-lg p-4 text-sm">
                            {{ selectedPlan.assessment }}
                        </div>
                    </div>
                    
                    <div v-if="selectedPlan.notes" class="mb-6">
                        <h4 class="font-semibold text-gray-800 mb-2">ملاحظات إضافية</h4>
                        <div class="bg-gray-50 rounded-lg p-4 text-sm">
                            {{ selectedPlan.notes }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </ArabicDashboardLayout>
</template>

<script setup lang="ts">
import { Head, Link, router } from '@inertiajs/vue3'
import ArabicDashboardLayout from '@/layouts/ArabicDashboardLayout.vue'
import { ref, computed } from 'vue'

interface LessonPlan {
    id: number;
    title: string;
    subject: string;
    grade: string;
    class_name: string;
    duration: number;
    content: string;
    objectives: string[] | null;
    activities: string[] | null;
    resources: string[] | null;
    assessment: string | null;
    notes: string | null;
    lesson_date: string | null;
    status: 'draft' | 'active' | 'completed' | 'archived';
    created_at: string;
    updated_at: string;
}

interface Props {
    lessonPlans: {
        data: LessonPlan[];
        current_page: number;
        last_page: number;
        prev_page_url: string | null;
        next_page_url: string | null;
    } | null;
    teacherClasses: Array<{
        name: string;
        grade: string;
        stage: string;
        subjects: string[];
    }> | null;
    filters: {
        subject?: string;
        grade?: string;
        class_name?: string;
        status?: string;
    } | null;
}

const props = defineProps<Props>()

const selectedFilters = ref({
    subject: props.filters?.subject || '',
    grade: props.filters?.grade || '',
    class_name: props.filters?.class_name || '',
    status: props.filters?.status || ''
})

const showViewModal = ref(false)
const selectedPlan = ref<LessonPlan | null>(null)

// Computed statistics
const activeCount = computed(() => props.lessonPlans?.data?.filter(plan => plan.status === 'active').length || 0)
const draftCount = computed(() => props.lessonPlans?.data?.filter(plan => plan.status === 'draft').length || 0)
const completedCount = computed(() => props.lessonPlans?.data?.filter(plan => plan.status === 'completed').length || 0)

// Available filter options from teacher classes
const availableSubjects = computed(() => {
    if (!props.teacherClasses) return []
    const subjects = new Set<string>()
    props.teacherClasses.forEach(classData => {
        if (classData.subjects && Array.isArray(classData.subjects)) {
            classData.subjects.forEach(subject => subjects.add(subject))
        }
    })
    return Array.from(subjects)
})

const availableGrades = computed(() => {
    if (!props.teacherClasses) return []
    const grades = new Set<string>()
    props.teacherClasses.forEach(classData => {
        if (classData.grade) grades.add(classData.grade)
    })
    return Array.from(grades)
})

const availableClasses = computed(() => {
    if (!props.teacherClasses) return []
    return props.teacherClasses.map(classData => classData.name).filter(Boolean)
})

// Methods
const applyFilters = () => {
    router.get('/lesson-plans', selectedFilters.value, {
        preserveState: true,
        preserveScroll: true
    })
}

const getStatusBadgeClass = (status: string) => {
    const classes: Record<string, string> = {
        draft: 'bg-yellow-100 text-yellow-800',
        active: 'bg-green-100 text-green-800',
        completed: 'bg-blue-100 text-blue-800',
        archived: 'bg-gray-100 text-gray-800'
    }
    return classes[status] || 'bg-gray-100 text-gray-800'
}

const getStatusText = (status: string) => {
    const texts: Record<string, string> = {
        draft: 'مسودة',
        active: 'نشط',
        completed: 'مكتمل',
        archived: 'مؤرشف'
    }
    return texts[status] || status
}

const formatDate = (dateString: string | null) => {
    if (!dateString) return ''
    return new Date(dateString).toLocaleDateString('ar-SA')
}

const viewPlan = (plan: LessonPlan) => {
    selectedPlan.value = plan
    showViewModal.value = true
}

const closeViewModal = () => {
    showViewModal.value = false
    selectedPlan.value = null
}

const editPlan = (plan: LessonPlan) => {
    router.get(`/lesson-plans/${plan.id}/edit`)
}

const updateStatus = async (plan: LessonPlan, newStatus: string) => {
    try {
        await fetch(`/lesson-plans/${plan.id}/update-status`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''
            },
            body: JSON.stringify({ status: newStatus })
        })
        
        plan.status = newStatus as 'draft' | 'active' | 'completed' | 'archived'
        alert('تم تحديث حالة خطة الدرس بنجاح')
    } catch (error) {
        console.error('Error updating status:', error)
        alert('حدث خطأ أثناء تحديث الحالة')
    }
}

const duplicatePlan = async (plan: LessonPlan) => {
    if (!confirm('هل تريد نسخ هذه الخطة؟')) return
    
    try {
        const response = await fetch(`/lesson-plans/${plan.id}/duplicate`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''
            }
        })
        
        const data = await response.json()
        if (data.success) {
            alert('تم نسخ خطة الدرس بنجاح')
            router.reload()
        }
    } catch (error) {
        console.error('Error duplicating plan:', error)
        alert('حدث خطأ أثناء نسخ الخطة')
    }
}

const deletePlan = async (plan: LessonPlan) => {
    if (!confirm('هل أنت متأكد من حذف هذه الخطة؟ لا يمكن التراجع عن هذا الإجراء.')) return
    
    try {
        await router.delete(`/lesson-plans/${plan.id}`)
        alert('تم حذف خطة الدرس بنجاح')
    } catch (error) {
        console.error('Error deleting plan:', error)
        alert('حدث خطأ أثناء حذف الخطة')
    }
}
</script>

<style scoped>
.line-clamp-3 {
    display: -webkit-box;
    -webkit-line-clamp: 3;
    line-clamp: 3;
    -webkit-box-orient: vertical;
    overflow: hidden;
}
</style>