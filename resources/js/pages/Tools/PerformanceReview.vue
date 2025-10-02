<template>
    <Head title="مراجعة الأداء - منصة مُعين" />

    <ArabicDashboardLayout>
        <div class="min-h-screen bg-gray-50 dark:bg-gray-900 overflow-auto" dir="rtl">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                <!-- Header -->
                <div class="flex items-center justify-between mb-8">
                    <div>
                        <h2 class="text-3xl font-bold text-gray-800 dark:text-gray-200 flex items-center">
                            <span class="text-4xl ml-3">📊</span>
                            مراجعة الأداء
                        </h2>
                        <p class="text-gray-600 dark:text-gray-400 mt-1">
                            احصل على تقييم شامل وبناء لأداء الطلاب
                        </p>
                    </div>
                </div>

                <!-- Main Content -->
                <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm p-6">
                    <form @submit.prevent="generatePerformanceReview" class="space-y-6">
                        <!-- مكون اختيار الطالب -->
                        <div>
                            <h3 class="text-lg font-semibold text-gray-800 dark:text-gray-200 mb-4 flex items-center">
                                <span class="text-blue-600 ml-2">👤</span>
                                معلومات الطالب
                            </h3>
                            <StudentSelector 
                                :show-subjects="true"
                                @student-selected="onStudentSelected"
                                ref="studentSelector"
                            />
                        </div>

                        <!-- Student Information -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="studentName" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    اسم الطالب
                                </label>
                                <input
                                    id="studentName"
                                    v-model="form.student_name"
                                    type="text"
                                    class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
                                    placeholder="أدخل اسم الطالب"
                                    required
                                />
                            </div>

                            <div>
                                <label for="subject" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    المادة الدراسية
                                </label>
                                <input
                                    id="subject"
                                    v-model="form.subject"
                                    type="text"
                                    class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
                                    placeholder="مثل: الرياضيات، العلوم، اللغة العربية"
                                    required
                                />
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="grade" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    الصف الدراسي
                                </label>
                                <input
                                    id="grade"
                                    v-model="form.grade"
                                    type="text"
                                    class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
                                    placeholder="مثل: الصف الخامس الابتدائي"
                                    required
                                />
                            </div>

                            <div>
                                <label for="weaknesses" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    نقاط الضعف / التحديات
                                </label>
                                <textarea
                                    id="weaknesses"
                                    v-model="form.weaknesses"
                                    rows="3"
                                    class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
                                    placeholder="اذكر الجوانب التي يحتاج الطالب لتحسينها..."
                                    required
                                ></textarea>
                            </div>
                        </div>

                        <!-- Recommendations -->
                        <div>
                            <label for="recommendations" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                التوصيات والمقترحات
                            </label>
                            <textarea
                                id="recommendations"
                                v-model="form.recommendations"
                                rows="4"
                                class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
                                placeholder="اقتراحات لتحسين أداء الطالب والأنشطة المقترحة..."
                                required
                            ></textarea>
                        </div>

                        <!-- Strengths -->
                        <div>
                            <label for="strengths" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                نقاط القوة الملاحظة
                            </label>
                            <textarea
                                id="strengths"
                                v-model="form.strengths"
                                rows="4"
                                class="w-full px-4 py-3 border border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100"
                                placeholder="اذكر النقاط الإيجابية في أداء الطالب..."
                                required
                            ></textarea>
                        </div>

                        <!-- Generate Button -->
                        <div class="flex justify-center">
                            <button
                                type="submit"
                                :disabled="loading"
                                class="bg-blue-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-blue-700 transition-colors shadow-sm disabled:opacity-50 disabled:cursor-not-allowed flex items-center"
                            >
                                <span v-if="loading" class="ml-2">
                                    <svg class="animate-spin h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                </span>
                                {{ loading ? 'جاري التوليد...' : 'توليد تقرير الأداء' }}
                            </button>
                        </div>
                    </form>

                    <!-- Generated Content -->
                    <div v-if="generatedContent" class="mt-8 border-t border-gray-200 dark:border-gray-600 pt-8">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-xl font-bold text-gray-800 dark:text-gray-200">تقرير الأداء المولد</h3>
                            <div class="flex space-x-2 space-x-reverse">
                                <button
                                    @click="copyToClipboard"
                                    class="bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 px-4 py-2 rounded-lg hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors flex items-center text-sm"
                                >
                                    <span class="ml-2">📋</span>
                                    نسخ
                                </button>
                                <button
                                    @click="saveContent"
                                    class="bg-green-100 dark:bg-green-800 text-green-700 dark:text-green-300 px-4 py-2 rounded-lg hover:bg-green-200 dark:hover:bg-green-700 transition-colors flex items-center text-sm"
                                >
                                    <span class="ml-2">💾</span>
                                    حفظ
                                </button>
                            </div>
                        </div>
                        <div class="bg-gray-50 dark:bg-gray-700 rounded-lg p-6 prose prose-lg max-w-none dark:prose-invert">
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
import StudentSelector from '@/components/StudentSelector.vue'
import { ref, computed } from 'vue'
import { router } from '@inertiajs/vue3'

const form = ref({
    student_name: '',
    subject: '',
    grade: '',
    strengths: '',
    weaknesses: '',
    recommendations: ''
})

const generatedContent = ref('')
const loading = ref(false)
const studentSelector = ref(null)

// دالة للتعامل مع اختيار الطالب
const onStudentSelected = (studentName, classData, subjects) => {
    form.value.student_name = studentName
    
    if (classData) {
        form.value.grade = `${classData.grade} (${classData.stage})`
    }
    
    if (subjects && subjects.length > 0) {
        form.value.subject = subjects.join('، ')
    }
}

const formattedContent = computed(() => {
    return generatedContent.value.replace(/\n/g, '<br>')
})

const generatePerformanceReview = async () => {
    loading.value = true
    try {
        const response = await fetch('/ai/generate-performance-review', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json'
            },
            body: JSON.stringify(form.value)
        })
        
        if (!response.ok) {
            throw new Error(`HTTP ${response.status}: ${response.statusText}`)
        }
        
        const data = await response.json()
        
        if (data.success) {
            generatedContent.value = data.content
        } else {
            throw new Error(data.error || 'خطأ غير معروف')
        }
    } catch (error) {
        console.error('Error generating performance review:', error)
        alert('حدث خطأ أثناء توليد تقرير الأداء. يرجى المحاولة مرة أخرى.')
    } finally {
        loading.value = false
    }
}

const copyToClipboard = async () => {
    try {
        await navigator.clipboard.writeText(generatedContent.value)
        alert('تم نسخ المحتوى بنجاح!')
    } catch (error) {
        console.error('Error copying to clipboard:', error)
        alert('فشل في نسخ المحتوى')
    }
}

const saveContent = async () => {
    try {
        await router.post('/ai/save-content', {
            type: 'performance_review',
            title: `تقرير أداء ${form.value.student_name} - ${form.value.subject}`,
            content: generatedContent.value,
            metadata: {
                student_name: form.value.student_name,
                subject: form.value.subject,
                grade: form.value.grade,
                strengths: form.value.strengths,
                weaknesses: form.value.weaknesses,
                recommendations: form.value.recommendations
            }
        })
        alert('تم حفظ المحتوى بنجاح!')
    } catch (error) {
        console.error('Error saving content:', error)
        alert('فشل في حفظ المحتوى')
    }
}
</script>