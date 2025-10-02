<script setup lang="ts">
import { dashboard, login, register } from '@/routes';
import { Head, Link } from '@inertiajs/vue3';
import { ref, onMounted } from 'vue';

const isVisible = ref(false);

onMounted(() => {
    setTimeout(() => {
        isVisible.value = true;
    }, 100);
});

const features = [
    {
        icon: '🤖',
        title: 'الذكاء الاصطناعي المتطور',
        description: 'تقنية Gemini AI من جوجل لإنشاء محتوى تعليمي عالي الجودة ومخصص حسب احتياجاتك التعليمية'
    },
    {
        icon: '📚',
        title: 'مكتبة شاملة من الأدوات',
        description: '12 أداة ذكية متخصصة تغطي كامل العملية التعليمية من التخطيط إلى التقييم والمتابعة'
    },
    {
        icon: '🎯',
        title: 'تخصيص حسب المنهج',
        description: 'محتوى مصمم خصيصاً للمناهج السعودية والعربية مع دعم جميع المراحل الدراسية'
    },
    {
        icon: '⚡',
        title: 'سرعة وكفاءة',
        description: 'إنشاء المحتوى في ثوانٍ معدودة مع ضمان الجودة والدقة في المعلومات'
    },
    {
        icon: '📊',
        title: 'تتبع وإحصائيات',
        description: 'نظام متقدم لتتبع استخدامك وقياس تأثير المحتوى المنشأ على العملية التعليمية'
    },
    {
        icon: '�',
        title: 'أمان وخصوصية',
        description: 'حماية كاملة لبياناتك ومحتواك التعليمي مع إمكانية التحكم الكامل في الخصوصية'
    },
    {
        icon: '🌐',
        title: 'واجهة عربية متقدمة',
        description: 'تصميم حديث ومتجاوب مع دعم كامل للغة العربية والكتابة من اليمين لليسار'
    },
    {
        icon: '💾',
        title: 'حفظ وتنظيم ذكي',
        description: 'نظام متطور لحفظ وتصنيف جميع المحتوى المنشأ مع إمكانية البحث والفلترة السريعة'
    }
];

const platformCapabilities = [
    {
        category: 'أدوات إنشاء المحتوى',
        icon: '📝',
        tools: [
            { name: 'مولد خطط الدروس', desc: 'خطط دروس شاملة ومفصلة حسب المنهج والمرحلة' },
            { name: 'مولد الاختبارات', desc: 'اختبارات متنوعة بأسئلة مختلفة الأنواع والمستويات' },
            { name: 'مولد الأهداف التعليمية', desc: 'أهداف تعليمية واضحة وقابلة للقياس' },
            { name: 'مبسّط المفاهيم', desc: 'شرح المفاهيم المعقدة بطريقة مبسطة ومفهومة' }
        ]
    },
    {
        category: 'أدوات التفاعل والإبداع',
        icon: '🎨',
        tools: [
            { name: 'مولد القصص التعليمية', desc: 'قصص تفاعلية لتبسيط المعلومات' },
            { name: 'مولد الأنشطة التعليمية', desc: 'أنشطة متنوعة لزيادة تفاعل الطلاب' },
            { name: 'عجلة الاختيار الذكية', desc: 'أداة تفاعلية لاختيار الطلاب بعدالة' },
            { name: 'مقترح الاستراتيجيات', desc: 'استراتيجيات تدريس مبتكرة وفعالة' }
        ]
    },
    {
        category: 'أدوات التقييم والمتابعة',
        icon: '📊',
        tools: [
            { name: 'مولد معايير التقييم', desc: 'معايير تقييم واضحة ومفصلة' },
            { name: 'مولد ملاحظات السجلات', desc: 'تقارير مفصلة عن أداء الطلاب' },
            { name: 'ملف الإنجاز المهني', desc: 'توثيق التطور المهني والإنجازات' },
            { name: 'مساعد رسائل أولياء الأمور', desc: 'رسائل مهنية للتواصل مع الأولياء' }
        ]
    }
];

