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
        title: 'مولد خطط الدروس',
        description: 'أنشئ خطط دروس متكاملة ومفصلة في ثوانٍ.',
        emoji: '📝',
        url: '/lesson-plan-generator',
        color: 'blue-600'
    },
    {
        title: 'إدارة خطط الدروس',
        description: 'عرض وإدارة خطط الدروس المحفوظة والمتاحة.',
        emoji: '📚',
        url: '/lesson-plans',
        color: 'indigo-600'
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
        <div class="bg-card shadow-sm border-b border-border">
            <div class="px-6 py-6">
                <h1 class="text-3xl font-bold text-foreground mb-2">
                    أهلاً بك في منصة مُعين التعليمية
                </h1>
                <p class="text-muted-foreground">
                    اختر إحدى أدوات الذكاء الاصطناعي للبدء في رحلتك الإبداعية
                </p>
            </div>
        </div>

        <!-- Main Content -->
        <div class="flex-1 overflow-y-auto bg-background p-6">
            <!-- Stats Section -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <div class="bg-card rounded-xl shadow-sm p-6 border border-border">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 bg-primary/10 rounded-lg flex items-center justify-center">
                                <span class="text-2xl">📝</span>
                            </div>
                        </div>
                        <div class="mr-4">
                            <p class="text-sm font-medium text-muted-foreground">خطط الدروس</p>
                            <p class="text-2xl font-bold text-foreground">{{ stats.lesson_plans_count }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-card rounded-xl shadow-sm p-6 border border-border">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 bg-secondary rounded-lg flex items-center justify-center">
                                <span class="text-2xl">🎯</span>
                            </div>
                        </div>
                        <div class="mr-4">
                            <p class="text-sm font-medium text-muted-foreground">المحتوى المولد</p>
                            <p class="text-2xl font-bold text-foreground">{{ stats.generated_content_count }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-card rounded-xl shadow-sm p-6 border border-border">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 bg-accent rounded-lg flex items-center justify-center">
                                <span class="text-2xl">👥</span>
                            </div>
                        </div>
                        <div class="mr-4">
                            <p class="text-sm font-medium text-muted-foreground">الفصول</p>
                            <p class="text-2xl font-bold text-foreground">{{ stats.classes_count }}</p>
                        </div>
                    </div>
                </div>

                <div class="bg-card rounded-xl shadow-sm p-6 border border-border">
                    <div class="flex items-center">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 bg-muted rounded-lg flex items-center justify-center">
                                <span class="text-2xl">⭐</span>
                            </div>
                        </div>
                        <div class="mr-4">
                            <p class="text-sm font-medium text-muted-foreground">المفضلة</p>
                            <p class="text-2xl font-bold text-foreground">
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
                    class="bg-card rounded-xl shadow-sm hover:shadow-lg border border-border transition-all duration-300 hover:-translate-y-1 cursor-pointer group"
                >
                    <Link :href="tool.url" class="block p-6 h-full">
                        <div class="flex flex-col h-full">
                            <div class="text-4xl mb-4">{{ tool.emoji }}</div>
                            <h3 class="text-lg font-bold text-foreground mb-2 group-hover:text-primary transition-colors">
                                {{ tool.title }}
                            </h3>
                            <p class="text-muted-foreground mb-4 flex-grow text-sm leading-relaxed">
                                {{ tool.description }}
                            </p>
                            <div class="w-full mt-auto bg-primary text-primary-foreground py-2.5 rounded-lg font-semibold transition-colors hover:bg-primary/90 text-center">
                                ابدأ الآن ←
                            </div>
                        </div>
                    </Link>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <!-- Recent Lesson Plans -->
                <div class="bg-card rounded-xl shadow-sm border border-border">
                    <div class="p-6 border-b border-border">
                        <h3 class="text-lg font-semibold text-foreground">خطط الدروس الأخيرة</h3>
                    </div>
                    <div class="p-6">
                        <div v-if="stats.recent_lesson_plans.length > 0" class="space-y-4">
                            <div 
                                v-for="plan in stats.recent_lesson_plans" 
                                :key="plan.id"
                                class="flex items-center justify-between p-3 bg-accent/50 rounded-lg hover:bg-accent transition-colors"
                            >
                                <div>
                                    <h4 class="font-medium text-foreground">{{ plan.title }}</h4>
                                    <p class="text-sm text-muted-foreground">{{ plan.subject }} - {{ plan.grade_level }}</p>
                                </div>
                                <Link 
                                    :href="`/lesson-plans/${plan.id}`"
                                    class="text-primary hover:text-primary/80 text-sm font-medium"
                                >
                                    عرض
                                </Link>
                            </div>
                        </div>
                        <div v-else class="text-center py-8 text-muted-foreground">
                            لم يتم إنشاء أي خطط دروس بعد
                        </div>
                    </div>
                </div>

                <!-- Recent Generated Content -->
                <div class="bg-card rounded-xl shadow-sm border border-border">
                    <div class="p-6 border-b border-border">
                        <h3 class="text-lg font-semibold text-foreground">المحتوى المولد مؤخراً</h3>
                    </div>
                    <div class="p-6">
                        <div v-if="stats.recent_content.length > 0" class="space-y-4">
                            <div 
                                v-for="content in stats.recent_content" 
                                :key="content.id"
                                class="flex items-center justify-between p-3 bg-accent/50 rounded-lg hover:bg-accent transition-colors"
                            >
                                <div>
                                    <h4 class="font-medium text-foreground">{{ content.title }}</h4>
                                    <p class="text-sm text-muted-foreground">{{ content.type }}</p>
                                </div>
                                <span class="text-xs text-muted-foreground">
                                    {{ new Date(content.created_at).toLocaleDateString('ar-SA') }}
                                </span>
                            </div>
                        </div>
                        <div v-else class="text-center py-8 text-muted-foreground">
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
