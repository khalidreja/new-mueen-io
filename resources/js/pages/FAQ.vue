<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import { ref, onMounted, computed } from 'vue';

const isVisible = ref(false);
const searchQuery = ref('');
const selectedCategory = ref('all');
const openFAQ = ref<number | null>(null);

onMounted(() => {
    setTimeout(() => {
        isVisible.value = true;
    }, 100);
});

const categories = [
    { id: 'all', name: 'جميع الأسئلة', icon: '❓' },
    { id: 'getting-started', name: 'البداية', icon: '🚀' },
    { id: 'tools', name: 'الأدوات', icon: '🛠️' },
    { id: 'account', name: 'الحساب', icon: '👤' },
    { id: 'billing', name: 'الاشتراكات', icon: '💳' },
    { id: 'technical', name: 'تقني', icon: '🔧' }
];

const faqs = [
    {
        id: 1,
        question: 'ما هي منصة مُعين التعليمية؟',
        answer: 'منصة مُعين هي منصة تعليمية رائدة تستخدم تقنيات الذكاء الاصطناعي من Google Gemini لمساعدة المعلمين في إنشاء محتوى تعليمي عالي الجودة بسرعة وكفاءة. تضم المنصة 12 أداة ذكية تغطي جميع جوانب العملية التعليمية.',
        category: 'getting-started',
        helpful: 95
    },
    {
        id: 2,
        question: 'كيف يمكنني إنشاء حساب جديد؟',
        answer: 'يمكنك إنشاء حساب جديد بسهولة من خلال النقر على زر "إنشاء حساب" في أعلى أي صفحة، ثم ملء النموذج بالمعلومات المطلوبة (الاسم، البريد الإلكتروني، كلمة المرور). ستحتاج لتأكيد بريدك الإلكتروني قبل البدء في استخدام المنصة.',
        category: 'getting-started',
        helpful: 92
    },
    {
        id: 3,
        question: 'هل المنصة مجانية؟',
        answer: 'نعم، نقدم خطة مجانية تتيح لك الوصول إلى معظم أدوات المنصة مع حدود استخدام معقولة. كما نوفر خطط اشتراك مدفوعة للحصول على مميزات إضافية واستخدام غير محدود للأدوات.',
        category: 'billing',
        helpful: 88
    },
    {
        id: 4,
        question: 'كيف أستخدم مولد خطط الدروس؟',
        answer: 'بعد تسجيل الدخول، اذهب إلى "أدوات المحتوى" واختر "مولد خطط الدروس". حدد المادة والصف والموضوع، ثم أدخل التفاصيل المطلوبة. سيقوم الذكاء الاصطناعي بإنشاء خطة درس شاملة يمكنك تعديلها حسب احتياجاتك.',
        category: 'tools',
        helpful: 94
    },
    {
        id: 5,
        question: 'هل المحتوى متوافق مع المناهج السعودية؟',
        answer: 'نعم، المنصة مصممة خصيصاً لتكون متوافقة مع المناهج السعودية والعربية. جميع الأدوات تأخذ في الاعتبار المناهج المحلية والثقافة التعليمية في المملكة العربية السعودية.',
        category: 'getting-started',
        helpful: 97
    },
    {
        id: 6,
        question: 'ما أنواع الاختبارات التي يمكنني إنشاؤها؟',
        answer: 'يمكنك إنشاء أنواع متعددة من الاختبارات: الاختيار من متعدد، صح وخطأ، الإكمال، الأسئلة المقالية، وأسئلة التطبيق. يمكنك أيضاً تحديد مستوى الصعوبة ونوع المهارات المعرفية المطلوبة.',
        category: 'tools',
        helpful: 90
    },
    {
        id: 7,
        question: 'كيف يمكنني تغيير كلمة المرور؟',
        answer: 'اذهب إلى "الملف الشخصي" ثم "إعدادات الحساب". في قسم الأمان، انقر على "تغيير كلمة المرور" وأدخل كلمة المرور الحالية والجديدة. تأكد من أن كلمة المرور الجديدة قوية وتحتوي على أرقام وحروف ورموز.',
        category: 'account',
        helpful: 85
    },
    {
        id: 8,
        question: 'ماذا لو نسيت كلمة المرور؟',
        answer: 'في صفحة تسجيل الدخول، انقر على "نسيت كلمة المرور؟" وأدخل بريدك الإلكتروني. ستتلقى رابطاً لإعادة تعيين كلمة المرور. تأكد من فحص مجلد البريد المزعج إذا لم تتلق الرسالة.',
        category: 'account',
        helpful: 91
    },
    {
        id: 9,
        question: 'كيف يمكنني ترقية اشتراكي؟',
        answer: 'اذهب إلى "الإعدادات" ثم "الاشتراك والفوترة". يمكنك مقارنة الخطط المتاحة واختيار الخطة التي تناسب احتياجاتك. الترقية فورية ويمكنك البدء في استخدام المميزات الإضافية على الفور.',
        category: 'billing',
        helpful: 86
    },
    {
        id: 10,
        question: 'هل يمكنني إلغاء اشتراكي في أي وقت؟',
        answer: 'نعم، يمكنك إلغاء اشتراكك في أي وقت من خلال إعدادات الحساب. ستظل قادراً على استخدام المميزات المدفوعة حتى نهاية الفترة المدفوعة، ثم سيتم تحويلك تلقائياً للخطة المجانية.',
        category: 'billing',
        helpful: 89
    },
    {
        id: 11,
        question: 'لماذا تعمل المنصة ببطء؟',
        answer: 'قد يكون البطء بسبب اتصال الإنترنت أو متصفح قديم. جرب تحديث المتصفح، مسح ذاكرة التخزين المؤقت، أو استخدم متصفح مختلف. إذا استمرت المشكلة، تواصل مع الدعم الفني.',
        category: 'technical',
        helpful: 78
    },
    {
        id: 12,
        question: 'هل تدعمون المتصفحات المختلفة؟',
        answer: 'نعم، المنصة تعمل بشكل مثالي على جميع المتصفحات الحديثة: Chrome، Firefox، Safari، وEdge. ننصح بتحديث متصفحك لأحدث إصدار للحصول على أفضل تجربة.',
        category: 'technical',
        helpful: 83
    }
];

