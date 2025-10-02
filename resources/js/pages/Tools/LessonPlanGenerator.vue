<template>
    <Head title="مولد خطط الدروس - منصة مُعين" />

    <ArabicDashboardLayout>
        <div class="min-h-screen bg-gray-50 overflow-auto" dir="rtl">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                <header class="mb-8">
                    <h2 class="text-3xl font-bold text-gray-800 flex items-center">
                        <span class="text-4xl ml-3">📝</span>
                        مولد خطط الدروس
                    </h2>
                    <p class="text-gray-600 mt-1">
                        أدخل تفاصيل الدرس ليقوم الذكاء الاصطناعي بإنشاء خطة متكاملة لك.
                    </p>
                </header>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- Input Form -->
                    <div class="lg:col-span-1 bg-white p-6 rounded-xl shadow-md overflow-auto">
                        <form @submit.prevent="generateLessonPlan" class="space-y-5">
                            <!-- مكون اختيار الطالب والفصل -->
                            <div>
                                <h3 class="text-lg font-semibold text-gray-800 mb-3 flex items-center">
                                    <span class="text-blue-600 ml-2">📚</span>
                                    معلومات الفصل
                                </h3>
                                <StudentSelector 
                                    :show-subjects="true"
                                    :show-students="false"
                                    @student-selected="onClassSelected"
                                    ref="studentSelector"
                                />
                            </div>

                            <div>
                                <label for="subject" class="block text-sm font-medium text-gray-700 mb-1">
                                    المادة
                                </label>
                                <input 
                                    type="text" 
                                    id="subject" 
                                    v-model="form.subject"
                                    placeholder="مثال: العلوم" 
                                    required 
                                    class="w-full p-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                >
                            </div>

                            <div>
                                <label for="grade" class="block text-sm font-medium text-gray-700 mb-1">
                                    المرحلة والصف
                                </label>
                                <input 
                                    type="text" 
                                    id="grade" 
                                    v-model="form.grade"
                                    placeholder="مثال: الصف الأول متوسط" 
                                    required 
                                    class="w-full p-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                >
                            </div>

                            <div>
                                <label for="class_name" class="block text-sm font-medium text-gray-700 mb-1">
                                    اسم الفصل
                                </label>
                                <input 
                                    type="text" 
                                    id="class_name" 
                                    v-model="form.class_name"
                                    placeholder="مثال: 1أ" 
                                    required 
                                    class="w-full p-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                >
                            </div>

                            <div>
                                <label for="duration" class="block text-sm font-medium text-gray-700 mb-1">
                                    مدة الحصة (بالدقائق)
                                </label>
                                <input 
                                    type="number" 
                                    id="duration" 
                                    v-model="form.duration"
                                    placeholder="45" 
                                    required 
                                    min="1"
                                    class="w-full p-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                >
                            </div>

                            <div>
                                <label for="topic" class="block text-sm font-medium text-gray-700 mb-1">
                                    الموضوع
                                </label>
                                <textarea 
                                    id="topic" 
                                    v-model="form.topic"
                                    placeholder="مثال: الخلية النباتية والحيوانية" 
                                    required 
                                    rows="3" 
                                    class="w-full p-2.5 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                                ></textarea>
                            </div>

                            <button 
                                type="submit" 
                                :disabled="loading"
                                class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition-colors shadow-sm disabled:opacity-50 disabled:cursor-not-allowed flex items-center justify-center"
                            >
                                <span v-if="loading" class="animate-spin rounded-full h-4 w-4 border-b-2 border-white ml-2"></span>
                                {{ loading ? 'جاري التوليد...' : '✨ ولّد الخطة الآن' }}
                            </button>
                        </form>
                    </div>

                    <!-- Generated Content -->
                    <div class="lg:col-span-2 bg-white p-6 rounded-xl shadow-md">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-xl font-bold text-gray-800">الخطة المُولّدة</h3>
                            <button 
                                v-if="generatedContent && !loading"
                                @click="saveLessonPlan"
                                class="bg-green-600 text-white px-4 py-2 rounded-lg font-semibold hover:bg-green-700 transition-colors text-sm"
                            >
                                💾 حفظ الخطة
                            </button>
                        </div>

                        <div v-if="loading" class="text-center py-12">
                            <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-blue-600 mx-auto"></div>
                            <p class="mt-4 text-gray-600">يقوم الذكاء الاصطناعي بإعداد الخطة...</p>
                        </div>

                        <div v-else-if="generatedContent" class="prose max-w-none text-gray-700">
                            <div class="bg-gray-50 p-4 rounded-md border" v-html="formattedContent"></div>
                        </div>

                        <div v-else class="text-center py-12 text-gray-500">
                            <span class="text-6xl block mb-4">📝</span>
                            <p>ستظهر نتيجة الخطة الدراسية هنا.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </ArabicDashboardLayout>
