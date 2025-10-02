<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import { ref, onMounted } from 'vue';
import AppearanceTabs from '@/components/AppearanceTabs.vue';

const isVisible = ref(false);

onMounted(() => {
    setTimeout(() => {
        isVisible.value = true;
    }, 100);
});

const mainFeatures = [
    {
        icon: '🤖',
        title: 'الذكاء الاصطناعي المتطور',
        description: 'تقنية Google Gemini AI الرائدة لإنشاء محتوى تعليمي عالي الجودة ومخصص حسب احتياجاتك التعليمية',
        benefits: [
            'محتوى تعليمي دقيق ومتخصص',
            'تخصيص حسب المنهج السعودي',
            'ذكاء اصطناعي متطور ومحدث',
            'سرعة في الإنتاج مع ضمان الجودة'
        ]
    },
    {
        icon: '📚',
        title: 'مكتبة شاملة من الأدوات',
        description: '12 أداة ذكية متخصصة تغطي كامل العملية التعليمية من التخطيط إلى التقييم والمتابعة',
        benefits: [
            'تغطية شاملة للعملية التعليمية',
            'أدوات متكاملة ومترابطة',
            'سهولة في الاستخدام والتنقل',
            'تحديثات مستمرة وتطوير دائم'
        ]
    },
    {
        icon: '🎯',
        title: 'تخصيص حسب المنهج',
        description: 'محتوى مصمم خصيصاً للمناهج السعودية والعربية مع دعم جميع المراحل الدراسية',
        benefits: [
            'ملائم للمناهج السعودية',
            'دعم جميع المراحل الدراسية',
            'محتوى باللغة العربية',
            'مراعاة البيئة التعليمية المحلية'
        ]
    },
    {
        icon: '⚡',
        title: 'سرعة وكفاءة',
        description: 'إنشاء المحتوى في ثوانٍ معدودة مع ضمان الجودة والدقة في المعلومات',
        benefits: [
            'إنتاج سريع للمحتوى',
            'توفير الوقت والجهد',
            'كفاءة عالية في العمل',
            'نتائج فورية وعالية الجودة'
        ]
    }
];

