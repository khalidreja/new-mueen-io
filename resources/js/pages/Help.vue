<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import { ref, onMounted, computed } from 'vue';

const isVisible = ref(false);
const searchQuery = ref('');
const selectedCategory = ref('all');

onMounted(() => {
    setTimeout(() => {
        isVisible.value = true;
    }, 100);
});

const categories = [
    { id: 'all', name: 'جميع الموضوعات', icon: '📚' },
    { id: 'getting-started', name: 'البداية', icon: '🚀' },
    { id: 'tools', name: 'استخدام الأدوات', icon: '🛠️' },
    { id: 'account', name: 'الحساب والإعدادات', icon: '⚙️' },
    { id: 'billing', name: 'الفوترة والاشتراكات', icon: '💳' },
    { id: 'technical', name: 'المشاكل التقنية', icon: '🔧' }
];

const helpArticles = [
    {
        id: 1,
        title: 'كيفية إنشاء حساب جديد',
        category: 'getting-started',
        summary: 'دليل خطوة بخطوة لإنشاء حساب جديد على المنصة',
        views: 1250,
        helpful: 95
    },
    {
        id: 2,
        title: 'استخدام مولد خطط الدروس',
        category: 'tools',
        summary: 'تعلم كيفية إنشاء خطط دروس فعالة باستخدام الذكاء الاصطناعي',
        views: 890,
        helpful: 87
    },
    {
        id: 3,
        title: 'إعادة تعيين كلمة المرور',
        category: 'account',
        summary: 'خطوات إعادة تعيين كلمة المرور في حال نسيانها',
        views: 650,
        helpful: 92
    },
    {
        id: 4,
        title: 'أنواع الاشتراكات المتاحة',
        category: 'billing',
        summary: 'مقارنة بين خطط الاشتراك المختلفة ومميزات كل خطة',
        views: 780,
        helpful: 88
    },
    {
        id: 5,
        title: 'حل مشكلة بطء تحميل الصفحات',
        category: 'technical',
        summary: 'نصائح لحل مشاكل الأداء وتحسين سرعة التصفح',
        views: 420,
        helpful: 85
    },
    {
        id: 6,
        title: 'استخدام مولد الاختبارات',
        category: 'tools',
        summary: 'دليل شامل لإنشاء اختبارات متنوعة وفعالة',
        views: 920,
        helpful: 91
    }
];

const quickActions = [
    {
        title: 'تواصل مع الدعم',
        description: 'احصل على مساعدة مباشرة من فريق الدعم',
        icon: '💬',
        action: 'contact',
        color: 'blue'
    },
    {
        title: 'الأسئلة الشائعة',
        description: 'ابحث في قاعدة الأسئلة والأجوبة',
        icon: '❓',
        action: 'faq',
        color: 'green'
    },
    {
        title: 'دروس تعليمية',
        description: 'شاهد فيديوهات تعليمية تفاعلية',
        icon: '🎥',
        action: 'tutorials',
        color: 'purple'
    },
    {
        title: 'تقرير مشكلة',
        description: 'أبلغ عن خطأ أو مشكلة تقنية',
        icon: '🐛',
        action: 'report',
        color: 'red'
    }
];

const filteredArticles = computed(() => {
    let filtered = helpArticles;
    
    if (selectedCategory.value !== 'all') {
        filtered = filtered.filter(article => article.category === selectedCategory.value);
    }
    
    if (searchQuery.value.trim()) {
        filtered = filtered.filter(article => 
            article.title.toLowerCase().includes(searchQuery.value.toLowerCase()) ||
            article.summary.toLowerCase().includes(searchQuery.value.toLowerCase())
        );
    }
    
    return filtered;
});

const getCategoryName = (categoryId: string) => {
    return categories.find(cat => cat.id === categoryId)?.name || categoryId;
};
</script>

