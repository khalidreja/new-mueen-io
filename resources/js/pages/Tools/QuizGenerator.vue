<template>
    <Head title="مولد الاختبارات - منصة مُعين" />

    <ArabicDashboardLayout>
        <div class="min-h-screen bg-gray-50 dark:bg-gray-900" dir="rtl">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
                <header class="mb-8">
                    <h2 class="text-3xl font-bold text-gray-800 dark:text-gray-200 flex items-center">
                        <span class="text-4xl ml-3">✍️</span>
                        مولد الاختبارات
                    </h2>
                    <p class="text-gray-600 dark:text-gray-400 mt-1">
                        أنشئ اختبارات قصيرة مخصصة لطلابك في دقائق.
                    </p>
                </header>

                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- Input Form -->
                    <div class="lg:col-span-1 bg-white dark:bg-gray-800 p-6 rounded-xl shadow-md">
                        <form @submit.prevent="generateQuiz" class="space-y-5">
                            <div class="bg-blue-50 dark:bg-blue-900 p-4 rounded-xl border border-blue-200 dark:border-blue-700">
                                <label for="topic" class="block text-sm font-semibold text-gray-800 dark:text-gray-200 mb-2">
                                    📝 موضوع الاختبار
                                </label>
                                <input 
                                    type="text" 
                                    id="topic" 
                                    v-model="form.topic"
                                    placeholder="مثال: الأمن السيبراني" 
                                    required 
                                    class="w-full px-4 py-3 border-2 border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 font-medium"
                                >
                            </div>

                            <div class="bg-green-50 dark:bg-green-900 p-4 rounded-xl border border-green-200 dark:border-green-700">
                                <label for="grade" class="block text-sm font-semibold text-gray-800 dark:text-gray-200 mb-2">
                                    🎓 المرحلة الدراسية
                                </label>
                                <input 
                                    type="text" 
                                    id="grade" 
                                    v-model="form.grade"
                                    placeholder="مثال: السنة الجامعية الأولى" 
                                    required 
                                    class="w-full px-4 py-3 border-2 border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 font-medium"
                                >
                            </div>

                            <div class="bg-yellow-50 dark:bg-yellow-900 p-4 rounded-xl border border-yellow-200 dark:border-yellow-700">
                                <label for="numQuestions" class="block text-sm font-semibold text-gray-800 dark:text-gray-200 mb-2">
                                    🔢 عدد الأسئلة
                                </label>
                                <input 
                                    type="number" 
                                    id="numQuestions" 
                                    v-model="form.num_questions"
                                    min="1" 
                                    max="15" 
                                    required 
                                    class="w-full px-4 py-3 border-2 border-gray-300 dark:border-gray-600 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 bg-white dark:bg-gray-700 text-gray-900 dark:text-gray-100 font-medium"
                                >
                                <p class="text-xs text-gray-600 dark:text-gray-400 mt-1 font-medium">حد أدنى: 1 سؤال | حد أقصى: 15 سؤال</p>
                            </div>

                            <div class="bg-purple-50 dark:bg-purple-900 p-4 rounded-xl border border-purple-200 dark:border-purple-700">
                                <label class="block text-sm font-semibold text-gray-800 dark:text-gray-200 mb-3">
                                    🎯 أنواع الأسئلة
                                </label>
                                <div class="space-y-3">
                                    <div class="flex items-center bg-white dark:bg-gray-700 p-3 rounded-lg border border-gray-200 dark:border-gray-600">
                                        <input 
                                            id="mcq" 
                                            type="checkbox" 
                                            v-model="form.question_types" 
                                            value="mcq"
                                            class="h-5 w-5 rounded border-gray-300 dark:border-gray-600 text-blue-600 focus:ring-blue-500"
                                        >
                                        <label for="mcq" class="mr-3 text-sm font-medium text-gray-800 dark:text-gray-200">
                                            🅰️ اختيار من متعدد
                                        </label>
                                    </div>
                                    <div class="flex items-center bg-white dark:bg-gray-700 p-3 rounded-lg border border-gray-200 dark:border-gray-600">
                                        <input 
                                            id="tf" 
                                            type="checkbox" 
                                            v-model="form.question_types" 
                                            value="true_false"
                                            class="h-5 w-5 rounded border-gray-300 dark:border-gray-600 text-blue-600 focus:ring-blue-500"
                                        >
                                        <label for="tf" class="mr-3 text-sm font-medium text-gray-800 dark:text-gray-200">
                                            ✅ صح وخطأ
                                        </label>
                                    </div>
                                    <div class="flex items-center bg-white dark:bg-gray-700 p-3 rounded-lg border border-gray-200 dark:border-gray-600">
                                        <input 
                                            id="sa" 
                                            type="checkbox" 
                                            v-model="form.question_types" 
                                            value="short_answer"
                                            class="h-5 w-5 rounded border-gray-300 dark:border-gray-600 text-blue-600 focus:ring-blue-500"
                                        >
                                        <label for="sa" class="mr-3 text-sm font-medium text-gray-800 dark:text-gray-200">
                                            ✍️ سؤال قصير
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <button 
                                type="submit" 
                                :disabled="loading || form.question_types.length === 0"
                                class="w-full bg-gradient-to-r from-blue-600 to-blue-700 text-white py-4 rounded-xl font-bold text-lg hover:from-blue-700 hover:to-blue-800 transition-all transform hover:scale-105 shadow-lg disabled:opacity-50 disabled:cursor-not-allowed disabled:transform-none flex items-center justify-center"
                            >
                                <span v-if="loading" class="animate-spin rounded-full h-5 w-5 border-b-2 border-white ml-2"></span>
                                {{ loading ? '🔄 جاري التوليد...' : '✨ ولّد الاختبار' }}
                            </button>
                        </form>
                    </div>

                    <!-- Generated Content -->
                    <div class="lg:col-span-2 bg-white dark:bg-gray-800 p-6 rounded-xl shadow-md overflow-auto">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-xl font-bold text-gray-800 dark:text-gray-200">الاختبار المُولّد</h3>
                            <div class="flex gap-2">
                                <button 
                                    v-if="generatedContent && !loading"
                                    @click="saveQuiz"
                                    class="bg-green-600 text-white px-4 py-2 rounded-lg font-semibold hover:bg-green-700 transition-colors text-sm"
                                >
                                    💾 حفظ الاختبار
                                </button>
                                <button 
                                    v-if="generatedContent && !loading"
                                    @click="printQuiz"
                                    class="bg-blue-600 text-white px-4 py-2 rounded-lg font-semibold hover:bg-blue-700 transition-colors text-sm"
                                >
                                    🖨️ طباعة
                                </button>
                            </div>
                        </div>

                        <div v-if="loading" class="text-center py-12">
                            <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-pink-600 mx-auto"></div>
                            <p class="mt-4 text-gray-600 dark:text-gray-400">يتم الآن وضع الأسئلة...</p>
                        </div>

                        <div v-else-if="generatedContent" class="prose max-w-none text-gray-700 dark:text-gray-300 dark:prose-invert">
                            <div id="quiz-content" class="bg-gray-50 dark:bg-gray-700 p-6 rounded-lg border border-gray-200 dark:border-gray-600" v-html="formattedContent"></div>
                        </div>

                        <div v-else class="text-center py-12 text-gray-500 dark:text-gray-400">
                            <span class="text-6xl block mb-4">✍️</span>
                            <p>سيظهر الاختبار هنا مع مفتاح الإجابات.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </ArabicDashboardLayout>
