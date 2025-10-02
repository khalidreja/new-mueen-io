<script setup lang="ts">
import ArabicDashboardLayout from '@/layouts/ArabicDashboardLayout.vue';
import { Head, Link } from '@inertiajs/vue3';

interface Props {
    stats: {
        lesson_plans_count: number;
        generated_content_count: number;
        classes_count: number;
        recent_lesson_plans: any[];
        recent_content: any[];
    };
    teacher: any;
}

const props = defineProps<Props>();

const tools = [
    {
        title: 'ملف الإنجاز المهني',
        description: 'حوّل عناصر تقييم الأداء إلى ملف إنجاز تفاعلي.',
        emoji: '⭐',
        url: '/performance-review',
        color: 'amber-500'
    },
    {
        title: 'مساعد رسائل أولياء الأمور',
        description: 'أنشئ رسائل احترافية ومخصصة لأولياء الأمور.',
        emoji: '💬',
        url: '/parent-communication',
        color: 'cyan-600'
    },
    {
        title: 'توليد خطط الدروس',
        description: 'أنشئ خطط دروس متكاملة ومفصلة في ثوانٍ.',
        emoji: '📝',
        url: '/lesson-plans',
        color: 'blue-600'
    },
    {
        title: 'مولد الأهداف التعليمية',
        description: 'احصل على أهداف تعليمية مصاغة باحترافية.',
        emoji: '🎯',
        url: '/objectives-generator',
        color: 'purple-600'
    },
    {
        title: 'مبسّط المفاهيم',
        description: 'حوّل المواضيع المعقدة إلى شروحات بسيطة.',
        emoji: '⚛️',
        url: '/concept-simplifier',
        color: 'green-600'
    },
    {
        title: 'توليد أفكار للأنشطة',
        description: 'احصل على أفكار لأنشطة صفية تفاعلية.',
        emoji: '💡',
        url: '/activity-generator',
        color: 'blue-600'
    },
    {
        title: 'مقترح الاستراتيجيات',
        description: 'احصل على استشارات تربوية لأفضل طرق التدريس.',
        emoji: '📊',
        url: '/strategy-generator',
        color: 'indigo-600'
    },
    {
        title: 'مولد الاختبارات',
        description: 'أنشئ اختبارات قصيرة ومتنوعة مع مفتاح للإجابات.',
        emoji: '✍️',
        url: '/quiz-generator',
        color: 'pink-600'
    },
    {
        title: 'مولد معايير التقييم',
        description: 'أنشئ معايير تقييم (Rubrics) مفصلة للمشاريع والواجبات.',
        emoji: '⚖️',
        url: '/rubric-generator',
        color: 'gray-700'
    },
    {
        title: 'مولد القصص التعليمية',
        description: 'أنشئ قصصًا قصيرة وجذابة لطلابك حول أي موضوع.',
        emoji: '📖',
        url: '/story-generator',
        color: 'orange-500'
    },
    {
        title: 'مولد ملاحظات السجلات',
        description: 'أنشئ ملاحظات دقيقة واحترافية لسجلات الطلاب وتقاريرهم.',
        emoji: '📇',
        url: '/report-card-generator',
        color: 'rose-500'
    },
    {
        title: 'عجلة الاختيار الذكية',
        description: 'أداة ممتعة للاختيار العشوائي مدعومة بالذكاء الاصطناعي.',
        emoji: '🎡',
        url: '/wheel',
        color: 'teal-500'
    }
];
</script>

