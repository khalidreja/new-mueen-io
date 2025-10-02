<template>
    <Head title="مولد معايير التقييم - منصة مُعين" />

    <ArabicDashboardLayout>
        <div class="min-h-screen bg-gray-50 dark:bg-gray-900 overflow-auto" dir="rtl">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                <div class="flex items-center justify-between mb-8">
                    <div>
                        <h2 class="text-3xl font-bold text-gray-800 dark:text-gray-200 flex items-center">
                            <span class="text-4xl ml-3">⚖️</span>
                            مولد معايير التقييم
                        </h2>
                        <p class="text-gray-600 dark:text-gray-400 mt-1">
                            أنشئ معايير تقييم (Rubrics) مفصلة للمشاريع والواجبات
                        </p>
                    </div>
                </div>

                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6">
                    <form @submit.prevent="generateRubric" class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="subject" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">المادة الدراسية</label>
                                <input id="subject" v-model="form.subject" type="text" class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="مثل: الرياضيات، العلوم" required />
                            </div>
                            <div>
                                <label for="grade" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">الصف الدراسي</label>
                                <input id="grade" v-model="form.grade" type="text" class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="مثل: الصف الثالث المتوسط" required />
                            </div>
                        </div>

                        <div>
                            <label for="assignment" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">نوع المهمة أو المشروع</label>
                            <input id="assignment" v-model="form.assignment" type="text" class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="مثل: مشروع علمي، تقرير بحثي، عرض تقديمي" required />
                        </div>

                        <div class="flex justify-center">
                            <button type="submit" :disabled="loading" class="bg-blue-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-blue-700 transition-colors shadow-sm disabled:opacity-50 disabled:cursor-not-allowed flex items-center">
                                <span v-if="loading" class="ml-2">
                                    <svg class="animate-spin h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                </span>
                                {{ loading ? 'جاري التوليد...' : 'توليد معايير التقييم' }}
                            </button>
                        </div>
                    </form>

                    <div v-if="generatedContent" class="mt-8 border-t pt-8">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-xl font-bold text-gray-800">معايير التقييم المولدة</h3>
                            <button @click="copyToClipboard" class="bg-gray-100 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-200 transition-colors flex items-center text-sm">
                                <span class="ml-2">📋</span>
                                نسخ
                            </button>
                        </div>
                        <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6 prose prose-lg max-w-none">
                            <div v-html="formattedContent"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </ArabicDashboardLayout>
</template>

<script setup>
import { Head } from '@inertiajs/vue3'
import ArabicDashboardLayout from '@/layouts/ArabicDashboardLayout.vue'
import { ref, computed } from 'vue'

const form = ref({ subject: '', grade: '', assignment: '' })
const generatedContent = ref('')
const loading = ref(false)

const formattedContent = computed(() => {
    return generatedContent.value.replace(/\n/g, '<br>')
})

const generateRubric = async () => {
    loading.value = true
    try {
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';
        const response = await fetch('/ai/generate-rubric', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify(form.value)
        })
        
        if (!response.ok) {
            throw new Error(`HTTP ${response.status}: ${response.statusText}`);
        }
        
        const data = await response.json()
        
        if (data.success) {
            generatedContent.value = data.content;
        } else {
            throw new Error(data.error || data.message || 'حدث خطأ أثناء توليد معايير التقييم');
        }
    } catch (error) {
        console.error('Error generating rubric:', error)
        alert('حدث خطأ أثناء توليد معايير التقييم.')
    } finally {
        loading.value = false
    }
}

const copyToClipboard = async () => {
    try {
        await navigator.clipboard.writeText(generatedContent.value)
        alert('تم نسخ المحتوى بنجاح!')
    } catch (error) {
        alert('فشل في نسخ المحتوى')
    }
}
</script>