</template>

<script setup lang="ts">
import ArabicDashboardLayout from '@/layouts/ArabicDashboardLayout.vue';
import StudentSelector from '@/components/StudentSelector.vue';
import { type BreadcrumbItem } from '@/types';
import { Head, router } from '@inertiajs/vue3';
import { ref, computed } from 'vue';
import axios from 'axios';

const breadcrumbs: BreadcrumbItem[] = [
    { title: 'لوحة التحكم', href: '/dashboard' },
    { title: 'مولد خطط الدروس', href: '/lesson-plans/generate' },
];

const form = ref({
    subject: '',
    grade: '',
    class_name: '',
    duration: 45,
    topic: ''
});

const studentSelector = ref(null);

// دالة للتعامل مع اختيار الفصل
const onClassSelected = (studentName: string, classData?: any, subjects?: string[]) => {
    if (classData) {
        form.value.grade = `${classData.grade} (${classData.stage})`;
        form.value.class_name = classData.name;
    }
    
    if (subjects && subjects.length > 0) {
        form.value.subject = subjects.join('، ');
    }
};

const generatedContent = ref('');
const loading = ref(false);

const formattedContent = computed(() => {
    if (!generatedContent.value) return '';
    
    // Convert markdown-like content to HTML
    return generatedContent.value
        .replace(/\n/g, '<br>')
        .replace(/## (.*)/g, '<h3 class="text-lg font-semibold mt-4 mb-2 text-gray-800">$1</h3>')
        .replace(/### (.*)/g, '<h4 class="text-md font-semibold mt-3 mb-1 text-gray-700">$1</h4>')
        .replace(/\*\*(.*?)\*\*/g, '<strong class="font-semibold">$1</strong>')
        .replace(/- (.*)/g, '<li class="mr-4">$1</li>');
});

const generateLessonPlan = async () => {
    if (!form.value.subject || !form.value.grade || !form.value.topic) {
        alert('يرجى ملء جميع الحقول المطلوبة');
        return;
    }

    loading.value = true;
    generatedContent.value = '';

    try {
        const response = await fetch('/ai/generate-lesson-plan', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || ''
            },
            body: JSON.stringify({
                subject: form.value.subject,
                grade: form.value.grade,
                topic: form.value.topic
            })
        });
        
        if (!response.ok) {
            throw new Error(`HTTP ${response.status}: ${response.statusText}`);
        }
        
        const data = await response.json();
        
        if (data.success) {
            generatedContent.value = data.content;
        } else {
            throw new Error(data.error || 'خطأ غير معروف');
        }
    } catch (error) {
        console.error('Error generating lesson plan:', error);
        alert('حدث خطأ في توليد خطة الدرس. يرجى المحاولة مرة أخرى.');
    } finally {
        loading.value = false;
    }
};

const saveLessonPlan = async () => {
    if (!generatedContent.value) return;

    try {
        const response = await axios.post('/lesson-plans', {
            title: `خطة درس: ${form.value.topic}`,
            subject: form.value.subject,
            grade: form.value.grade,
            class_name: form.value.class_name,
            duration: form.value.duration,
            content: generatedContent.value,
            objectives: [], // سيتم استخراجها من المحتوى لاحقاً
            activities: [], // سيتم استخراجها من المحتوى لاحقاً
            resources: [],
            assessment: null,
            notes: `تم إنشاؤها باستخدام مولد خطط الدروس - الموضوع: ${form.value.topic}`,
            lesson_date: null,
            status: 'draft'
        });

        if (response.data.success) {
            alert('تم حفظ خطة الدرس بنجاح! 🎉');
            // إعادة توجيه للصفحة الجديدة
            router.visit('/lesson-plans');
        }
    } catch (error) {
        console.error('Error saving lesson plan:', error);
        alert('حدث خطأ في حفظ خطة الدرس');
    }
};
</script>

<style scoped>
/* Custom RTL and Arabic text styles */
.prose {
    text-align: right;
    direction: rtl;
}

.prose h3, .prose h4 {
    color: #1f2937;
}

.prose li {
    list-style-type: disc;
    margin-right: 1rem;
}
</style>