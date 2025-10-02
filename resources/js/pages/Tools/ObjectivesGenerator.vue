<template>
    <Head title="مولد الأهداف التعليمية - منصة مُعين" />
    <ArabicDashboardLayout>
        <div class="min-h-screen bg-gray-50 dark:bg-gray-900 overflow-auto" dir="rtl">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                <div class="flex items-center justify-between mb-8">
                    <div>
                        <h2 class="text-3xl font-bold text-gray-800 dark:text-gray-200 flex items-center">
                            <span class="text-4xl ml-3">🎯</span>
                            مولد الأهداف التعليمية
                        </h2>
                        <p class="text-gray-600 dark:text-gray-400 mt-1">
                            احصل على أهداف تعليمية مصاغة باحترافية وفقاً لتصنيف بلوم
                        </p>
                    </div>
                </div>
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6 overflow-auto">
                    <form @submit.prevent="generateObjectives" class="space-y-6">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="subject" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">المادة الدراسية</label>
                                <input id="subject" v-model="form.subject" type="text" class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="مثل: الرياضيات، العلوم، اللغة العربية" required />
                            </div>
                            <div>
                                <label for="grade" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">الصف الدراسي</label>
                                <input id="grade" v-model="form.grade" type="text" class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="مثل: الصف الخامس الابتدائي" required />
                            </div>
                        </div>
                        <div>
                            <label for="topic" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">موضوع الدرس</label>
                            <input id="topic" v-model="form.topic" type="text" class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="مثل: الكسور الاعتيادية، الخلية النباتية، أدوات الاستفهام" required />
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="objectivesCount" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">عدد الأهداف المطلوبة</label>
                                <select id="objectivesCount" v-model="form.objectivesCount" class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                    <option value="3">3 أهداف</option>
                                    <option value="4">4 أهداف</option>
                                    <option value="5">5 أهداف</option>
                                    <option value="6">6 أهداف</option>
                                </select>
                            </div>
                            <div>
                                <label for="bloomLevels" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">مستويات بلوم المطلوبة</label>
                                <select id="bloomLevels" v-model="form.bloomLevels" class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                    <option value="mixed">مزيج من جميع المستويات</option>
                                    <option value="remember">التذكر</option>
                                    <option value="understand">الفهم</option>
                                    <option value="apply">التطبيق</option>
                                    <option value="analyze">التحليل</option>
                                    <option value="evaluate">التقييم</option>
                                    <option value="create">الإبداع</option>
                                </select>
                            </div>
                        </div>
                        <div class="flex justify-center">
                            <button type="submit" :disabled="isLoading" class="bg-blue-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-blue-700 transition-colors shadow-sm disabled:opacity-50 disabled:cursor-not-allowed flex items-center">
                                <span v-if="isLoading" class="mr-2">
                                    <svg class="animate-spin h-4 w-4" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                </span>
                                {{ isLoading ? 'جارٍ التوليد...' : 'توليد الأهداف' }}
                            </button>
                        </div>
                    </form>
                    <div v-if="generatedContent" class="mt-8 border-t pt-8">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-xl font-semibold text-gray-800">الأهداف المولدة</h3>
                            <div class="flex gap-2">
                                <button @click="copyContent" class="bg-gray-100 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-200 transition-colors flex items-center text-sm">📋 نسخ</button>
                                <button @click="saveContent" class="bg-green-100 text-green-700 px-4 py-2 rounded-lg hover:bg-green-200 transition-colors flex items-center text-sm">💾 حفظ</button>
                            </div>
                        </div>
                        <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6 whitespace-pre-wrap text-right leading-relaxed">{{ generatedContent }}</div>
                    </div>
                    <div v-if="errorMessage" class="mt-6 p-4 bg-red-50 border border-red-200 rounded-lg">
                        <p class="text-red-600 text-sm">{{ errorMessage }}</p>
                    </div>
                </div>
            </div>
        </div>
    </ArabicDashboardLayout>
</template>

<script setup lang="ts">
import { Head } from '@inertiajs/vue3'
import ArabicDashboardLayout from '@/layouts/ArabicDashboardLayout.vue'
import { ref, reactive } from 'vue'

const form = reactive({
    subject: '',
    grade: '',
    topic: '',
    objectivesCount: '4',
    bloomLevels: 'mixed'
})

const isLoading = ref(false)
const generatedContent = ref('')
const errorMessage = ref('')

const generateObjectives = async () => {
    isLoading.value = true
    errorMessage.value = ''
    generatedContent.value = ''

    try {
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''
        
        const response = await fetch('/ai/generate-objectives', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify(form)
        })

        if (!response.ok) {
            throw new Error(`HTTP ${response.status}: ${response.statusText}`)
        }

        const data = await response.json()
        
        if (data.success) {
            generatedContent.value = data.content
        } else {
            throw new Error(data.message || 'حدث خطأ أثناء توليد الأهداف')
        }
    } catch (error) {
        console.error('Error generating objectives:', error)
        errorMessage.value = error instanceof Error ? error.message : 'حدث خطأ أثناء توليد الأهداف'
    } finally {
        isLoading.value = false
    }
}

const copyContent = async () => {
    try {
        await navigator.clipboard.writeText(generatedContent.value)
        alert('تم نسخ المحتوى!')
    } catch (error) {
        console.error('Failed to copy content:', error)
        alert('فشل في نسخ المحتوى')
    }
}

const saveContent = async () => {
    try {
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''
        
        const response = await fetch('/ai/save-content', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': csrfToken
            },
            body: JSON.stringify({
                type: 'objectives',
                title: `أهداف تعليمية - ${form.subject} - ${form.topic}`,
                content: generatedContent.value,
                metadata: {
                    subject: form.subject,
                    grade: form.grade,
                    topic: form.topic,
                    objectives_count: form.objectivesCount,
                    bloom_levels: form.bloomLevels
                }
            })
        })
        
        if (!response.ok) {
            throw new Error(`HTTP ${response.status}: ${response.statusText}`)
        }
        
        const data = await response.json()
        
        if (data.success) {
            alert('تم حفظ المحتوى بنجاح!')
        } else {
            throw new Error(data.message || 'فشل في حفظ المحتوى')
        }
    } catch (error) {
        console.error('Error saving content:', error)
        
        // عرض رسالة خطأ أكثر تفصيلاً
        let errorMessage = 'فشل في حفظ المحتوى. يرجى المحاولة مرة أخرى.'
        if (error.message.includes('401')) {
            errorMessage = 'يجب تسجيل الدخول أولاً لحفظ المحتوى.'
        } else if (error.message.includes('422')) {
            errorMessage = 'البيانات المدخلة غير صحيحة.'
        } else if (error.message.includes('500')) {
            errorMessage = 'خطأ في الخادم. يرجى المحاولة لاحقاً.'
        }
        
        alert(errorMessage)
    }
}
</script>
