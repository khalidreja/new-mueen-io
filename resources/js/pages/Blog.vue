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
    { id: 'all', name: 'جميع المقالات', icon: '📚' },
    { id: 'ai-education', name: 'الذكاء الاصطناعي في التعليم', icon: '🤖' },
    { id: 'teaching-strategies', name: 'استراتيجيات التدريس', icon: '🎯' },
    { id: 'assessment', name: 'التقييم والقياس', icon: '📊' },
    { id: 'technology', name: 'التكنولوجيا التعليمية', icon: '💻' },
    { id: 'tips', name: 'نصائح وإرشادات', icon: '💡' }
];

const blogPosts = [
    {
        id: 1,
        title: 'كيف يغير الذكاء الاصطناعي مستقبل التعليم',
        excerpt: 'استكشف كيف تعيد تقنيات الذكاء الاصطناعي تشكيل العملية التعليمية وتخلق فرصاً جديدة للتعلم المخصص',
        category: 'ai-education',
        author: 'فريق مُعين التعليمية',
        publishedAt: '2025-01-15',
        readTime: '7 دقائق',
        image: 'https://via.placeholder.com/400x250/3B82F6/ffffff?text=الذكاء+الاصطناعي',
        tags: ['ذكاء اصطناعي', 'تعليم', 'مستقبل'],
        featured: true
    },
    {
        id: 2,
        title: '10 استراتيجيات فعالة لإشراك الطلاب في التعلم النشط',
        excerpt: 'تعرف على أحدث الاستراتيجيات التي تحفز الطلاب على المشاركة الفعالة وتحسن من نتائج التعلم',
        category: 'teaching-strategies',
        author: 'د. سارة المحمد',
        publishedAt: '2025-01-12',
        readTime: '5 دقائق',
        image: 'https://via.placeholder.com/400x250/10B981/ffffff?text=استراتيجيات+التدريس',
        tags: ['تعلم نشط', 'إشراك الطلاب', 'استراتيجيات']
    },
    {
        id: 3,
        title: 'دليل شامل لاستخدام التقييم التكويني في الفصل',
        excerpt: 'اكتشف كيفية تطبيق التقييم التكويني لتحسين فهم الطلاب وتعزيز عملية التعلم المستمر',
        category: 'assessment',
        author: 'أ. محمد العتيبي',
        publishedAt: '2025-01-10',
        readTime: '6 دقائق',
        image: 'https://via.placeholder.com/400x250/8B5CF6/ffffff?text=التقييم+التكويني',
        tags: ['تقييم', 'تكويني', 'فصل دراسي']
    },
    {
        id: 4,
        title: 'أفضل الممارسات لدمج التكنولوجيا في التعليم',
        excerpt: 'نصائح عملية لاستخدام التكنولوجيا بفعالية في الفصل الدراسي وتحسين تجربة التعلم',
        category: 'technology',
        author: 'أ. فاطمة الزهراني',
        publishedAt: '2025-01-08',
        readTime: '8 دقائق',
        image: 'https://via.placeholder.com/400x250/F59E0B/ffffff?text=التكنولوجيا+التعليمية',
        tags: ['تكنولوجيا', 'تعليم رقمي', 'ممارسات']
    },
    {
        id: 5,
        title: 'كيفية إنشاء بيئة تعليمية محفزة للإبداع',
        excerpt: 'خطوات عملية لتهيئة بيئة صفية تشجع على الإبداع والابتكار لدى الطلاب',
        category: 'tips',
        author: 'د. أحمد السالم',
        publishedAt: '2025-01-05',
        readTime: '4 دقائق',
        image: 'https://via.placeholder.com/400x250/EF4444/ffffff?text=بيئة+إبداعية',
        tags: ['إبداع', 'بيئة تعليمية', 'ابتكار']
    },
    {
        id: 6,
        title: 'التعلم المختلط: دمج التعليم الحضوري والرقمي',
        excerpt: 'دليل شامل لتطبيق نموذج التعلم المختلط وتحقيق التوازن بين التعليم التقليدي والرقمي',
        category: 'technology',
        author: 'أ. نورا القحطاني',
        publishedAt: '2025-01-03',
        readTime: '9 دقائق',
        image: 'https://via.placeholder.com/400x250/14B8A6/ffffff?text=التعلم+المختلط',
        tags: ['تعلم مختلط', 'تعليم رقمي', 'نماذج تعليمية']
    }
];

