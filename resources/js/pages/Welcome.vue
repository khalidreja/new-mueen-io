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
        icon: '🎯',
        title: 'أدوات الذكاء الاصطناعي',
        description: '12 أداة ذكية لإنشاء المحتوى التعليمي المتميز'
    },
    {
        icon: '📚',
        title: 'إدارة خطط الدروس',
        description: 'تنظيم وحفظ خطط الدروس بطريقة احترافية'
    },
    {
        icon: '👥',
        title: 'إدارة الفصول',
        description: 'متابعة الطلاب وإدارة الأنشطة الصفية'
    },
    {
        icon: '📊',
        title: 'تقارير وإحصائيات',
        description: 'تتبع التقدم والأداء بتقارير مفصلة'
    },
    {
        icon: '💡',
        title: 'الأنشطة التفاعلية',
        description: 'أفكار مبتكرة للأنشطة التعليمية الجذابة'
    },
    {
        icon: '🎨',
        title: 'المحتوى المخصص',
        description: 'إنشاء محتوى تعليمي مناسب لكل مرحلة دراسية'
    }
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
                        مساعدك التعليمي الذكي
                        <span class="text-blue-600">بالذكاء الاصطناعي</span>
                    </h2>
                    <p class="text-xl text-gray-600 mb-8 max-w-3xl mx-auto leading-relaxed">
                        منصة تعليمية متطورة تساعد المعلمين في إنشاء المحتوى التعليمي المتميز وإدارة الفصول الدراسية باستخدام أحدث تقنيات الذكاء الاصطناعي
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

                <div class="mb-20">
                    <h3 class="text-3xl font-bold text-center text-gray-900 mb-12">
                        لماذا تختار منصة مُعين؟
                    </h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                        <div 
                            v-for="(feature, index) in features" 
                            :key="index"
                            class="bg-white rounded-xl p-6 shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2"
                        >
                            <div class="text-4xl mb-4">{{ feature.icon }}</div>
                            <h4 class="text-xl font-bold text-gray-900 mb-2">{{ feature.title }}</h4>
                            <p class="text-gray-600 leading-relaxed">{{ feature.description }}</p>
                        </div>
                    </div>
                </div>

                <div class="mb-20">
                    <h3 class="text-3xl font-bold text-center text-gray-900 mb-12">
                        أدوات الذكاء الاصطناعي المتاحة
                    </h3>
                    <div class="bg-white rounded-2xl shadow-xl p-8">
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4">
                            <div 
                                v-for="(tool, index) in tools" 
                                :key="index"
                                class="flex items-center space-x-3 space-x-reverse p-4 bg-blue-50 rounded-lg hover:bg-blue-100 transition-colors"
                            >
                                <div class="w-2 h-2 bg-blue-600 rounded-full"></div>
                                <span class="text-gray-800 font-medium">{{ tool }}</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-center bg-gradient-to-r from-blue-600 to-indigo-600 rounded-2xl p-12 text-white shadow-2xl">
                    <h3 class="text-3xl font-bold mb-4">
                        جاهز للبدء؟
                    </h3>
                    <p class="text-xl mb-8 opacity-90">
                        انضم إلى آلاف المعلمين الذين يستخدمون منصة مُعين لتطوير تجربة التعليم
                    </p>
                    <div class="flex justify-center space-x-4 space-x-reverse">
                        <Link
                            v-if="!$page.props.auth.user"
                            :href="register()"
                            class="bg-white text-blue-600 px-8 py-4 rounded-xl font-bold text-lg hover:bg-gray-100 transition-all shadow-lg transform hover:-translate-y-1"
                        >
                            إنشاء حساب مجاني
                        </Link>
                        <Link
                            v-if="!$page.props.auth.user"
                            :href="login()"
                            class="border-2 border-white text-white px-8 py-4 rounded-xl font-bold text-lg hover:bg-white hover:text-blue-600 transition-all transform hover:-translate-y-1"
                        >
                            تسجيل الدخول
                        </Link>
                    </div>
                </div>
            </div>
        </main>

        <footer class="bg-gray-900 text-white py-12 mt-20">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <div class="flex items-center justify-center space-x-4 space-x-reverse mb-6">
                    <div class="text-3xl">🎓</div>
                    <h4 class="text-2xl font-bold">منصة مُعين التعليمية</h4>
                </div>
                <p class="text-gray-400 mb-6">
                    مساعدك التعليمي الذكي - نحو تعليم أفضل بالذكاء الاصطناعي
                </p>
                <div class="text-sm text-gray-500">
                    © 2025 منصة مُعين التعليمية. جميع الحقوق محفوظة.
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