const filteredFAQs = computed(() => {
    let filtered = faqs;
    
    if (selectedCategory.value !== 'all') {
        filtered = filtered.filter(faq => faq.category === selectedCategory.value);
    }
    
    if (searchQuery.value.trim()) {
        const query = searchQuery.value.toLowerCase();
        filtered = filtered.filter(faq => 
            faq.question.toLowerCase().includes(query) ||
            faq.answer.toLowerCase().includes(query)
        );
    }
    
    return filtered;
});

const getCategoryName = (categoryId: string) => {
    return categories.find(cat => cat.id === categoryId)?.name || categoryId;
};

const toggleFAQ = (id: number) => {
    openFAQ.value = openFAQ.value === id ? null : id;
};
</script>

<template>
    <div dir="rtl" class="min-h-screen bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50">
        <Head title="الأسئلة الشائعة - منصة مُعين التعليمية" />
        
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
                        الأسئلة الشائعة
                    </h1>
                    <p class="text-xl text-gray-600 max-w-4xl mx-auto leading-relaxed mb-12">
                        إجابات على أكثر الأسئلة شيوعاً حول منصة مُعين التعليمية
                    </p>
                    
                    <!-- Search Bar -->
                    <div class="max-w-2xl mx-auto mb-12">
                        <div class="relative">
                            <input 
                                v-model="searchQuery"
                                type="text" 
                                placeholder="ابحث في الأسئلة الشائعة..." 
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

        <!-- Category Filter -->
        <section class="py-8 bg-white sticky top-16 z-40 shadow-sm">
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
                                : 'bg-gray-100 text-gray-700 hover:bg-gray-200'
                        ]"
                    >
                        <span>{{ category.icon }}</span>
                        <span class="font-semibold text-sm">{{ category.name }}</span>
                    </button>
                </div>
            </div>
        </section>

        <!-- FAQ List -->
        <section class="py-16">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="mb-8">
                    <h2 class="text-3xl font-bold text-gray-900 mb-4">
                        {{ selectedCategory === 'all' ? 'جميع الأسئلة' : getCategoryName(selectedCategory) }}
                    </h2>
                    <p class="text-gray-600">{{ filteredFAQs.length }} سؤال متاح</p>
                </div>

                <div class="space-y-4">
                    <div v-for="faq in filteredFAQs" :key="faq.id" 
                         class="bg-white rounded-2xl shadow-lg overflow-hidden">
                        
                        <!-- Question -->
                        <button @click="toggleFAQ(faq.id)" 
                                class="w-full px-6 py-6 text-right hover:bg-gray-50 transition-colors focus:outline-none focus:bg-gray-50">
                            <div class="flex items-center justify-between">
                                <div class="flex-1">
                                    <h3 class="text-lg font-semibold text-gray-900 mb-2">
                                        {{ faq.question }}
                                    </h3>
                                    <div class="flex items-center space-x-4 space-x-reverse text-sm text-gray-500">
                                        <span class="bg-gray-100 px-3 py-1 rounded-full">
                                            {{ getCategoryName(faq.category) }}
                                        </span>
                                        <span class="flex items-center space-x-1 space-x-reverse">
                                            <span>👍</span>
                                            <span>{{ faq.helpful }}% مفيد</span>
                                        </span>
                                    </div>
                                </div>
                                <div class="flex-shrink-0 mr-4">
                                    <span :class="[
                                        'text-2xl transition-transform duration-300',
                                        openFAQ === faq.id ? 'transform rotate-180' : ''
                                    ]">
                                        ⌄
                                    </span>
                                </div>
                            </div>
                        </button>

                        <!-- Answer -->
                        <div v-if="openFAQ === faq.id" 
                             class="px-6 pb-6 border-t border-gray-100 animate-fade-in">
                            <div class="pt-4">
                                <p class="text-gray-700 leading-relaxed">{{ faq.answer }}</p>
                                
                                <div class="mt-6 flex items-center justify-between">
                                    <div class="text-sm text-gray-500">
                                        هل كانت هذه الإجابة مفيدة؟
                                    </div>
                                    <div class="flex space-x-2 space-x-reverse">
                                        <button class="flex items-center space-x-1 space-x-reverse px-3 py-1 rounded-full bg-green-50 text-green-600 hover:bg-green-100 transition-colors">
                                            <span>👍</span>
                                            <span class="text-sm">نعم</span>
                                        </button>
                                        <button class="flex items-center space-x-1 space-x-reverse px-3 py-1 rounded-full bg-red-50 text-red-600 hover:bg-red-100 transition-colors">
                                            <span>👎</span>
                                            <span class="text-sm">لا</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- No Results -->
                <div v-if="filteredFAQs.length === 0" class="text-center py-12">
                    <div class="text-6xl mb-4">🤔</div>
                    <h3 class="text-2xl font-bold text-gray-900 mb-4">لم نجد نتائج</h3>
                    <p class="text-gray-600 mb-6">جرب البحث بكلمات مختلفة أو تصفح فئة أخرى</p>
                    <button @click="searchQuery = ''; selectedCategory = 'all'" 
                            class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-semibold transition-colors">
                        إعادة تعيين البحث
                    </button>
                </div>
            </div>
        </section>

        <!-- Contact Support -->
        <section class="py-16 bg-gradient-to-r from-blue-600 to-purple-600 text-white">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h2 class="text-4xl font-bold mb-6">لم تجد إجابة سؤالك؟</h2>
                <p class="text-xl mb-8 opacity-90">
                    فريق الدعم متاح لمساعدتك في أي استفسار أو مشكلة تواجهها
                </p>
                <div class="flex justify-center space-x-4 space-x-reverse">
                    <Link href="/contact" 
                          class="bg-white text-blue-600 hover:bg-gray-100 px-8 py-4 rounded-lg text-lg font-semibold transition-colors">
                        تواصل معنا
                    </Link>
                    <Link href="/help" 
                          class="border-2 border-white hover:bg-white hover:text-blue-600 px-8 py-4 rounded-lg text-lg font-semibold transition-colors">
                        مركز المساعدة
                    </Link>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="bg-gray-900 text-white py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid md:grid-cols-4 gap-8">
                    <div class="md:col-span-2">
                        <div class="flex items-center space-x-3 space-x-reverse mb-6">
                            <div class="w-10 h-10 bg-gradient-to-br from-blue-400 to-purple-600 rounded-lg flex items-center justify-center">
                                <span class="text-white font-bold">م</span>
                            </div>
                            <h3 class="text-xl font-bold">منصة مُعين التعليمية</h3>
                        </div>
                    </div>
                    <div>
                        <h5 class="text-lg font-bold mb-6">روابط سريعة</h5>
                        <ul class="space-y-3">
                            <li><Link href="/" class="text-gray-400 hover:text-white transition-colors">الرئيسية</Link></li>
                            <li><Link href="/about" class="text-gray-400 hover:text-white transition-colors">عن المنصة</Link></li>
                            <li><Link href="/features" class="text-gray-400 hover:text-white transition-colors">المميزات</Link></li>
                        </ul>
                    </div>
                    <div>
                        <h5 class="text-lg font-bold mb-6">الدعم</h5>
                        <ul class="space-y-3">
                            <li><Link href="/help" class="text-gray-400 hover:text-white transition-colors">مركز المساعدة</Link></li>
                            <li><Link href="/contact" class="text-gray-400 hover:text-white transition-colors">تواصل معنا</Link></li>
                            <li><Link href="/privacy" class="text-gray-400 hover:text-white transition-colors">سياسة الخصوصية</Link></li>
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

.animate-fade-in {
    animation: fadeIn 0.3s ease-in-out;
}

@keyframes fadeIn {
    from {
        opacity: 0;
        transform: translateY(-10px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}
</style>