</template>

<script setup lang="ts">
import ArabicDashboardLayout from '@/layouts/ArabicDashboardLayout.vue';
import { type BreadcrumbItem } from '@/types';
import { Head } from '@inertiajs/vue3';
import { ref, computed } from 'vue';
import axios from 'axios';

const breadcrumbs: BreadcrumbItem[] = [
    { title: 'لوحة التحكم', href: '/dashboard' },
    { title: 'مولد الاختبارات', href: '/quiz-generator' },
];

const form = ref({
    topic: '',
    grade: '',
    num_questions: 5,
    question_types: ['mcq'] as string[]
});

const generatedContent = ref('');
const loading = ref(false);

const formattedContent = computed(() => {
    if (!generatedContent.value) return '';
    
    return generatedContent.value
        .replace(/\n/g, '<br>')
        .replace(/# (.*)/g, '<h2 class="text-2xl font-bold mt-6 mb-4 text-gray-800 dark:text-gray-200">$1</h2>')
        .replace(/## (.*)/g, '<h3 class="text-lg font-semibold mt-4 mb-2 text-gray-800 dark:text-gray-200">$1</h3>')
        .replace(/### (.*)/g, '<h4 class="text-md font-semibold mt-3 mb-1 text-gray-700 dark:text-gray-300">$1</h4>')
        .replace(/\*\*(.*?)\*\*/g, '<strong class="font-semibold">$1</strong>')
        .replace(/^(\d+\.) (.*)/gm, '<div class="mb-3"><span class="font-semibold text-pink-600 dark:text-pink-400">$1</span> $2</div>')
        .replace(/^([أ-ي]\)) (.*)/gm, '<div class="mr-4 mb-1">$1 $2</div>');
});

const generateQuiz = async () => {
    if (!form.value.topic || !form.value.grade) {
        alert('يرجى ملء جميع الحقول المطلوبة')
        return
    }
    
    loading.value = true
    try {
        // الحصول على CSRF token
        const csrfToken = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content') || '';
        
        const response = await fetch('/ai/generate-quiz', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'Accept': 'application/json',
                'X-CSRF-TOKEN': csrfToken
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
        console.error('Error generating quiz:', error)
        alert('حدث خطأ أثناء توليد الاختبار. يرجى المحاولة مرة أخرى.')
    } finally {
        loading.value = false
    }
}

const saveQuiz = async () => {
    if (!generatedContent.value) return;

    try {
        const response = await axios.post('/ai/save-content', {
            type: 'quiz',
            title: `اختبار: ${form.value.topic}`,
            content: generatedContent.value,
            input_data: {
                topic: form.value.topic,
                grade: form.value.grade,
                num_questions: form.value.num_questions,
                question_types: form.value.question_types
            }
        });

        if (response.data.success) {
            alert('تم حفظ الاختبار بنجاح');
        }
    } catch (error) {
        console.error('Error saving quiz:', error);
        alert('حدث خطأ في حفظ الاختبار');
    }
};

const printQuiz = () => {
    const printContent = document.getElementById('quiz-content');
    if (!printContent) return;

    const printWindow = window.open('', '_blank');
    if (!printWindow) return;

    printWindow.document.write(`
        <!DOCTYPE html>
        <html dir="rtl" lang="ar">
        <head>
            <meta charset="UTF-8">
            <title>اختبار: ${form.value.topic}</title>
            <style>
                body { font-family: 'Arial', sans-serif; direction: rtl; margin: 20px; }
                h2, h3, h4 { color: #1f2937; }
                .font-semibold { font-weight: 600; }
                .mb-3 { margin-bottom: 12px; }
                .mr-4 { margin-right: 16px; }
                .mb-1 { margin-bottom: 4px; }
                @media print { body { margin: 0; } }
            </style>
        </head>
        <body>
            ${printContent.innerHTML}
        </body>
        </html>
    `);
    printWindow.document.close();
    printWindow.print();
};
</script>

<style scoped>
.prose {
    text-align: right;
    direction: rtl;
}
</style>