<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import { ref, onMounted, computed } from 'vue';

const isVisible = ref(false);
const selectedCategory = ref('all');

onMounted(() => {
    setTimeout(() => {
        isVisible.value = true;
    }, 100);
});

const categories = [
    { id: 'all', name: 'جميع الدروس', icon: '📚' },
    { id: 'getting-started', name: 'البداية', icon: '🚀' },
    { id: 'content-creation', name: 'إنشاء المحتوى', icon: '📝' },
    { id: 'interactive-tools', name: 'الأدوات التفاعلية', icon: '🎨' },
    { id: 'assessment', name: 'التقييم والمتابعة', icon: '📊' },
    { id: 'advanced', name: 'متقدم', icon: '⚡' }
];

const tutorials = [
    {
        id: 1,
        title: 'كيفية البدء مع منصة مُعين',
        description: 'دليل شامل للمبتدئين لاستخدام المنصة وإنشاء أول محتوى تعليمي',
        category: 'getting-started',
        duration: '10 دقائق',
        level: 'مبتدئ',
        thumbnail: 'https://via.placeholder.com/300x200/3B82F6/ffffff?text=البداية',
        views: '2.5K',
        topics: ['إنشاء الحساب', 'واجهة المستخدم', 'الإعدادات الأساسية']
    },
    {
        id: 2,
        title: 'إنشاء خطة درس باستخدام الذكاء الاصطناعي',
        description: 'تعلم كيفية استخدام مولد خطط الدروس لإنشاء خطط تعليمية شاملة',
        category: 'content-creation',
        duration: '15 دقيقة',
        level: 'مبتدئ',
        thumbnail: 'https://via.placeholder.com/300x200/10B981/ffffff?text=خطط+الدروس',
        views: '3.8K',
        topics: ['اختيار المادة', 'تحديد الأهداف', 'تخصيص المحتوى']
    },
    {
        id: 3,
        title: 'تصميم اختبارات تفاعلية ومتنوعة',
        description: 'اكتشف كيفية إنشاء اختبارات بأسئلة متنوعة ومستويات مختلفة',
        category: 'content-creation',
        duration: '12 دقيقة',
        level: 'متوسط',
        thumbnail: 'https://via.placeholder.com/300x200/8B5CF6/ffffff?text=الاختبارات',
        views: '2.1K',
        topics: ['أنواع الأسئلة', 'مستويات الصعوبة', 'معايير التقييم']
    },
    {
        id: 4,
        title: 'استخدام عجلة الاختيار الذكية',
        description: 'تعلم كيفية استخدام عجلة الاختيار لإشراك الطلاب بطريقة عادلة',
        category: 'interactive-tools',
        duration: '8 دقائق',
        level: 'مبتدئ',
        thumbnail: 'https://via.placeholder.com/300x200/F59E0B/ffffff?text=عجلة+الاختيار',
        views: '1.9K',
        topics: ['إضافة أسماء الطلاب', 'تخصيص العجلة', 'تتبع المشاركة']
    },
    {
        id: 5,
        title: 'إنشاء قصص تعليمية تفاعلية',
        description: 'اكتشف قوة القصص في التعليم وكيفية إنشائها باستخدام الذكاء الاصطناعي',
        category: 'interactive-tools',
        duration: '18 دقيقة',
        level: 'متوسط',
        thumbnail: 'https://via.placeholder.com/300x200/EF4444/ffffff?text=القصص+التعليمية',
        views: '2.7K',
        topics: ['بناء القصة', 'التفاعل', 'الربط بالمنهج']
    },
    {
        id: 6,
        title: 'تقييم أداء الطلاب وإنشاء التقارير',
        description: 'تعلم كيفية استخدام أدوات التقييم لمتابعة تقدم الطلاب',
        category: 'assessment',
        duration: '20 دقيقة',
        level: 'متقدم',
        thumbnail: 'https://via.placeholder.com/300x200/14B8A6/ffffff?text=التقييم',
        views: '1.5K',
        topics: ['معايير التقييم', 'التقارير', 'التحليل']
    },
    {
        id: 7,
        title: 'التواصل الفعال مع أولياء الأمور',
        description: 'نصائح وأدوات لكتابة رسائل مهنية ومؤثرة لأولياء الأمور',
        category: 'assessment',
        duration: '14 دقيقة',
        level: 'متوسط',
        thumbnail: 'https://via.placeholder.com/300x200/6366F1/ffffff?text=التواصل',
        views: '3.2K',
        topics: ['الرسائل المهنية', 'التوقيت المناسب', 'البناء الإيجابي']
    },
    {
        id: 8,
        title: 'تقنيات متقدمة لتخصيص المحتوى',
        description: 'اكتشف الميزات المتقدمة لتخصيص المحتوى حسب احتياجاتك',
        category: 'advanced',
        duration: '25 دقيقة',
        level: 'متقدم',
        thumbnail: 'https://via.placeholder.com/300x200/F97316/ffffff?text=تقنيات+متقدمة',
        views: '890',
        topics: ['الإعدادات المتقدمة', 'التخصيص العميق', 'الأتمتة']
    }
];