const toolCategories = [
    {
        category: 'أدوات إنشاء المحتوى',
        icon: '📝',
        color: 'blue',
        tools: [
            {
                name: 'مولد خطط الدروس',
                description: 'إنشاء خطط دروس شاملة ومفصلة حسب المنهج والمرحلة الدراسية',
                features: ['تخصيص حسب المادة', 'أهداف تعليمية واضحة', 'أنشطة متنوعة', 'تقييم شامل']
            },
            {
                name: 'مولد الاختبارات',
                description: 'إنشاء اختبارات متنوعة بأسئلة مختلفة الأنواع والمستويات المعرفية',
                features: ['أسئلة متنوعة', 'مستويات مختلفة', 'إجابات نموذجية', 'معايير تقييم']
            },
            {
                name: 'مولد الأهداف التعليمية',
                description: 'تطوير أهداف تعليمية واضحة وقابلة للقياس حسب تصنيف بلوم',
                features: ['أهداف قابلة للقياس', 'تصنيف بلوم', 'ربط بالمحتوى', 'تدرج في المستوى']
            },
            {
                name: 'مبسّط المفاهيم',
                description: 'تبسيط المفاهيم المعقدة وشرحها بطريقة مفهومة ومناسبة للطلاب',
                features: ['شرح مبسط', 'أمثلة واقعية', 'تدرج في التعقيد', 'طرق متنوعة']
            }
        ]
    },
    {
        category: 'أدوات التفاعل والإبداع',
        icon: '🎨',
        color: 'purple',
        tools: [
            {
                name: 'مولد القصص التعليمية',
                description: 'إنشاء قصص تفاعلية وممتعة لتبسيط المعلومات والمفاهيم التعليمية',
                features: ['قصص تفاعلية', 'محتوى ممتع', 'ربط بالمنهج', 'قيم تربوية']
            },
            {
                name: 'مولد الأنشطة التعليمية',
                description: 'تطوير أنشطة تعليمية متنوعة لزيادة تفاعل الطلاب ومشاركتهم',
                features: ['أنشطة متنوعة', 'تفاعل الطلاب', 'مناسبة للعمر', 'سهلة التطبيق']
            },
            {
                name: 'عجلة الاختيار الذكية',
                description: 'أداة تفاعلية لاختيار الطلاب بعدالة وإشراكهم في الأنشطة الصفية',
                features: ['اختيار عادل', 'واجهة تفاعلية', 'سهولة الاستخدام', 'تتبع المشاركة']
            },
            {
                name: 'مقترح الاستراتيجيات',
                description: 'اقتراح استراتيجيات تدريس مبتكرة وفعالة حسب المحتوى والهدف',
                features: ['استراتيجيات متنوعة', 'مناسبة للمحتوى', 'سهلة التطبيق', 'مجربة وفعالة']
            }
        ]
    },
    {
        category: 'أدوات التقييم والمتابعة',
        icon: '📊',
        color: 'green',
        tools: [
            {
                name: 'مولد معايير التقييم',
                description: 'إنشاء معايير تقييم واضحة ومفصلة للأنشطة والمشاريع التعليمية',
                features: ['معايير واضحة', 'قابلة للقياس', 'شاملة ومفصلة', 'سهلة الاستخدام']
            },
            {
                name: 'مولد ملاحظات السجلات',
                description: 'إنشاء تقارير مفصلة وملاحظات مهنية حول أداء الطلاب وتقدمهم',
                features: ['تقارير مفصلة', 'ملاحظات مهنية', 'تتبع التقدم', 'توثيق الأداء']
            },
            {
                name: 'ملف الإنجاز المهني',
                description: 'توثيق التطور المهني والإنجازات التعليمية للمعلم بطريقة منظمة',
                features: ['توثيق الإنجازات', 'تطوير مهني', 'سجل شامل', 'تقييم ذاتي']
            },
            {
                name: 'مساعد رسائل أولياء الأمور',
                description: 'إنشاء رسائل مهنية ومؤثرة للتواصل الفعال مع أولياء الأمور',
                features: ['رسائل مهنية', 'تواصل فعال', 'لغة مناسبة', 'محتوى مؤثر']
            }
        ]
    }
];

const benefits = [
    {
        icon: '⏰',
        title: 'توفير الوقت',
        description: 'اختصار ساعات العمل إلى دقائق معدودة',
        stats: '70% توفير في الوقت'
    },
    {
        icon: '🎯',
        title: 'دقة عالية',
        description: 'محتوى دقيق ومتخصص حسب المناهج',
        stats: '99% دقة المحتوى'
    },
    {
        icon: '📈',
        title: 'تحسين الأداء',
        description: 'رفع مستوى جودة العملية التعليمية',
        stats: '85% تحسن في الأداء'
    },
    {
        icon: '💡',
        title: 'الإبداع والابتكار',
        description: 'أفكار جديدة ومبتكرة للتدريس',
        stats: '90% رضا المعلمين'
    }
];
</script>

