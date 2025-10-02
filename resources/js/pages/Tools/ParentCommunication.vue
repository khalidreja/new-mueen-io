<template>
    <Head title="التواصل مع أولياء الأمور - منصة مُعين" />

    <ArabicDashboardLayout>
        <div class="min-h-screen bg-gray-50 overflow-auto" dir="rtl">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                <!-- Header -->
                <div class="flex items-center justify-between mb-8">
                    <div>
                        <h2 class="text-3xl font-bold text-gray-800 flex items-center">
                            <span class="text-4xl ml-3">👨‍👩‍👧‍👦</span>
                            التواصل مع أولياء الأمور
                        </h2>
                        <p class="text-gray-600 mt-1">
                            أنشئ رسائل احترافية ومؤثرة للتواصل مع أولياء الأمور
                        </p>
                    </div>
                </div>

                <!-- Main Content -->
                <div class="bg-white rounded-xl shadow-sm p-6">
                    <form @submit.prevent="generateMessage" class="space-y-6">
                        <!-- Message Type -->
                        <div>
                            <label for="messageType" class="block text-sm font-medium text-gray-700 mb-2">
                                نوع الرسالة
                            </label>
                            <select
                                id="messageType"
                                v-model="form.messageType"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                required
                            >
                                <option value="">اختر نوع الرسالة</option>
                                <option value="academic_progress">تقرير الأداء الأكاديمي</option>
                                <option value="behavior_positive">سلوك إيجابي</option>
                                <option value="behavior_concern">قلق سلوكي</option>
                                <option value="absence">غياب الطالب</option>
                                <option value="homework">الواجبات المنزلية</option>
                                <option value="event_invitation">دعوة لحدث مدرسي</option>
                                <option value="meeting_request">طلب لقاء</option>
                                <option value="appreciation">شكر وتقدير</option>
                                <option value="general_update">تحديث عام</option>
                            </select>
                        </div>

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

                        <!-- Parent Information -->
                        <div>
                            <label for="parentName" class="block text-sm font-medium text-gray-700 mb-2">
                                اسم ولي الأمر
                            </label>
                            <input
                                id="parentName"
                                v-model="form.parentName"
                                type="text"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                placeholder="أدخل اسم ولي الأمر"
                            />
                        </div>

                        <!-- Message Details -->
                        <div>
                            <label for="messageDetails" class="block text-sm font-medium text-gray-700 mb-2">
                                تفاصيل الرسالة
                            </label>
                            <textarea
                                id="messageDetails"
                                v-model="form.messageDetails"
                                rows="5"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                                placeholder="اكتب التفاصيل المحددة التي تريد تضمينها في الرسالة..."
                                required
                            ></textarea>
                        </div>

                        <!-- Tone -->
                        <div>
                            <label for="tone" class="block text-sm font-medium text-gray-700 mb-2">
                                نبرة الرسالة
                            </label>
                            <select
                                id="tone"
                                v-model="form.tone"
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                            >
                                <option value="formal">رسمية</option>
                                <option value="friendly">ودية</option>
                                <option value="concerned">قلقة</option>
                                <option value="appreciative">شاكرة</option>
                                <option value="encouraging">محفزة</option>
                            </select>
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
                                {{ loading ? 'جاري التوليد...' : 'توليد الرسالة' }}
                            </button>
                        </div>
                    </form>

                    <!-- Generated Content -->
                    <div v-if="generatedContent" class="mt-8 border-t pt-8">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-xl font-bold text-gray-800">الرسالة المولدة</h3>
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
import StudentSelector from '@/components/StudentSelector.vue'
import { ref, computed } from 'vue'
import { router } from '@inertiajs/vue3'

const form = ref({
    messageType: '',
    studentName: '',
    parentName: '',
    grade: '',
    subject: '',
    messageDetails: '',
    tone: 'formal'
})

const generatedContent = ref('')
const loading = ref(false)
const studentSelector = ref(null)

const formattedContent = computed(() => {
    return generatedContent.value.replace(/\n/g, '<br>')
})

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

const generateMessage = async () => {
    loading.value = true
    try {
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';
        const response = await fetch('/ai/generate-parent-message', {
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
        console.error('Error generating message:', error)
        alert('حدث خطأ أثناء توليد الرسالة. يرجى المحاولة مرة أخرى.')
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
            type: 'parent_communication',
            title: `رسالة لولي أمر ${form.value.studentName} - ${form.value.messageType}`,
            content: generatedContent.value,
            metadata: {
                student_name: form.value.studentName,
                parent_name: form.value.parentName,
                message_type: form.value.messageType,
                grade: form.value.grade,
                subject: form.value.subject
            }
        })
        alert('تم حفظ المحتوى بنجاح!')
    } catch (error) {
        console.error('Error saving content:', error)
        alert('فشل في حفظ المحتوى')
    }
}
</script>