<template>
    <Head title="منصة مُعين التعليمية - لوحة التحكم" />

    <ArabicDashboardLayout>
        <!-- Header Section -->
        <div class="bg-white shadow-sm border-b">
            <div class="px-6 py-6">
                <h1 class="text-3xl font-bold text-gray-900 mb-2">
                    أهلاً بك في منصة مُعين التعليمية
                </h1>
                <p class="text-gray-600">
                    اختر إحدى أدوات الذكاء الاصطناعي للبدء في رحلتك الإبداعية
                </p>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 overflow-y-auto bg-gray-50 p-6">
            <!-- Stats Section -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <div class="bg-white rounded-xl shadow-sm p-6 border">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center">
                                <span class="text-2xl">📝</span>
                            </div>
                        </div>
                        <div class="mr-4">
                            <p class="text-sm font-medium text-gray-600">خطط الدروس</p>
                            <p class="text-2xl font-bold text-gray-900">{{ stats.lesson_plans_count }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm p-6 border">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 bg-purple-100 rounded-lg flex items-center justify-center">
                                <span class="text-2xl">🎯</span>
                            </div>
                        </div>
                        <div class="mr-4">
                            <p class="text-sm font-medium text-gray-600">المحتوى المولد</p>
                            <p class="text-2xl font-bold text-gray-900">{{ stats.generated_content_count }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm p-6 border">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 bg-green-100 rounded-lg flex items-center justify-center">
                                <span class="text-2xl">👥</span>
                            </div>
                        </div>
                        <div class="mr-4">
                            <p class="text-sm font-medium text-gray-600">الفصول</p>
                            <p class="text-2xl font-bold text-gray-900">{{ stats.classes_count }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white rounded-xl shadow-sm p-6 border">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 bg-amber-100 rounded-lg flex items-center justify-center">
                                <span class="text-2xl">⭐</span>
                            </div>
                        </div>
                        <div class="mr-4">
                            <p class="text-sm font-medium text-gray-600">المفضلة</p>
                            <p class="text-2xl font-bold text-gray-900">
                                {{ stats.recent_lesson_plans.filter((plan: any) => plan.is_favorite).length }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tools Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 mb-8">
                <div 
                    v-for="tool in tools" 
                    :key="tool.url"
                    class="bg-white rounded-xl shadow-sm hover:shadow-lg border transition-all duration-300 hover:-translate-y-1 cursor-pointer group"
                >
                    <Link :href="tool.url" class="block p-6 h-full">
                        <div class="flex flex-col h-full">
                            <div class="text-4xl mb-4">{{ tool.emoji }}</div>
                            <h3 class="text-lg font-bold text-gray-900 mb-2 group-hover:text-blue-600 transition-colors">
                                {{ tool.title }}
                            </h3>
                            <p class="text-gray-600 mb-4 flex-grow text-sm leading-relaxed">
                                {{ tool.description }}
                            </p>
                            <div class="w-full mt-auto bg-blue-600 text-white py-2.5 rounded-lg font-semibold transition-colors hover:bg-blue-700 text-center">
                                ابدأ الآن ←
                            </div>
                        </div>
                    </Link>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Recent Lesson Plans -->
                <div class="bg-white rounded-xl shadow-sm border">
                    <div class="p-6 border-b">
                        <h3 class="text-lg font-semibold text-gray-900">خطط الدروس الأخيرة</h3>
                    </div>
                    <div class="p-6">
                        <div v-if="stats.recent_lesson_plans.length > 0" class="space-y-4">
                            <div 
                                v-for="plan in stats.recent_lesson_plans" 
                                :key="plan.id"
                                class="flex items-center justify-between p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors"
                            >
                                <div>
                                    <h4 class="font-medium text-gray-900">{{ plan.title }}</h4>
                                    <p class="text-sm text-gray-600">{{ plan.subject }} - {{ plan.grade_level }}</p>
                                </div>
                                <Link 
                                    :href="`/lesson-plans/${plan.id}`"
                                    class="text-blue-600 hover:text-blue-800 text-sm font-medium"
                                >
                                    عرض
                                </Link>
                            </div>
                        </div>
                        <div v-else class="text-center py-8 text-gray-500">
                            لم يتم إنشاء أي خطط دروس بعد
                        </div>
                    </div>
                </div>

                <!-- Recent Generated Content -->
                <div class="bg-white rounded-xl shadow-sm border">
                    <div class="p-6 border-b">
                        <h3 class="text-lg font-semibold text-gray-900">المحتوى المولد مؤخراً</h3>
                    </div>
                    <div class="p-6">
                        <div v-if="stats.recent_content.length > 0" class="space-y-4">
                            <div 
                                v-for="content in stats.recent_content" 
                                :key="content.id"
                                class="flex items-center justify-between p-3 bg-gray-50 rounded-lg hover:bg-gray-100 transition-colors"
                            >
                                <div>
                                    <h4 class="font-medium text-gray-900">{{ content.title }}</h4>
                                    <p class="text-sm text-gray-600">{{ content.type }}</p>
                                </div>
                                <span class="text-xs text-gray-500">
                                    {{ new Date(content.created_at).toLocaleDateString('ar-SA') }}
                                </span>
                            </div>
                        </div>
                        <div v-else class="text-center py-8 text-gray-500">
                            لم يتم توليد أي محتوى بعد
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </ArabicDashboardLayout>
</template>

<style scoped>
/* Add custom RTL styles if needed */
</style>