const filteredTutorials = computed(() => {
    if (selectedCategory.value === 'all') {
        return tutorials;
    }
    return tutorials.filter(tutorial => tutorial.category === selectedCategory.value);
});

const getLevelColor = (level: string) => {
    switch (level) {
        case 'مبتدئ':
            return 'bg-green-100 text-green-800';
        case 'متوسط':
            return 'bg-yellow-100 text-yellow-800';
        case 'متقدم':
            return 'bg-red-100 text-red-800';
        default:
            return 'bg-gray-100 text-gray-800';
    }
};

const features = [
    {
        icon: '🎥',
        title: 'فيديوهات عالية الجودة',
        description: 'مقاطع فيديو واضحة ومفصلة لكل خطوة'
    },
    {
        icon: '📱',
        title: 'متوافق مع جميع الأجهزة',
        description: 'شاهد الدروس على الهاتف أو الحاسوب'
    },
    {
        icon: '⏰',
        title: 'وقتك يناسبك',
        description: 'دروس قصيرة ومركزة تناسب جدولك'
    },
    {
        icon: '📋',
        title: 'خطوات عملية',
        description: 'تطبيق مباشر على أدوات المنصة'
    }
];
</script>

<template>
    <div dir="rtl" class="min-h-screen bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50">
        <Head title="دروس تعليمية - منصة مُعين التعليمية" />
        
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
                        دروس تعليمية تفاعلية
                    </h1>
                    <p class="text-xl text-gray-600 max-w-4xl mx-auto leading-relaxed mb-12">
                        تعلم كيفية استخدام جميع أدوات المنصة من خلال دروس فيديو قصيرة ومركزة، 
                        مصممة خصيصاً لمساعدتك في إتقان التعليم الذكي
                    </p>
                    
                    <div class="grid md:grid-cols-4 gap-6 mb-16">
                        <div v-for="feature in features" :key="feature.title" 
                             class="bg-white p-6 rounded-2xl shadow-lg">
                            <div class="text-4xl mb-4">{{ feature.icon }}</div>
                            <h3 class="text-lg font-bold text-gray-900 mb-2">{{ feature.title }}</h3>
                            <p class="text-gray-600 text-sm">{{ feature.description }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Category Filter -->
        <section class="py-8 bg-white sticky top-16 z-40 shadow-sm">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-wrap justify-center gap-3">
                    <button
                        v-for="category in categories"
                        :key="category.id"
                        @click="selectedCategory = category.id"
                        :class="[
                            'flex items-center space-x-2 space-x-reverse px-6 py-3 rounded-full transition-all duration-300',
                            selectedCategory === category.id
                                ? 'bg-blue-600 text-white shadow-lg'
                                : 'bg-gray-100 text-gray-700 hover:bg-gray-200'
                        ]"
                    >
                        <span class="text-lg">{{ category.icon }}</span>
                        <span class="font-semibold">{{ category.name }}</span>
                    </button>
                </div>
            </div>
        </section>

        <!-- Tutorials Grid -->
        <section class="py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="mb-8">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">
                        {{ selectedCategory === 'all' ? 'جميع الدروس' : categories.find(c => c.id === selectedCategory)?.name }}
                    </h2>
                    <p class="text-gray-600">{{ filteredTutorials.length }} درس متاح</p>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <div v-for="tutorial in filteredTutorials" :key="tutorial.id" 
                         class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 hover:transform hover:-translate-y-2">
                        
                        <!-- Thumbnail -->
                        <div class="relative">
                            <img :src="tutorial.thumbnail" :alt="tutorial.title" class="w-full h-48 object-cover">
                            <div class="absolute top-4 right-4 bg-black/80 text-white px-3 py-1 rounded-full text-sm">
                                {{ tutorial.duration }}
                            </div>
                            <div class="absolute bottom-4 right-4 bg-white/90 px-3 py-1 rounded-full text-sm text-gray-700">
                                {{ tutorial.views }} مشاهدة
                            </div>
                            
                            <!-- Play Button -->
                            <div class="absolute inset-0 flex items-center justify-center bg-black/20 opacity-100 hover:opacity-100 transition-opacity cursor-pointer">
                                <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center shadow-lg hover:scale-110 transition-transform">
                                    <span class="text-blue-600 text-2xl mr-1">▶</span>
                                </div>
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="p-6">
                            <div class="flex items-center justify-between mb-3">
                                <span :class="['px-3 py-1 rounded-full text-xs font-semibold', getLevelColor(tutorial.level)]">
                                    {{ tutorial.level }}
                                </span>
                            </div>

                            <h3 class="text-xl font-bold text-gray-900 mb-3 leading-tight">
                                {{ tutorial.title }}
                            </h3>
                            
                            <p class="text-gray-600 text-sm mb-4 leading-relaxed">
                                {{ tutorial.description }}
                            </p>

                            <!-- Topics -->
                            <div class="mb-4">
                                <h4 class="text-sm font-semibold text-gray-700 mb-2">ستتعلم:</h4>
                                <div class="space-y-1">
                                    <div v-for="topic in tutorial.topics" :key="topic" 
                                         class="flex items-center space-x-2 space-x-reverse text-sm text-gray-600">
                                        <span class="w-1.5 h-1.5 bg-blue-400 rounded-full"></span>
                                        <span>{{ topic }}</span>
                                    </div>
                                </div>
                            </div>

                            <button class="w-full bg-blue-600 hover:bg-blue-700 text-white py-3 px-4 rounded-lg font-semibold transition-colors">
                                مشاهدة الدرس
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Learning Path -->
        <section class="py-16 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold text-gray-900 mb-6">مسار التعلم المقترح</h2>
                    <p class="text-xl text-gray-600">اتبع هذا المسار لتحقيق أقصى استفادة من المنصة</p>
                </div>

                <div class="relative">
                    <!-- Path line -->
                    <div class="absolute right-1/2 transform translate-x-1/2 w-1 h-full bg-gradient-to-b from-blue-200 to-purple-200 hidden md:block"></div>
                    
                    <div class="space-y-12">
                        <div v-for="(step, index) in [
                            { title: 'ابدأ بالأساسيات', desc: 'تعلم كيفية إنشاء حسابك واستكشاف المنصة', icon: '🚀' },
                            { title: 'أدوات إنشاء المحتوى', desc: 'اتقن استخدام مولدات المحتوى التعليمي', icon: '📝' },
                            { title: 'الأدوات التفاعلية', desc: 'اكتشف قوة القصص والأنشطة التفاعلية', icon: '🎨' },
                            { title: 'التقييم والمتابعة', desc: 'تعلم كيفية تقييم الطلاب والتواصل مع الأولياء', icon: '📊' },
                            { title: 'التقنيات المتقدمة', desc: 'استكشف الميزات المتقدمة والتخصيص العميق', icon: '⚡' }
                        ]" :key="index" 
                             :class="['relative flex items-center', index % 2 === 0 ? 'justify-end' : 'justify-start']">
                            
                            <!-- Step number -->
                            <div class="absolute right-1/2 transform translate-x-1/2 w-12 h-12 bg-gradient-to-br from-blue-500 to-purple-600 rounded-full flex items-center justify-center text-white font-bold text-lg z-10 hidden md:flex">
                                {{ index + 1 }}
                            </div>
                            
                            <!-- Content -->
                            <div :class="['w-full md:w-5/12 p-6 bg-white rounded-2xl shadow-lg', index % 2 === 0 ? 'text-right mr-0 md:mr-8' : 'text-left ml-0 md:ml-8']">
                                <div class="flex items-center space-x-3 space-x-reverse mb-4">
                                    <div class="text-3xl">{{ step.icon }}</div>
                                    <h3 class="text-xl font-bold text-gray-900">{{ step.title }}</h3>
                                </div>
                                <p class="text-gray-600">{{ step.desc }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="py-20 bg-gradient-to-r from-blue-600 to-purple-600 text-white">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h2 class="text-4xl font-bold mb-6">ابدأ رحلة التعلم اليوم</h2>
                <p class="text-xl mb-8 opacity-90">
                    انضم إلى آلاف المعلمين الذين تطوروا مهاراتهم باستخدام منصة مُعين
                </p>
                <div class="flex justify-center space-x-4 space-x-reverse">
                    <Link href="/register" 
                          class="bg-white text-blue-600 hover:bg-gray-100 px-8 py-4 rounded-lg text-lg font-semibold transition-colors">
                        ابدأ التعلم مجاناً
                    </Link>
                    <Link href="/features" 
                          class="border-2 border-white hover:bg-white hover:text-blue-600 px-8 py-4 rounded-lg text-lg font-semibold transition-colors">
                        اكتشف المميزات
                    </Link>
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
                            <li><Link href="/help" class="text-gray-400 hover:text-white transition-colors">مركز المساعدة</Link></li>
                            <li><Link href="/contact" class="text-gray-400 hover:text-white transition-colors">تواصل معنا</Link></li>
                            <li><Link href="/privacy" class="text-gray-400 hover:text-white transition-colors">سياسة الخصوصية</Link></li>
                            <li><Link href="/terms" class="text-gray-400 hover:text-white transition-colors">شروط الاستخدام</Link></li>
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