const stats = [
    { number: '12+', label: 'أداة ذكية متخصصة' },
    { number: '50,000+', label: 'محتوى تعليمي تم إنشاؤه' },
    { number: '5,000+', label: 'معلم ومعلمة يستخدمون المنصة' },
    { number: '99%', label: 'معدل رضا المستخدمين' }
];

const tools = [
    'مولد خطط الدروس',
    'مولد الاختبارات',
    'مولد الأهداف التعليمية',
    'مبسّط المفاهيم',
    'مولد القصص التعليمية',
    'مولد معايير التقييم',
    'مساعد رسائل أولياء الأمور',
    'مولد الأنشطة التعليمية',
    'مقترح الاستراتيجيات',
    'مولد ملاحظات السجلات',
    'ملف الإنجاز المهني',
    'عجلة الاختيار الذكية'
];
</script>

<template>
    <Head title="منصة مُعين التعليمية - مساعدك التعليمي الذكي">
        <meta name="description" content="منصة تعليمية ذكية تعتمد على الذكاء الاصطناعي لمساعدة المعلمين في إنشاء المحتوى التعليمي وإدارة الفصول الدراسية">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700&display=swap" rel="stylesheet">
    </Head>

    <div class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100" dir="rtl" style="font-family: 'Cairo', sans-serif;">
        <header class="relative z-10">
            <nav class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-6 flex items-center justify-between">
                <div class="flex items-center space-x-4 space-x-reverse">
                    <div class="text-3xl font-bold text-blue-600">🎓</div>
                    <h1 class="text-2xl font-bold text-gray-900">منصة مُعين</h1>
                </div>
                
                <div class="flex items-center space-x-4 space-x-reverse">
                    <template v-if="$page.props.auth.user">
                        <Link
                            :href="dashboard()"
                            class="bg-blue-600 text-white px-6 py-2 rounded-lg font-semibold hover:bg-blue-700 transition-colors shadow-md"
                        >
                            لوحة التحكم
                        </Link>
                    </template>
                    <template v-else>
                        <Link
                            :href="login()"
                            class="text-gray-700 hover:text-blue-600 px-4 py-2 rounded-lg font-medium transition-colors"
                        >
                            تسجيل الدخول
                        </Link>
                        <Link
                            :href="register()"
                            class="bg-blue-600 text-white px-6 py-2 rounded-lg font-semibold hover:bg-blue-700 transition-colors shadow-md"
                        >
                            إنشاء حساب
                        </Link>
                    </template>
                </div>
            </nav>
        </header>

        <main class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div :class="['transition-all duration-1000', isVisible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10']">
                <div class="text-center mb-16">
                    <h2 class="text-5xl font-bold text-gray-900 mb-6 leading-tight">
                        منصة <span class="text-blue-600">مُعين</span> التعليمية
                        <br class="hidden sm:block">
                        <span class="text-3xl text-gray-700">مساعدك الذكي في التعليم</span>
                    </h2>
                    <p class="text-xl text-gray-600 mb-8 max-w-4xl mx-auto leading-relaxed">
                        منصة تعليمية رائدة تعتمد على الذكاء الاصطناعي المتطور لتمكين المعلمين والمعلمات من إنشاء محتوى تعليمي استثنائي وإدارة العملية التعليمية بكفاءة عالية. 
                        مع أكثر من 12 أداة ذكية متخصصة، نوفر لك كل ما تحتاجه لتطوير تجربة تعليمية متميزة.
                    </p>
                    <div class="flex justify-center space-x-4 space-x-reverse">
                        <Link
                            v-if="!$page.props.auth.user"
                            :href="register()"
                            class="bg-blue-600 text-white px-8 py-4 rounded-xl font-bold text-lg hover:bg-blue-700 transition-all shadow-lg hover:shadow-xl transform hover:-translate-y-1"
                        >
                            ابدأ مجاناً الآن ✨
                        </Link>
                        <Link
                            v-else
                            :href="dashboard()"
                            class="bg-blue-600 text-white px-8 py-4 rounded-xl font-bold text-lg hover:bg-blue-700 transition-all shadow-lg hover:shadow-xl transform hover:-translate-y-1"
                        >
                            الذهاب للوحة التحكم 🚀
                        </Link>
                    </div>
                </div>

                <!-- إحصائيات المنصة -->
                <div class="mb-20">
                    <div class="bg-gradient-to-r from-blue-600 to-indigo-600 rounded-2xl p-12 text-white shadow-2xl">
                        <h3 class="text-3xl font-bold text-center mb-12">
                            منصة مُعين في أرقام
                        </h3>
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-8">
                            <div 
                                v-for="(stat, index) in stats" 
                                :key="index"
                                class="text-center"
                            >
                                <div class="text-4xl font-bold mb-2">{{ stat.number }}</div>
                                <div class="text-blue-100 text-sm">{{ stat.label }}</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- المميزات الرئيسية -->
                <div class="mb-20">
                    <h3 class="text-3xl font-bold text-center text-gray-900 mb-4">
                        لماذا تختار منصة مُعين؟
                    </h3>
                    <p class="text-center text-gray-600 mb-12 max-w-3xl mx-auto text-lg">
                        منصة شاملة تجمع بين قوة الذكاء الاصطناعي وسهولة الاستخدام لتوفر لك تجربة تعليمية لا مثيل لها
                    </p>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                        <div 
                            v-for="(feature, index) in features" 
                            :key="index"
                            class="bg-white rounded-xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2 border-t-4 border-blue-500"
                        >
                            <div class="text-3xl mb-4">{{ feature.icon }}</div>
                            <h4 class="text-lg font-bold text-gray-900 mb-3">{{ feature.title }}</h4>
                            <p class="text-gray-600 text-sm leading-relaxed">{{ feature.description }}</p>
                        </div>
                    </div>
                </div>

                <!-- قدرات المنصة التفصيلية -->
                <div class="mb-20">
                    <h3 class="text-3xl font-bold text-center text-gray-900 mb-4">
                        أدوات شاملة لكل احتياجاتك التعليمية
                    </h3>
                    <p class="text-center text-gray-600 mb-12 max-w-3xl mx-auto text-lg">
                        مجموعة متكاملة من الأدوات الذكية المصممة خصيصاً لتغطية جميع جوانب العملية التعليمية
                    </p>
                    <div class="space-y-12">
                        <div 
                            v-for="(capability, index) in platformCapabilities" 
                            :key="index"
                            class="bg-white rounded-2xl shadow-xl overflow-hidden"
                        >
                            <div class="bg-gradient-to-r from-blue-50 to-indigo-50 p-8 border-b">
                                <div class="flex items-center justify-center mb-4">
                                    <div class="text-4xl mr-4">{{ capability.icon }}</div>
                                    <h4 class="text-2xl font-bold text-gray-900">{{ capability.category }}</h4>
                                </div>
                            </div>
                            <div class="p-8">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div 
                                        v-for="(tool, toolIndex) in capability.tools" 
                                        :key="toolIndex"
                                        class="bg-gray-50 rounded-lg p-6 hover:bg-blue-50 transition-colors border-r-4 border-blue-500"
                                    >
                                        <h5 class="text-lg font-bold text-gray-900 mb-2">{{ tool.name }}</h5>
                                        <p class="text-gray-600 text-sm">{{ tool.desc }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- التقنية المستخدمة -->
                <div class="mb-20">
                    <div class="bg-gradient-to-br from-gray-900 to-blue-900 rounded-2xl p-12 text-white shadow-2xl">
                        <div class="text-center mb-12">
                            <h3 class="text-3xl font-bold mb-4">
                                مدعوم بأحدث تقنيات الذكاء الاصطناعي
                            </h3>
                            <p class="text-xl text-blue-100 max-w-3xl mx-auto">
                                نستخدم تقنية Google Gemini AI المتطورة لضمان أعلى جودة في المحتوى التعليمي المنشأ
                            </p>
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                            <div class="text-center">
                                <div class="bg-blue-500 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                                    <span class="text-2xl">🧠</span>
                                </div>
                                <h4 class="text-lg font-bold mb-2">ذكاء متقدم</h4>
                                <p class="text-blue-100 text-sm">فهم عميق للمحتوى التعليمي والسياق العربي</p>
                            </div>
                            <div class="text-center">
                                <div class="bg-green-500 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                                    <span class="text-2xl">⚡</span>
                                </div>
                                <h4 class="text-lg font-bold mb-2">سرعة فائقة</h4>
                                <p class="text-blue-100 text-sm">إنشاء المحتوى في ثوانٍ معدودة مع دقة عالية</p>
                            </div>
                            <div class="text-center">
                                <div class="bg-purple-500 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                                    <span class="text-2xl">🎯</span>
                                </div>
                                <h4 class="text-lg font-bold mb-2">تخصيص دقيق</h4>
                                <p class="text-blue-100 text-sm">محتوى مخصص حسب المنهج والمرحلة الدراسية</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- المزايا الخاصة -->
                <div class="mb-20">
                    <h3 class="text-3xl font-bold text-center text-gray-900 mb-12">
                        مزايا خاصة تميز منصة مُعين
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-xl p-8 border border-green-200">
                            <div class="flex items-center mb-6">
                                <div class="bg-green-500 rounded-full w-12 h-12 flex items-center justify-center mr-4">
                                    <span class="text-white text-xl">🆓</span>
                                </div>
                                <h4 class="text-xl font-bold text-gray-900">استخدام مجاني</h4>
                            </div>
                            <p class="text-gray-700 mb-4">
                                ابدأ باستخدام المنصة مجاناً مع إمكانية إنشاء محتوى تعليمي بجودة عالية دون أي رسوم
                            </p>
                            <ul class="text-sm text-gray-600 space-y-2">
                                <li class="flex items-center"><span class="text-green-500 mr-2">✓</span> 10 عمليات إنشاء مجانية شهرياً</li>
                                <li class="flex items-center"><span class="text-green-500 mr-2">✓</span> الوصول لجميع الأدوات الأساسية</li>
                                <li class="flex items-center"><span class="text-green-500 mr-2">✓</span> حفظ وتنظيم المحتوى</li>
                            </ul>
                        </div>

                        <div class="bg-gradient-to-br from-blue-50 to-cyan-50 rounded-xl p-8 border border-blue-200">
                            <div class="flex items-center mb-6">
                                <div class="bg-blue-500 rounded-full w-12 h-12 flex items-center justify-center mr-4">
                                    <span class="text-white text-xl">🇸🇦</span>
                                </div>
                                <h4 class="text-xl font-bold text-gray-900">محتوى محلي</h4>
                            </div>
                            <p class="text-gray-700 mb-4">
                                محتوى مصمم خصيصاً للمناهج السعودية والعربية مع مراعاة الثقافة والقيم المحلية
                            </p>
                            <ul class="text-sm text-gray-600 space-y-2">
                                <li class="flex items-center"><span class="text-blue-500 mr-2">✓</span> مناهج وزارة التعليم السعودية</li>
                                <li class="flex items-center"><span class="text-blue-500 mr-2">✓</span> المناهج العربية المختلفة</li>
                                <li class="flex items-center"><span class="text-blue-500 mr-2">✓</span> مراعاة السياق الثقافي</li>
                            </ul>
                        </div>

                        <div class="bg-gradient-to-br from-purple-50 to-violet-50 rounded-xl p-8 border border-purple-200">
                            <div class="flex items-center mb-6">
                                <div class="bg-purple-500 rounded-full w-12 h-12 flex items-center justify-center mr-4">
                                    <span class="text-white text-xl">🔄</span>
                                </div>
                                <h4 class="text-xl font-bold text-gray-900">تحديث مستمر</h4>
                            </div>
                            <p class="text-gray-700 mb-4">
                                تطوير مستمر للمنصة مع إضافة أدوات جديدة وتحسينات دورية لضمان أفضل تجربة
                            </p>
                            <ul class="text-sm text-gray-600 space-y-2">
                                <li class="flex items-center"><span class="text-purple-500 mr-2">✓</span> أدوات جديدة شهرياً</li>
                                <li class="flex items-center"><span class="text-purple-500 mr-2">✓</span> تحسينات مستمرة</li>
                                <li class="flex items-center"><span class="text-purple-500 mr-2">✓</span> دعم فني متواصل</li>
                            </ul>
                        </div>

                        <div class="bg-gradient-to-br from-orange-50 to-red-50 rounded-xl p-8 border border-orange-200">
                            <div class="flex items-center mb-6">
                                <div class="bg-orange-500 rounded-full w-12 h-12 flex items-center justify-center mr-4">
                                    <span class="text-white text-xl">👥</span>
                                </div>
                                <h4 class="text-xl font-bold text-gray-900">مجتمع تعليمي</h4>
                            </div>
                            <p class="text-gray-700 mb-4">
                                انضم لمجتمع من آلاف المعلمين والمعلمات الذين يتشاركون الخبرات والأفكار
                            </p>
                            <ul class="text-sm text-gray-600 space-y-2">
                                <li class="flex items-center"><span class="text-orange-500 mr-2">✓</span> مشاركة الخبرات</li>
                                <li class="flex items-center"><span class="text-orange-500 mr-2">✓</span> ورش تدريبية</li>
                                <li class="flex items-center"><span class="text-orange-500 mr-2">✓</span> دعم الأقران</li>
                            </ul>
                        </div>
                    </div>
                </div>

                <!-- دعوة للعمل -->
                <div class="text-center bg-gradient-to-r from-blue-600 via-purple-600 to-indigo-600 rounded-2xl p-12 text-white shadow-2xl relative overflow-hidden">
                    <div class="absolute inset-0 bg-black opacity-10"></div>
                    <div class="relative z-10">
                        <h3 class="text-4xl font-bold mb-6">
                            اجعل التعليم أسهل وأكثر إبداعاً
                        </h3>
                        <p class="text-xl mb-8 opacity-90 max-w-3xl mx-auto leading-relaxed">
                            انضم إلى أكثر من 5,000 معلم ومعلمة يستخدمون منصة مُعين لإنشاء محتوى تعليمي متميز وتطوير تجربة التعليم. 
                            ابدأ رحلتك نحو التعليم الذكي اليوم!
                        </p>
                        
                        <div class="flex flex-col sm:flex-row justify-center items-center space-y-4 sm:space-y-0 sm:space-x-4 sm:space-x-reverse mb-8">
                            <Link
                                v-if="!$page.props.auth.user"
                                :href="register()"
                                class="bg-white text-blue-600 px-10 py-4 rounded-xl font-bold text-lg hover:bg-gray-100 transition-all shadow-lg transform hover:-translate-y-1 hover:shadow-2xl"
                            >
                                🚀 ابدأ مجاناً الآن
                            </Link>
                            <Link
                                v-if="!$page.props.auth.user"
                                :href="login()"
                                class="border-2 border-white text-white px-10 py-4 rounded-xl font-bold text-lg hover:bg-white hover:text-blue-600 transition-all transform hover:-translate-y-1"
                            >
                                تسجيل الدخول
                            </Link>
                            <Link
                                v-else
                                :href="dashboard()"
                                class="bg-white text-blue-600 px-10 py-4 rounded-xl font-bold text-lg hover:bg-gray-100 transition-all shadow-lg transform hover:-translate-y-1 hover:shadow-2xl"
                            >
                                🎯 الذهاب للوحة التحكم
                            </Link>
                        </div>

                        <div class="flex flex-wrap justify-center items-center space-x-8 space-x-reverse text-sm opacity-75">
                            <div class="flex items-center">
                                <span class="text-green-400 mr-2">✓</span>
                                مجاني 100%
                            </div>
                            <div class="flex items-center">
                                <span class="text-green-400 mr-2">✓</span>
                                بدون التزامات
                            </div>
                            <div class="flex items-center">
                                <span class="text-green-400 mr-2">✓</span>
                                دعم فني مجاني
                            </div>
                            <div class="flex items-center">
                                <span class="text-green-400 mr-2">✓</span>
                                محتوى عربي أصيل
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <footer class="bg-gray-900 text-white py-16 mt-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-12">
                    <!-- معلومات المنصة -->
                    <div class="md:col-span-2">
                        <div class="flex items-center space-x-4 space-x-reverse mb-6">
                            <div class="text-4xl">🎓</div>
                            <h4 class="text-2xl font-bold">منصة مُعين التعليمية</h4>
                        </div>
                        <p class="text-gray-400 mb-6 leading-relaxed max-w-md">
                            منصة تعليمية رائدة تعتمد على الذكاء الاصطناعي لتمكين المعلمين من إنشاء محتوى تعليمي متميز. 
                            نسعى لتطوير التعليم العربي وجعله أكثر إبداعاً وفعالية.
                        </p>
                        <div class="flex space-x-4 space-x-reverse">
                            <a href="https://twitter.com/mueen_io" class="text-gray-400 hover:text-white transition-colors">
                                <span class="sr-only">تويتر</span>
                                🐦
                            </a>
                            <a href="https://linkedin.com/company/mueen-io" class="text-gray-400 hover:text-white transition-colors">
                                <span class="sr-only">لينكد إن</span>
                                💼
                            </a>
                            <a href="mailto:info@mueen.io" class="text-gray-400 hover:text-white transition-colors">
                                <span class="sr-only">البريد الإلكتروني</span>
                                📧
                            </a>
                        </div>
                    </div>

                    <!-- روابط سريعة -->
                    <div>
                        <h5 class="text-lg font-bold mb-6">روابط سريعة</h5>
                        <ul class="space-y-3">
                            <li><a href="/about" class="text-gray-400 hover:text-white transition-colors">عن المنصة</a></li>
                            <li><a href="/features" class="text-gray-400 hover:text-white transition-colors">المميزات</a></li>
                            <li><a href="/pricing" class="text-gray-400 hover:text-white transition-colors">الأسعار</a></li>
                            <li><a href="/tutorials" class="text-gray-400 hover:text-white transition-colors">دروس تعليمية</a></li>
                            <li><a href="/blog" class="text-gray-400 hover:text-white transition-colors">المدونة</a></li>
                        </ul>
                    </div>

                    <!-- الدعم -->
                    <div>
                        <h5 class="text-lg font-bold mb-6">الدعم والمساعدة</h5>
                        <ul class="space-y-3">
                            <li><a href="/help" class="text-gray-400 hover:text-white transition-colors">مركز المساعدة</a></li>
                            <li><a href="/contact" class="text-gray-400 hover:text-white transition-colors">تواصل معنا</a></li>
                            <li><a href="/privacy" class="text-gray-400 hover:text-white transition-colors">سياسة الخصوصية</a></li>
                            <li><a href="/terms" class="text-gray-400 hover:text-white transition-colors">شروط الاستخدام</a></li>
                            <li><a href="/faq" class="text-gray-400 hover:text-white transition-colors">الأسئلة الشائعة</a></li>
                        </ul>
                    </div>
                </div>

                <div class="border-t border-gray-800 pt-8">
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