<template>
    <div dir="rtl" class="min-h-screen bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50">
        <Head title="مركز المساعدة - منصة مُعين التعليمية" />
        
        <!-- Header -->
        <header class="bg-white shadow-sm sticky top-0 z-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center py-4">
                    <Link href="/" class="flex items-center space-x-3 space-x-reverse">
                        <div class="w-10 h-10 bg-gradient-to-br from-blue-600 to-purple-600 rounded-lg flex items-center justify-center">
                            <span class="text-white font-bold text-lg">م</span>
                        </div>
                        <h1 class="text-xl font-bold text-gray-900" style="font-family: 'Cairo', sans-serif;">
                            منصة مُعين التعليمية
                        </h1>
                    </Link>
                    
                    <div class="flex items-center space-x-4 space-x-reverse">
                        <Link href="/login" class="text-gray-600 hover:text-blue-600 transition-colors">
                            تسجيل الدخول
                        </Link>
                        <Link href="/register" class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg transition-colors">
                            إنشاء حساب
                        </Link>
                    </div>
                </div>
            </div>
        </header>

        <!-- Hero Section -->
        <section class="py-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <div :class="['transition-all duration-1000', isVisible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10']">
                    <h1 class="text-5xl font-bold text-gray-900 mb-6" style="font-family: 'Cairo', sans-serif;">
                        مركز المساعدة
                    </h1>
                    <p class="text-xl text-gray-600 max-w-4xl mx-auto leading-relaxed mb-12">
                        نحن هنا لمساعدتك! ابحث في قاعدة المعرفة أو تواصل مع فريق الدعم للحصول على المساعدة
                    </p>
                    
                    <!-- Search Bar -->
                    <div class="max-w-2xl mx-auto mb-12">
                        <div class="relative">
                            <input 
                                v-model="searchQuery"
                                type="text" 
                                placeholder="ابحث عن المساعدة..." 
                                class="w-full px-6 py-4 text-lg rounded-2xl border-2 border-gray-200 focus:border-blue-500 focus:outline-none bg-white shadow-lg"
                            >
                            <button class="absolute left-4 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-blue-600">
                                🔍
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Quick Actions -->
        <section class="py-16 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">كيف يمكننا مساعدتك؟</h2>
                    <p class="text-gray-600">اختر الطريقة المناسبة للحصول على المساعدة</p>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div v-for="action in quickActions" :key="action.title" 
                         :class="[
                             'p-6 rounded-2xl text-center cursor-pointer transition-all duration-300 hover:transform hover:-translate-y-2 hover:shadow-xl',
                             action.color === 'blue' ? 'bg-blue-50 hover:bg-blue-100' :
                             action.color === 'green' ? 'bg-green-50 hover:bg-green-100' :
                             action.color === 'purple' ? 'bg-purple-50 hover:bg-purple-100' :
                             'bg-red-50 hover:bg-red-100'
                         ]">
                        <div class="text-4xl mb-4">{{ action.icon }}</div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2">{{ action.title }}</h3>
                        <p class="text-gray-600 text-sm">{{ action.description }}</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Category Filter -->
        <section class="py-8 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-wrap justify-center gap-3">
                    <button
                        v-for="category in categories"
                        :key="category.id"
                        @click="selectedCategory = category.id"
                        :class="[
                            'flex items-center space-x-2 space-x-reverse px-4 py-2 rounded-full transition-all duration-300',
                            selectedCategory === category.id
                                ? 'bg-blue-600 text-white shadow-lg'
                                : 'bg-white text-gray-700 hover:bg-gray-100'
                        ]"
                    >
                        <span>{{ category.icon }}</span>
                        <span class="font-semibold text-sm">{{ category.name }}</span>
                    </button>
                </div>
            </div>
        </section>

        <!-- Help Articles -->
        <section class="py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="mb-8">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">
                        {{ selectedCategory === 'all' ? 'جميع المقالات' : getCategoryName(selectedCategory) }}
                    </h2>
                    <p class="text-gray-600">{{ filteredArticles.length }} مقال متاح</p>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <article v-for="article in filteredArticles" :key="article.id" 
                             class="bg-white p-6 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 hover:transform hover:-translate-y-1 cursor-pointer">
                        
                        <h3 class="text-xl font-bold text-gray-900 mb-3 hover:text-blue-600 transition-colors">
                            {{ article.title }}
                        </h3>
                        
                        <p class="text-gray-600 text-sm mb-4 leading-relaxed">
                            {{ article.summary }}
                        </p>

                        <div class="flex items-center justify-between text-sm text-gray-500 mb-4">
                            <div class="flex items-center space-x-1 space-x-reverse">
                                <span>👁️</span>
                                <span>{{ article.views }} مشاهدة</span>
                            </div>
                            <div class="flex items-center space-x-1 space-x-reverse">
                                <span>👍</span>
                                <span>{{ article.helpful }}% مفيد</span>
                            </div>
                        </div>

                        <div class="flex items-center justify-between">
                            <span class="bg-gray-100 text-gray-600 px-3 py-1 rounded-full text-xs">
                                {{ getCategoryName(article.category) }}
                            </span>
                            <span class="text-blue-600 font-semibold text-sm hover:text-blue-700">
                                اقرأ المزيد ←
                            </span>
                        </div>
                    </article>
                </div>
            </div>
        </section>

        <!-- Contact Support -->
        <section class="py-16 bg-gradient-to-r from-blue-600 to-purple-600 text-white">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h2 class="text-4xl font-bold mb-6">لم تجد ما تبحث عنه؟</h2>
                <p class="text-xl mb-8 opacity-90">
                    تواصل مع فريق الدعم الفني وسنساعدك في حل مشكلتك
                </p>
                <div class="flex justify-center space-x-4 space-x-reverse">
                    <Link href="/contact" 
                          class="bg-white text-blue-600 hover:bg-gray-100 px-8 py-4 rounded-lg text-lg font-semibold transition-colors">
                        تواصل معنا
                    </Link>
                    <button class="border-2 border-white hover:bg-white hover:text-blue-600 px-8 py-4 rounded-lg text-lg font-semibold transition-colors">
                        دردشة مباشرة
                    </button>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="bg-gray-900 text-white py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid md:grid-cols-4 gap-8">
                    <!-- معلومات المنصة -->
                    <div class="md:col-span-2">
                        <div class="flex items-center space-x-3 space-x-reverse mb-6">
                            <div class="w-10 h-10 bg-gradient-to-br from-blue-400 to-purple-600 rounded-lg flex items-center justify-center">
                                <span class="text-white font-bold">م</span>
                            </div>
                            <h3 class="text-xl font-bold">منصة مُعين التعليمية</h3>
                        </div>
                        <p class="text-gray-400 mb-6 leading-relaxed">
                            منصة رائدة في تطوير التعليم بالذكاء الاصطناعي، نساعد المعلمين على إنشاء محتوى تعليمي عالي الجودة.
                        </p>
                    </div>

                    <!-- روابط سريعة -->
                    <div>
                        <h5 class="text-lg font-bold mb-6">روابط سريعة</h5>
                        <ul class="space-y-3">
                            <li><Link href="/" class="text-gray-400 hover:text-white transition-colors">الرئيسية</Link></li>
                            <li><Link href="/about" class="text-gray-400 hover:text-white transition-colors">عن المنصة</Link></li>
                            <li><Link href="/features" class="text-gray-400 hover:text-white transition-colors">المميزات</Link></li>
                            <li><Link href="/blog" class="text-gray-400 hover:text-white transition-colors">المدونة</Link></li>
                        </ul>
                    </div>

                    <!-- الدعم -->
                    <div>
                        <h5 class="text-lg font-bold mb-6">الدعم والمساعدة</h5>
                        <ul class="space-y-3">
                            <li><Link href="/contact" class="text-gray-400 hover:text-white transition-colors">تواصل معنا</Link></li>
                            <li><Link href="/privacy" class="text-gray-400 hover:text-white transition-colors">سياسة الخصوصية</Link></li>
                            <li><Link href="/terms" class="text-gray-400 hover:text-white transition-colors">شروط الاستخدام</Link></li>
                            <li><Link href="/faq" class="text-gray-400 hover:text-white transition-colors">الأسئلة الشائعة</Link></li>
                        </ul>
                    </div>
                </div>

                <div class="border-t border-gray-800 pt-8 mt-8">
                    <div class="flex flex-col md:flex-row justify-between items-center">
                        <div class="text-sm text-gray-500 mb-4 md:mb-0">
                            © 2025 منصة مُعين التعليمية. جميع الحقوق محفوظة.
                        </div>
                        <div class="text-sm text-gray-500">
                            <span class="text-green-400">●</span> مدعوم بتقنية Google Gemini AI
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </div>
</template>

<style scoped>
body {
    font-family: 'Cairo', sans-serif;
}
</style>