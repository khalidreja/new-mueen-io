<template>
    <AdminDashboardLayout>
        <template #header>
            إدارة المحتوى المولد
        </template>

        <!-- Content Stats -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <span class="text-2xl">📝</span>
                        </div>
                        <div class="mr-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 truncate">
                                    إجمالي المحتوى
                                </dt>
                                <dd class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                    {{ contentStats.total }}
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <span class="text-2xl">❓</span>
                        </div>
                        <div class="mr-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 truncate">
                                    الاختبارات
                                </dt>
                                <dd class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                    {{ contentStats.quizzes }}
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <span class="text-2xl">📚</span>
                        </div>
                        <div class="mr-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 truncate">
                                    خطط الدروس
                                </dt>
                                <dd class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                    {{ contentStats.lessonPlans }}
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow rounded-lg">
                <div class="p-5">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <span class="text-2xl">📋</span>
                        </div>
                        <div class="mr-5 w-0 flex-1">
                            <dl>
                                <dt class="text-sm font-medium text-gray-500 dark:text-gray-400 truncate">
                                    التقارير
                                </dt>
                                <dd class="text-lg font-medium text-gray-900 dark:text-gray-100">
                                    {{ contentStats.reports }}
                                </dd>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Filters -->
        <div class="bg-white dark:bg-gray-800 shadow rounded-lg mb-6">
            <div class="px-4 py-5 sm:p-6">
                <div class="grid grid-cols-1 md:grid-cols-5 gap-4">
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">البحث</label>
                        <input v-model="filters.search" 
                               type="text" 
                               placeholder="البحث في العنوان أو المحتوى..."
                               class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 rounded-md">
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">نوع المحتوى</label>
                        <select v-model="filters.type" 
                                class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 rounded-md">
                            <option value="">جميع الأنواع</option>
                            <option value="quiz">اختبار</option>
                            <option value="lesson_plan">خطة درس</option>
                            <option value="report">تقرير</option>
                            <option value="other">أخرى</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">المالك</label>
                        <select v-model="filters.userId" 
                                class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 rounded-md">
                            <option value="">جميع المستخدمين</option>
                            <option v-for="user in users" :key="user.id" :value="user.id">
                                {{ user.name }}
                            </option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">التاريخ</label>
                        <select v-model="filters.dateRange" 
                                class="w-full border-gray-300 dark:border-gray-600 dark:bg-gray-700 dark:text-gray-300 rounded-md">
                            <option value="">جميع التواريخ</option>
                            <option value="today">اليوم</option>
                            <option value="week">هذا الأسبوع</option>
                            <option value="month">هذا الشهر</option>
                            <option value="year">هذا العام</option>
                        </select>
                    </div>
                </div>

                <div class="mt-4 flex justify-between items-center">
                    <button @click="resetFilters" 
                            class="text-sm text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-300">
                        إعادة تعيين الفلاتر
                    </button>
                    <div class="flex space-x-2 space-x-reverse">
                        <button @click="exportContent" 
                                class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-md text-sm font-medium">
                            تصدير البيانات
                        </button>
                        <button @click="bulkDelete" 
                                :disabled="selectedItems.length === 0"
                                class="bg-red-600 hover:bg-red-700 disabled:bg-gray-400 text-white px-4 py-2 rounded-md text-sm font-medium">
                            حذف المحدد ({{ selectedItems.length }})
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content Table -->
        <div class="bg-white dark:bg-gray-800 shadow rounded-lg overflow-hidden">
            <div class="px-4 py-5 sm:p-6">
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="bg-gray-50 dark:bg-gray-700">
                            <tr>
                                <th class="px-6 py-3 text-right">
                                    <input type="checkbox" 
                                           @change="toggleAllSelection"
                                           :checked="allSelected"
                                           class="rounded border-gray-300 dark:border-gray-600">
                                </th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    المحتوى
                                </th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    النوع
                                </th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    المالك
                                </th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    تاريخ الإنشاء
                                </th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    الحجم
                                </th>
                                <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 dark:text-gray-300 uppercase tracking-wider">
                                    الإجراءات
                                </th>
                            </tr>
                        </thead>
                        <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                            <tr v-for="content in filteredContent" :key="content.id" 
                                class="hover:bg-gray-50 dark:hover:bg-gray-700">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <input type="checkbox" 
                                           v-model="selectedItems"
                                           :value="content.id"
                                           class="rounded border-gray-300 dark:border-gray-600">
                                </td>
                                <td class="px-6 py-4">
                                    <div class="max-w-xs">
                                        <div class="text-sm font-medium text-gray-900 dark:text-gray-100 truncate">
                                            {{ content.title }}
                                        </div>
                                        <div class="text-sm text-gray-500 dark:text-gray-400 truncate">
                                            {{ content.preview }}
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span :class="{
                                        'bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200': content.type === 'quiz',
                                        'bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200': content.type === 'lesson_plan',
                                        'bg-purple-100 dark:bg-purple-900 text-purple-800 dark:text-purple-200': content.type === 'report',
                                        'bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200': content.type === 'other'
                                    }" class="inline-flex px-2 py-1 text-xs font-semibold rounded-full">
                                        {{ getTypeLabel(content.type) }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 bg-blue-500 rounded-full flex items-center justify-center">
                                            <span class="text-white text-xs font-medium">{{ content.user.name.charAt(0) }}</span>
                                        </div>
                                        <div class="mr-3">
                                            <div class="text-sm text-gray-900 dark:text-gray-100">{{ content.user.name }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                    {{ formatDate(content.created_at) }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 dark:text-gray-400">
                                    {{ formatSize(content.size) }}
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex space-x-2 space-x-reverse">
                                        <button @click="viewContent(content)" 
                                                class="text-blue-600 dark:text-blue-400 hover:text-blue-900 dark:hover:text-blue-300">
                                            عرض
                                        </button>
                                        <button @click="editContent(content)" 
                                                class="text-green-600 dark:text-green-400 hover:text-green-900 dark:hover:text-green-300">
                                            تعديل
                                        </button>
                                        <button @click="deleteContent(content)" 
                                                class="text-red-600 dark:text-red-400 hover:text-red-900 dark:hover:text-red-300">
                                            حذف
                                        </button>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="mt-6 flex items-center justify-between">
                    <div class="text-sm text-gray-700 dark:text-gray-300">
                        عرض {{ (currentPage - 1) * perPage + 1 }} إلى {{ Math.min(currentPage * perPage, totalContent) }} من {{ totalContent }} نتيجة
                    </div>
                    <div class="flex space-x-2 space-x-reverse">
                        <button @click="currentPage--" 
                                :disabled="currentPage === 1"
                                class="px-3 py-1 rounded-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-700 dark:text-gray-300 disabled:opacity-50">
                            السابق
                        </button>
                        <span class="px-3 py-1 bg-blue-600 text-white rounded-md">{{ currentPage }}</span>
                        <button @click="currentPage++" 
                                :disabled="currentPage * perPage >= totalContent"
                                class="px-3 py-1 rounded-md border border-gray-300 dark:border-gray-600 bg-white dark:bg-gray-700 text-gray-700 dark:text-gray-300 disabled:opacity-50">
                            التالي
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Content View Modal -->
        <div v-if="showViewModal" class="fixed inset-0 z-50 overflow-y-auto">
            <div class="flex items-center justify-center min-h-screen px-4">
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75" @click="closeViewModal"></div>
                <div class="relative bg-white dark:bg-gray-800 rounded-lg p-6 w-full max-w-4xl max-h-[80vh] overflow-y-auto">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-gray-100">
                            {{ selectedContent?.title }}
                        </h3>
                        <button @click="closeViewModal" 
                                class="text-gray-400 hover:text-gray-600 dark:hover:text-gray-300">
                            <span class="text-2xl">×</span>
                        </button>
                    </div>
                    
                    <div class="prose dark:prose-invert max-w-none">
                        <div v-html="selectedContent?.content"></div>
                    </div>
                </div>
            </div>
        </div>
    </AdminDashboardLayout>
</template>

<script setup>
import { ref, computed } from 'vue'
import AdminDashboardLayout from '@/layouts/AdminDashboardLayout.vue'

// Reactive data
const filters = ref({
    search: '',
    type: '',
    userId: '',
    dateRange: ''
})

const currentPage = ref(1)
const perPage = ref(10)
const selectedItems = ref([])
const showViewModal = ref(false)
const selectedContent = ref(null)

// Mock data
const contentStats = ref({
    total: 1250,
    quizzes: 450,
    lessonPlans: 320,
    reports: 480
})

const users = ref([
    { id: 1, name: 'أحمد محمد' },
    { id: 2, name: 'فاطمة علي' },
    { id: 3, name: 'محمد سالم' }
])

const content = ref([
    {
        id: 1,
        title: 'اختبار الرياضيات للصف الثالث',
        preview: 'اختبار شامل يحتوي على 20 سؤال في مادة الرياضيات...',
        type: 'quiz',
        user: { id: 1, name: 'أحمد محمد' },
        created_at: '2024-01-15T10:30:00Z',
        size: 2048,
        content: '<h2>اختبار الرياضيات</h2><p>هذا اختبار شامل في مادة الرياضيات...</p>'
    },
    {
        id: 2,
        title: 'خطة درس العلوم - الكهرباء',
        preview: 'خطة درس مفصلة لتدريس موضوع الكهرباء للصف الخامس...',
        type: 'lesson_plan',
        user: { id: 2, name: 'فاطمة علي' },
        created_at: '2024-02-20T14:15:00Z',
        size: 4096,
        content: '<h2>خطة درس الكهرباء</h2><p>الأهداف التعليمية...</p>'
    },
    {
        id: 3,
        title: 'تقرير أداء الطالب محمد أحمد',
        preview: 'تقرير شامل عن أداء الطالب في جميع المواد الدراسية...',
        type: 'report',
        user: { id: 3, name: 'محمد سالم' },
        created_at: '2024-03-05T16:45:00Z',
        size: 1024,
        content: '<h2>تقرير الأداء</h2><p>ملخص الأداء الأكاديمي...</p>'
    }
])

// Computed
const filteredContent = computed(() => {
    let filtered = content.value

    if (filters.value.search) {
        filtered = filtered.filter(item => 
            item.title.toLowerCase().includes(filters.value.search.toLowerCase()) ||
            item.preview.toLowerCase().includes(filters.value.search.toLowerCase())
        )
    }

    if (filters.value.type) {
        filtered = filtered.filter(item => item.type === filters.value.type)
    }

    if (filters.value.userId) {
        filtered = filtered.filter(item => item.user.id == filters.value.userId)
    }

    const start = (currentPage.value - 1) * perPage.value
    const end = start + perPage.value
    return filtered.slice(start, end)
})

const totalContent = computed(() => content.value.length)

const allSelected = computed(() => {
    return filteredContent.value.length > 0 && 
           filteredContent.value.every(item => selectedItems.value.includes(item.id))
})

// Methods
const resetFilters = () => {
    filters.value = {
        search: '',
        type: '',
        userId: '',
        dateRange: ''
    }
    currentPage.value = 1
}

const toggleAllSelection = () => {
    if (allSelected.value) {
        selectedItems.value = []
    } else {
        selectedItems.value = filteredContent.value.map(item => item.id)
    }
}

const viewContent = (contentItem) => {
    selectedContent.value = contentItem
    showViewModal.value = true
}

const closeViewModal = () => {
    showViewModal.value = false
    selectedContent.value = null
}

const editContent = (contentItem) => {
    // Implement edit functionality
    console.log('Edit content:', contentItem)
}

const deleteContent = (contentItem) => {
    if (confirm('هل أنت متأكد من حذف هذا المحتوى؟')) {
        const index = content.value.findIndex(item => item.id === contentItem.id)
        if (index !== -1) {
            content.value.splice(index, 1)
        }
    }
}

const bulkDelete = () => {
    if (confirm(`هل أنت متأكد من حذف ${selectedItems.value.length} عنصر؟`)) {
        content.value = content.value.filter(item => !selectedItems.value.includes(item.id))
        selectedItems.value = []
    }
}

const exportContent = () => {
    // Implement export functionality
    console.log('Export content')
}

const getTypeLabel = (type) => {
    const labels = {
        quiz: 'اختبار',
        lesson_plan: 'خطة درس',
        report: 'تقرير',
        other: 'أخرى'
    }
    return labels[type] || type
}

const formatDate = (dateString) => {
    const date = new Date(dateString)
    return date.toLocaleDateString('ar-SA')
}

const formatSize = (bytes) => {
    if (bytes < 1024) return bytes + ' بايت'
    if (bytes < 1024 * 1024) return Math.round(bytes / 1024) + ' كيلوبايت'
    return Math.round(bytes / (1024 * 1024)) + ' ميجابايت'
}
</script>