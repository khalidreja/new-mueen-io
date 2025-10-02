<template>
    <Head title="مبسّط المفاهيم - منصة مُعين" />

    <ArabicDashboardLayout>
        <div class="min-h-screen bg-gray-50 overflow-auto" dir="rtl">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                <!-- Header -->
                <div class="flex items-center justify-between mb-8">
                    <div>
                        <h2 class="text-3xl font-bold text-gray-800 flex items-center">
                            <span class="text-4xl ml-3">⚛️</span>
                            مبسّط المفاهيم
                        </h2>
                        <p class="text-gray-600 mt-1">
                            حوّل المواضيع المعقدة إلى شروحات بسيطة وسهلة الفهم
                        </p>
                    </div>
                </div>

                <!-- Main Content -->
                <div class="bg-white rounded-xl shadow-sm p-6">
                    <form @submit.prevent="generateSimplification" class="space-y-6">
                        <!-- Basic Information -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">
                                    المادة الدراسية
                                </label>
                                <input
                                    id="subject"
                                    v-model="form.subject"
                                    type="text"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                    placeholder="مثل: الرياضيات، الفيزياء، الكيمياء"
                                    required
                                />
                            </div>

                            <div>
                                <label for="grade" class="block text-sm font-medium text-gray-700 mb-2">
                                    الصف الدراسي
                                </label>
                                <input
                                    id="grade"
                                    v-model="form.grade"
                                    type="text"
                                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                    placeholder="مثل: الصف الثامن المتوسط"
                                    required
                                />
                            </div>
                        </div>

                        <!-- Complex Concept -->
                        <div>
                            <label for="complexConcept" class="block text-sm font-medium text-gray-700 mb-2">
                                المفهوم المعقد المراد تبسيطه
                            </label>
                            <textarea
                                id="complexConcept"
                                v-model="form.complexConcept"
                                rows="4"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                placeholder="اكتب المفهوم أو الموضوع المعقد الذي تريد تبسيطه للطلاب..."
                                required
                            ></textarea>
                        </div>

                        <!-- Target Audience Level -->
                        <div>
                            <label for="audienceLevel" class="block text-sm font-medium text-gray-700 mb-2">
                                مستوى الجمهور المستهدف
                            </label>
                            <select
                                id="audienceLevel"
                                v-model="form.audienceLevel"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            >
                                <option value="beginner">مبتدئ - لا يوجد معرفة مسبقة</option>
                                <option value="elementary">أساسي - معرفة محدودة</option>
                                <option value="intermediate">متوسط - بعض المعرفة السابقة</option>
                                <option value="advanced">متقدم - معرفة جيدة بالأساسيات</option>
                            </select>
                        </div>

                        <!-- Simplification Style -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-2">
                                أسلوب التبسيط المطلوب
                            </label>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <label class="flex items-center">
                                    <input 
                                        type="checkbox" 
                                        v-model="form.simplificationMethods" 
                                        value="analogies"
                                        class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                    />
                                    <span class="mr-2">التشبيهات والقياسات</span>
                                </label>
                                <label class="flex items-center">
                                    <input 
                                        type="checkbox" 
                                        v-model="form.simplificationMethods" 
                                        value="examples"
                                        class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                    />
                                    <span class="mr-2">أمثلة من الحياة اليومية</span>
                                </label>
                                <label class="flex items-center">
                                    <input 
                                        type="checkbox" 
                                        v-model="form.simplificationMethods" 
                                        value="stories"
                                        class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                    />
                                    <span class="mr-2">القصص والحكايات</span>
                                </label>
                                <label class="flex items-center">
                                    <input 
                                        type="checkbox" 
                                        v-model="form.simplificationMethods" 
                                        value="visual"
                                        class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                    />
                                    <span class="mr-2">الوصف البصري والرسوم التوضيحية</span>
                                </label>
                                <label class="flex items-center">
                                    <input 
                                        type="checkbox" 
                                        v-model="form.simplificationMethods" 
                                        value="stepbystep"
                                        class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                    />
                                    <span class="mr-2">التفسير خطوة بخطوة</span>
                                </label>
                                <label class="flex items-center">
                                    <input 
                                        type="checkbox" 
                                        v-model="form.simplificationMethods" 
                                        value="interactive"
                                        class="rounded border-gray-300 text-blue-600 shadow-sm focus:border-blue-300 focus:ring focus:ring-blue-200 focus:ring-opacity-50"
                                    />
                                    <span class="mr-2">الأنشطة التفاعلية</span>
                                </label>
                            </div>
                        </div>

                        <!-- Additional Context -->
                        <div>
                            <label for="additionalContext" class="block text-sm font-medium text-gray-700 mb-2">
                                سياق إضافي أو توجيهات خاصة
                            </label>
                            <textarea
                                id="additionalContext"
                                v-model="form.additionalContext"
                                rows="3"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                placeholder="أي معلومات إضافية أو توجيهات خاصة لتبسيط المفهوم..."
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
                                {{ loading ? 'جاري التوليد...' : 'تبسيط المفهوم' }}
                            </button>
                        </div>
                    </form>

                    <!-- Generated Content -->
                    <div v-if="generatedContent" class="mt-8 border-t pt-8">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-xl font-bold text-gray-800">المفهوم المبسط</h3>
                            <div class="flex space-x-2 space-x-reverse">
                                <button
                                    @click="copyToClipboard"
                                    class="bg-gray-100 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-200 transition-colors flex items-center text-sm"
                                >
                                    <span class="ml-2">📋</span>
                                    نسخ
                                </button>
                                <button
                                    @click="saveContent"
                                    class="bg-green-100 text-green-700 px-4 py-2 rounded-lg hover:bg-green-200 transition-colors flex items-center text-sm"
                                >
                                    <span class="ml-2">💾</span>
                                    حفظ
                                </button>
                            </div>
                        </div>
                        <div class="bg-gray-50 rounded-lg p-6 prose prose-lg max-w-none">
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
import { router } from '@inertiajs/vue3'

const form = ref({
    subject: '',
    grade: '',
    complexConcept: '',
    audienceLevel: 'intermediate',
    simplificationMethods: [],
    additionalContext: ''
})

const generatedContent = ref('')
const loading = ref(false)

const formattedContent = computed(() => {
    return generatedContent.value.replace(/\n/g, '<br>')
})

const generateSimplification = async () => {
    loading.value = true
    try {
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';
        const response = await fetch('/ai/generate-concept', {
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
            throw new Error(data.error || 'خطأ غير معروف');
        }
    } catch (error) {
        console.error('Error generating concept simplification:', error)
        alert('حدث خطأ أثناء تبسيط المفهوم. يرجى المحاولة مرة أخرى.')
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
            type: 'concept_simplification',
            title: `تبسيط مفهوم - ${form.value.subject}`,
            content: generatedContent.value,
            metadata: {
                subject: form.value.subject,
                grade: form.value.grade,
                audience_level: form.value.audienceLevel,
                methods: form.value.simplificationMethods
            }
        })
        alert('تم حفظ المحتوى بنجاح!')
    } catch (error) {
        console.error('Error saving content:', error)
        alert('فشل في حفظ المحتوى')
    }
}
</script>