const filteredPosts = computed(() => {
    if (selectedCategory.value === 'all') {
        return blogPosts;
    }
    return blogPosts.filter(post => post.category === selectedCategory.value);
});

const featuredPost = computed(() => {
    return blogPosts.find(post => post.featured);
});

const formatDate = (dateString: string) => {
    const date = new Date(dateString);
    return date.toLocaleDateString('ar-SA', {
        year: 'numeric',
        month: 'long',
        day: 'numeric'
    });
};

const getCategoryName = (categoryId: string) => {
    return categories.find(cat => cat.id === categoryId)?.name || categoryId;
};
</script>

<template>
    <div dir="rtl" class="min-h-screen bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50">
        <Head title="المدونة - منصة مُعين التعليمية" />
        
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
                        مدونة مُعين التعليمية
                    </h1>
                    <p class="text-xl text-gray-600 max-w-4xl mx-auto leading-relaxed mb-12">
                        اكتشف أحدث المقالات والإرشادات في عالم التعليم الذكي، واستفد من خبرات المتخصصين 
                        في تطوير العملية التعليمية باستخدام التكنولوجيا المتقدمة
                    </p>
                </div>
            </div>
        </section>

        <!-- Featured Article -->
        <section v-if="featuredPost" class="py-16 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="mb-8">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">المقال المميز</h2>
                </div>

                <div class="bg-gradient-to-br from-blue-50 to-purple-50 rounded-3xl overflow-hidden shadow-xl">
                    <div class="grid lg:grid-cols-2 gap-8 items-center">
                        <div class="p-8 lg:p-12">
                            <div class="flex items-center space-x-3 space-x-reverse mb-4">
                                <span class="bg-blue-600 text-white px-3 py-1 rounded-full text-sm font-semibold">
                                    مميز
                                </span>
                                <span class="text-blue-600 font-semibold">
                                    {{ getCategoryName(featuredPost.category) }}
                                </span>
                            </div>
                            
                            <h3 class="text-3xl font-bold text-gray-900 mb-4 leading-tight">
                                {{ featuredPost.title }}
                            </h3>
                            
                            <p class="text-gray-700 text-lg mb-6 leading-relaxed">
                                {{ featuredPost.excerpt }}
                            </p>

                            <div class="flex items-center justify-between mb-6">
                                <div class="flex items-center space-x-3 space-x-reverse">
                                    <div class="w-10 h-10 bg-gray-300 rounded-full flex items-center justify-center">
                                        <span class="text-gray-600 text-sm">👤</span>
                                    </div>
                                    <div>
                                        <div class="font-semibold text-gray-900">{{ featuredPost.author }}</div>
                                        <div class="text-sm text-gray-600">{{ formatDate(featuredPost.publishedAt) }}</div>
                                    </div>
                                </div>
                                <div class="text-sm text-gray-600">
                                    ⏱️ {{ featuredPost.readTime }}
                                </div>
                            </div>

                            <button class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg font-semibold transition-colors">
                                اقرأ المقال كاملاً
                            </button>
                        </div>

                        <div class="lg:p-8">
                            <img :src="featuredPost.image" :alt="featuredPost.title" 
                                 class="w-full h-80 object-cover rounded-2xl">
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

        <!-- Blog Posts Grid -->
        <section class="py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="mb-8">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">
                        {{ selectedCategory === 'all' ? 'أحدث المقالات' : getCategoryName(selectedCategory) }}
                    </h2>
                    <p class="text-gray-600">{{ filteredPosts.length }} مقال متاح</p>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <article v-for="post in filteredPosts.filter(p => !p.featured)" :key="post.id" 
                             class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 hover:transform hover:-translate-y-2">
                        
                        <!-- Image -->
                        <div class="relative">
                            <img :src="post.image" :alt="post.title" class="w-full h-48 object-cover">
                            <div class="absolute top-4 right-4 bg-white/90 px-3 py-1 rounded-full text-sm font-semibold text-gray-700">
                                {{ getCategoryName(post.category) }}
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="p-6">
                            <h3 class="text-xl font-bold text-gray-900 mb-3 leading-tight hover:text-blue-600 transition-colors cursor-pointer">
                                {{ post.title }}
                            </h3>
                            
                            <p class="text-gray-600 text-sm mb-4 leading-relaxed">
                                {{ post.excerpt }}
                            </p>

                            <!-- Tags -->
                            <div class="flex flex-wrap gap-2 mb-4">
                                <span v-for="tag in post.tags" :key="tag" 
                                      class="bg-gray-100 text-gray-600 px-2 py-1 rounded text-xs">
                                    {{ tag }}
                                </span>
                            </div>

                            <!-- Author & Date -->
                            <div class="flex items-center justify-between mb-4">
                                <div class="flex items-center space-x-2 space-x-reverse">
                                    <div class="w-8 h-8 bg-gray-300 rounded-full flex items-center justify-center">
                                        <span class="text-gray-600 text-xs">👤</span>
                                    </div>
                                    <div>
                                        <div class="font-semibold text-gray-900 text-sm">{{ post.author }}</div>
                                        <div class="text-xs text-gray-600">{{ formatDate(post.publishedAt) }}</div>
                                    </div>
                                </div>
                                <div class="text-xs text-gray-600 flex items-center space-x-1 space-x-reverse">
                                    <span>⏱️</span>
                                    <span>{{ post.readTime }}</span>
                                </div>
                            </div>

                            <button class="w-full bg-blue-600 hover:bg-blue-700 text-white py-2 px-4 rounded-lg font-semibold transition-colors">
                                اقرأ المزيد
                            </button>
                        </div>
                    </article>
                </div>
            </div>
        </section>

        <!-- Newsletter Signup -->
        <section class="py-16 bg-gradient-to-r from-blue-600 to-purple-600 text-white">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h2 class="text-4xl font-bold mb-6">اشترك في نشرتنا الإخبارية</h2>
                <p class="text-xl mb-8 opacity-90">
                    احصل على أحدث المقالات والنصائح التعليمية مباشرة في بريدك الإلكتروني
                </p>
                
                <div class="max-w-md mx-auto">
                    <div class="flex flex-col sm:flex-row gap-4">
                        <input type="email" placeholder="بريدك الإلكتروني" 
                               class="flex-1 px-4 py-3 rounded-lg text-gray-900 placeholder-gray-500 focus:outline-none focus:ring-2 focus:ring-white">
                        <button class="bg-white text-blue-600 hover:bg-gray-100 px-6 py-3 rounded-lg font-semibold transition-colors">
                            اشترك الآن
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <!-- Popular Topics -->
        <section class="py-16 bg-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-gray-900 mb-6">المواضيع الشائعة</h2>
                    <p class="text-xl text-gray-600">اكتشف أكثر المواضيع التي يبحث عنها المعلمون</p>
                </div>

                <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                    <div v-for="topic in [
                        { name: 'الذكاء الاصطناعي', icon: '🤖', count: '25 مقال' },
                        { name: 'التقييم الرقمي', icon: '📊', count: '18 مقال' },
                        { name: 'التعلم التفاعلي', icon: '🎮', count: '22 مقال' },
                        { name: 'استراتيجيات التدريس', icon: '🎯', count: '30 مقال' }
                    ]" :key="topic.name" 
                         class="bg-gray-50 p-6 rounded-2xl text-center hover:bg-gray-100 transition-colors cursor-pointer">
                        <div class="text-4xl mb-4">{{ topic.icon }}</div>
                        <h3 class="text-lg font-bold text-gray-900 mb-2">{{ topic.name }}</h3>
                        <p class="text-gray-600 text-sm">{{ topic.count }}</p>
                    </div>
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
                            <li><Link href="/tutorials" class="text-gray-400 hover:text-white transition-colors">دروس تعليمية</Link></li>
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