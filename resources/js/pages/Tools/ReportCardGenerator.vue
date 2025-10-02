<template>
    <Head title="مولد ملاحظات السجلات - منصة مُعين" />

    <ArabicDashboardLayout>
        <div class="min-h-screen bg-gray-50 overflow-auto" dir="rtl">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                <div class="flex items-center justify-between mb-8">
                    <div>
                        <h2 class="text-3xl font-bold text-gray-800 flex items-center">
                            <span class="text-4xl ml-3">📇</span>
                            مولد ملاحظات السجلات
                        </h2>
                        <p class="text-gray-600 mt-1">
                            أنشئ ملاحظات دقيقة واحترافية لسجلات الطلاب وتقاريرهم
                        </p>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm p-6">
                    <form @submit.prevent="generateReportCard" class="space-y-6">
                        <!-- Student Selection -->
                        <div class="bg-blue-50 rounded-lg p-6 border border-blue-200">
                            <h3 class="text-lg font-medium text-gray-800 mb-4 flex items-center">
                                <span class="ml-2">👤</span>
                                معلومات الطالب
                            </h3>
                            <StudentSelector 
                                :show-subjects="true"
                                @student-selected="onStudentSelected"
                                ref="studentSelector"
                            />
                        </div>

                        <div>
                            <label for="period" class="block text-sm font-medium text-gray-700 mb-2">الفترة الزمنية</label>
                            <input id="period" v-model="form.period" type="text" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="مثل: الفصل الدراسي الأول" required />
                        </div>

                        <div>
                            <label for="performance" class="block text-sm font-medium text-gray-700 mb-2">ملاحظات الأداء</label>
                            <textarea id="performance" v-model="form.performance" rows="4" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent" placeholder="اكتب الملاحظات والتقييمات..." required></textarea>
                        </div>

                        <div class="flex justify-center">
                            <button type="submit" :disabled="loading" class="bg-blue-600 text-white px-8 py-3 rounded-lg font-semibold hover:bg-blue-700 transition-colors shadow-sm disabled:opacity-50 disabled:cursor-not-allowed flex items-center">
                                <span v-if="loading" class="ml-2">
                                    <svg class="animate-spin h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 714 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                </span>
                                {{ loading ? 'جاري التوليد...' : 'توليد ملاحظات السجل' }}
                            </button>
                        </div>
                    </form>

                    <div v-if="generatedContent" class="mt-8 border-t pt-8">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-xl font-bold text-gray-800">ملاحظات السجل المولدة</h3>
                            <button @click="copyToClipboard" class="bg-gray-100 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-200 transition-colors flex items-center text-sm">
                                <span class="ml-2">📋</span>
                                نسخ
                            </button>
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
import StudentSelector from '@/components/StudentSelector.vue'
import { ref, computed } from 'vue'

const form = ref({ studentName: '', subject: '', grade: '', period: '', performance: '' })
const generatedContent = ref('')
const loading = ref(false)
const studentSelector = ref(null)

// دالة للتعامل مع اختيار الطالب
const onStudentSelected = (studentName, classData, subjects) => {
    form.value.studentName = studentName
    
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

const generateReportCard = async () => {
    loading.value = true
    try {
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';
        const response = await fetch('/ai/generate-report-card', {
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
        console.error('Error generating report card:', error)
        alert('حدث خطأ أثناء توليد ملاحظات السجل.')
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