<template>
    <div dir="rtl" class="min-h-screen bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900">
        <Head title="المميزات - منصة مُعين التعليمية" />
        
        <!-- Header -->
        <header class="bg-white dark:bg-gray-900 shadow-sm sticky top-0 z-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex justify-between items-center py-4">
                    <Link href="/" class="flex items-center space-x-3 space-x-reverse">
                        <div class="w-10 h-10 bg-gradient-to-br from-blue-600 to-purple-600 rounded-lg flex items-center justify-center">
                            <span class="text-white font-bold text-lg">م</span>
                        </div>
                        <h1 class="text-xl font-bold text-gray-900 dark:text-white" style="font-family: 'Cairo', sans-serif;">
                            منصة مُعين التعليمية
                        </h1>
                    </Link>
                    
                    <div class="flex items-center space-x-4 space-x-reverse">
                        <AppearanceTabs />
                        <Link href="/login" class="text-gray-600 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 transition-colors">
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
                    <h1 class="text-5xl font-bold text-gray-900 dark:text-white mb-6" style="font-family: 'Cairo', sans-serif;">
                        اكتشف قوة التعليم الذكي
                    </h1>
                    <p class="text-xl text-gray-600 dark:text-gray-300 max-w-4xl mx-auto leading-relaxed mb-12">
                        مع منصة مُعين التعليمية، احصل على أكثر من 12 أداة ذكية تساعدك في إنشاء محتوى تعليمي 
                        عالي الجودة بسرعة وكفاءة مذهلة
                    </p>
                    
                    <div class="grid md:grid-cols-4 gap-6 mb-16">
                        <div v-for="benefit in benefits" :key="benefit.title" 
                             class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-lg hover:shadow-xl transition-shadow">
                            <div class="text-4xl mb-4">{{ benefit.icon }}</div>
                            <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">{{ benefit.title }}</h3>
                            <p class="text-gray-600 dark:text-gray-300 text-sm mb-3">{{ benefit.description }}</p>
                            <div class="text-blue-600 dark:text-blue-400 font-bold">{{ benefit.stats }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Main Features -->
        <section class="py-16 bg-white dark:bg-gray-800">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold text-gray-900 dark:text-white mb-6">المميزات الرئيسية</h2>
                    <p class="text-xl text-gray-600 dark:text-gray-300">اكتشف ما يجعل منصة مُعين فريدة ومتميزة</p>
                </div>

                <div class="grid lg:grid-cols-2 gap-12">
                    <div v-for="feature in mainFeatures" :key="feature.title" 
                         class="bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-700 dark:to-gray-600 p-8 rounded-2xl">
                        <div class="flex items-start space-x-4 space-x-reverse mb-6">
                            <div class="text-5xl">{{ feature.icon }}</div>
                            <div>
                                <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-3">{{ feature.title }}</h3>
                                <p class="text-gray-700 dark:text-gray-300 leading-relaxed">{{ feature.description }}</p>
                            </div>
                        </div>
                        
                        <div class="grid md:grid-cols-2 gap-3">
                            <div v-for="benefit in feature.benefits" :key="benefit" 
                                 class="flex items-center space-x-2 space-x-reverse bg-white dark:bg-gray-700 p-3 rounded-lg">
                                <span class="text-green-500">✓</span>
                                <span class="text-sm text-gray-700 dark:text-gray-300">{{ benefit }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Tools Categories -->
        <section class="py-16 bg-gray-50 dark:bg-gray-900">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold text-gray-900 dark:text-white mb-6">الأدوات التعليمية</h2>
                    <p class="text-xl text-gray-600 dark:text-gray-300">12 أداة ذكية مصممة لتغطية كامل العملية التعليمية</p>
                </div>

                <div class="space-y-16">
                    <div v-for="category in toolCategories" :key="category.category">
                        <!-- Category Header -->
                        <div class="text-center mb-8">
                            <div class="flex items-center justify-center space-x-3 space-x-reverse mb-4">
                                <div :class="[
                                    'w-16 h-16 rounded-full flex items-center justify-center text-2xl',
                                    category.color === 'blue' ? 'bg-blue-100 dark:bg-blue-900/30 text-blue-600 dark:text-blue-400' :
                                    category.color === 'purple' ? 'bg-purple-100 dark:bg-purple-900/30 text-purple-600 dark:text-purple-400' :
                                    'bg-green-100 dark:bg-green-900/30 text-green-600 dark:text-green-400'
                                ]">
                                    {{ category.icon }}
                                </div>
                                <h3 class="text-3xl font-bold text-gray-900 dark:text-white">{{ category.category }}</h3>
                            </div>
                        </div>

                        <!-- Tools Grid -->
                        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
                            <div v-for="tool in category.tools" :key="tool.name" 
                                 class="bg-white dark:bg-gray-800 p-6 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 hover:transform hover:-translate-y-2">
                                <h4 class="text-lg font-bold text-gray-900 dark:text-white mb-3">{{ tool.name }}</h4>
                                <p class="text-gray-600 dark:text-gray-300 text-sm mb-4 leading-relaxed">{{ tool.description }}</p>
                                
                                <div class="space-y-2">
                                    <div v-for="feature in tool.features" :key="feature" 
                                         class="flex items-center space-x-2 space-x-reverse">
                                        <span :class="[
                                            'w-2 h-2 rounded-full',
                                            category.color === 'blue' ? 'bg-blue-400' :
                                            category.color === 'purple' ? 'bg-purple-400' :
                                            'bg-green-400'
                                        ]"></span>
                                        <span class="text-xs text-gray-600 dark:text-gray-400">{{ feature }}</span>
                                    </div>
                                </div>

                                <button :class="[
                                    'w-full mt-4 py-2 px-4 rounded-lg text-white font-semibold transition-colors',
                                    category.color === 'blue' ? 'bg-blue-600 hover:bg-blue-700' :
                                    category.color === 'purple' ? 'bg-purple-600 hover:bg-purple-700' :
                                    'bg-green-600 hover:bg-green-700'
                                ]">
                                    جرب الأداة
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Technology Section -->
        <section class="py-16 bg-gradient-to-r from-blue-600 to-purple-600 text-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold mb-6">التكنولوجيا المتقدمة</h2>
                    <p class="text-xl opacity-90 max-w-3xl mx-auto">
                        نستخدم أحدث تقنيات الذكاء الاصطناعي لضمان حصولك على أفضل تجربة تعليمية
                    </p>
                </div>

                <div class="grid md:grid-cols-3 gap-8">
                    <div class="text-center bg-white/10 backdrop-blur-sm p-8 rounded-2xl">
                        <div class="text-5xl mb-6">🤖</div>
                        <h3 class="text-xl font-bold mb-4">Google Gemini AI</h3>
                        <p class="opacity-90">
                            أحدث نماذج الذكاء الاصطناعي من Google للحصول على محتوى تعليمي دقيق ومتطور
                        </p>
                    </div>

                    <div class="text-center bg-white/10 backdrop-blur-sm p-8 rounded-2xl">
                        <div class="text-5xl mb-6">🔒</div>
                        <h3 class="text-xl font-bold mb-4">الأمان والخصوصية</h3>
                        <p class="opacity-90">
                            حماية كاملة لبياناتك ومحتواك التعليمي مع أعلى معايير الأمان الرقمي
                        </p>
                    </div>

                    <div class="text-center bg-white/10 backdrop-blur-sm p-8 rounded-2xl">
                        <div class="text-5xl mb-6">⚡</div>
                        <h3 class="text-xl font-bold mb-4">الأداء العالي</h3>
                        <p class="opacity-90">
                            سرعة فائقة في إنشاء المحتوى مع ضمان الجودة والدقة في كل مرة
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Stats Section -->
        <section class="py-16 bg-white dark:bg-gray-800">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-gray-900 dark:text-white mb-6">أرقام تتحدث عن نفسها</h2>
                    <p class="text-xl text-gray-600 dark:text-gray-300">إنجازات المنصة بالأرقام</p>
                </div>

                <div class="grid md:grid-cols-4 gap-8">
                    <div class="text-center p-6">
                        <div class="text-5xl font-bold text-blue-600 dark:text-blue-400 mb-3">12+</div>
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">أداة ذكية</h3>
                        <p class="text-gray-600 dark:text-gray-300">تغطي كامل العملية التعليمية</p>
                    </div>

                    <div class="text-center p-6">
                        <div class="text-5xl font-bold text-green-600 dark:text-green-400 mb-3">50K+</div>
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">محتوى تعليمي</h3>
                        <p class="text-gray-600 dark:text-gray-300">تم إنشاؤه باستخدام المنصة</p>
                    </div>

                    <div class="text-center p-6">
                        <div class="text-5xl font-bold text-purple-600 dark:text-purple-400 mb-3">5K+</div>
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">معلم ومعلمة</h3>
                        <p class="text-gray-600 dark:text-gray-300">يستخدمون المنصة بانتظام</p>
                    </div>

                    <div class="text-center p-6">
                        <div class="text-5xl font-bold text-orange-600 dark:text-orange-400 mb-3">99%</div>
                        <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-2">معدل الرضا</h3>
                        <p class="text-gray-600 dark:text-gray-300">من المعلمين المستخدمين</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="py-20 bg-gradient-to-br from-gray-50 to-gray-100 dark:from-gray-800 dark:to-gray-700">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h2 class="text-4xl font-bold text-gray-900 dark:text-white mb-6">ابدأ رحلتك مع التعليم الذكي</h2>
                <p class="text-xl text-gray-600 dark:text-gray-300 mb-8">
                    انضم إلى آلاف المعلمين الذين يستخدمون منصة مُعين لتطوير تجربتهم التعليمية
                </p>
                <div class="flex justify-center space-x-4 space-x-reverse">
                    <Link href="/register" 
                          class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-4 rounded-lg text-lg font-semibold transition-colors">
                        ابدأ الآن مجاناً
                    </Link>
                    <Link href="/tutorials" 
                          class="bg-white hover:bg-gray-50 text-blue-600 border-2 border-blue-600 px-8 py-4 rounded-lg text-lg font-semibold transition-colors">
                        شاهد العروض التوضيحية
                    </Link>
                </div>
            </div>
        </section>

        <!-- Footer -->
        <footer class="bg-gray-900 dark:bg-gray-950 text-white py-16">
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
                        <p class="text-gray-400 dark:text-gray-300 mb-6 leading-relaxed">
                            منصة رائدة في تطوير التعليم بالذكاء الاصطناعي، نساعد المعلمين على إنشاء محتوى تعليمي عالي الجودة.
                        </p>
                    </div>

                    <!-- روابط سريعة -->
                    <div>
                        <h5 class="text-lg font-bold mb-6">روابط سريعة</h5>
                        <ul class="space-y-3">
                            <li><Link href="/" class="text-gray-400 hover:text-white dark:hover:text-gray-200 transition-colors">الرئيسية</Link></li>
                            <li><Link href="/about" class="text-gray-400 hover:text-white dark:hover:text-gray-200 transition-colors">عن المنصة</Link></li>
                            <li><Link href="/tutorials" class="text-gray-400 hover:text-white dark:hover:text-gray-200 transition-colors">دروس تعليمية</Link></li>
                            <li><Link href="/blog" class="text-gray-400 hover:text-white dark:hover:text-gray-200 transition-colors">المدونة</Link></li>
                        </ul>
                    </div>

                    <!-- الدعم -->
                    <div>
                        <h5 class="text-lg font-bold mb-6">الدعم والمساعدة</h5>
                        <ul class="space-y-3">
                            <li><Link href="/help" class="text-gray-400 hover:text-white dark:hover:text-gray-200 transition-colors">مركز المساعدة</Link></li>
                            <li><Link href="/contact" class="text-gray-400 hover:text-white dark:hover:text-gray-200 transition-colors">تواصل معنا</Link></li>
                            <li><Link href="/privacy" class="text-gray-400 hover:text-white dark:hover:text-gray-200 transition-colors">سياسة الخصوصية</Link></li>
                            <li><Link href="/terms" class="text-gray-400 hover:text-white dark:hover:text-gray-200 transition-colors">شروط الاستخدام</Link></li>
                        </ul>
                    </div>
                </div>

                <div class="border-t border-gray-800 dark:border-gray-700 pt-8 mt-8">
                    <div class="flex flex-col md:flex-row justify-between items-center">
                        <div class="text-sm text-gray-500 dark:text-gray-400 mb-4 md:mb-0">
                            © 2025 منصة مُعين التعليمية. جميع الحقوق محفوظة.
                        </div>
                        <div class="text-sm text-gray-500 dark:text-gray-400">
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