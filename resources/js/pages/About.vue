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

const milestones = [
    { year: '2024', title: 'تأسيس المنصة', description: 'بداية رحلة تطوير التعليم بالذكاء الاصطناعي' },
    { year: '2024', title: 'إطلاق الأدوات الأولى', description: 'مولد خطط الدروس ومولد الاختبارات' },
    { year: '2025', title: '12 أداة ذكية', description: 'إطلاق مجموعة كاملة من الأدوات التعليمية' },
    { year: '2025', title: '5000+ معلم', description: 'وصول المنصة لآلاف المعلمين في المملكة' }
];

const team = [
    {
        name: 'فريق التطوير',
        role: 'خبراء في التكنولوجيا التعليمية',
        description: 'فريق متخصص في تطوير حلول الذكاء الاصطناعي للتعليم'
    },
    {
        name: 'فريق المحتوى التعليمي',
        role: 'خبراء تربويون ومناهج',
        description: 'متخصصون في المناهج السعودية والطرق التعليمية الحديثة'
    },
    {
        name: 'فريق ضمان الجودة',
        role: 'خبراء في تقييم المحتوى',
        description: 'يضمنون جودة ودقة كل محتوى تعليمي يتم إنتاجه'
    }
];
</script>

<template>
    <div dir="rtl" class="min-h-screen bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900">
        <Head title="عن المنصة - منصة مُعين التعليمية" />
        
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
                        عن منصة مُعين التعليمية
                    </h1>
                    <p class="text-xl text-gray-600 dark:text-gray-300 max-w-4xl mx-auto leading-relaxed">
                        نحن منصة رائدة في مجال التكنولوجيا التعليمية، نهدف إلى تمكين المعلمين والمعلمات 
                        من تطوير العملية التعليمية باستخدام أحدث تقنيات الذكاء الاصطناعي
                    </p>
                </div>
            </div>
        </section>

        <!-- Vision & Mission -->
        <section class="py-16 bg-white dark:bg-gray-800">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid md:grid-cols-3 gap-8">
                    <!-- الرؤية -->
                    <div class="text-center p-8 bg-gradient-to-br from-blue-50 to-blue-100 dark:from-blue-900/20 dark:to-blue-800/20 rounded-2xl">
                        <div class="w-16 h-16 bg-blue-600 rounded-full flex items-center justify-center mx-auto mb-6">
                            <span class="text-white text-2xl">👁️</span>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">رؤيتنا</h3>
                        <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                            أن نكون المنصة الرائدة عالمياً في تطوير التعليم بالذكاء الاصطناعي، 
                            ونساهم في بناء جيل مبدع ومتميز في المملكة العربية السعودية
                        </p>
                    </div>

                    <!-- الرسالة -->
                    <div class="text-center p-8 bg-gradient-to-br from-purple-50 to-purple-100 dark:from-purple-900/20 dark:to-purple-800/20 rounded-2xl">
                        <div class="w-16 h-16 bg-purple-600 rounded-full flex items-center justify-center mx-auto mb-6">
                            <span class="text-white text-2xl">🎯</span>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">رسالتنا</h3>
                        <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                            تمكين المعلمين من إنشاء محتوى تعليمي عالي الجودة بسرعة وكفاءة، 
                            وتحسين جودة التعليم من خلال الأدوات الذكية والمبتكرة
                        </p>
                    </div>

                    <!-- القيم -->
                    <div class="text-center p-8 bg-gradient-to-br from-green-50 to-green-100 dark:from-green-900/20 dark:to-green-800/20 rounded-2xl">
                        <div class="w-16 h-16 bg-green-600 rounded-full flex items-center justify-center mx-auto mb-6">
                            <span class="text-white text-2xl">⭐</span>
                        </div>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-4">قيمنا</h3>
                        <p class="text-gray-700 dark:text-gray-300 leading-relaxed">
                            الجودة، الابتكار، الأمانة، التطوير المستمر، 
                            والالتزام بخدمة التعليم وتطوير المجتمع
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Our Story -->
        <section class="py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold text-gray-900 mb-6">قصتنا</h2>
                    <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                        بدأت رحلتنا من إيمان عميق بأن التكنولوجيا يمكنها تحويل التعليم إلى تجربة أكثر إثارة وفعالية
                    </p>
                </div>

                <div class="grid md:grid-cols-2 gap-12 items-center">
                    <div>
                        <h3 class="text-2xl font-bold text-gray-900 dark:text-white mb-6">كيف بدأنا؟</h3>
                        <div class="space-y-4 text-gray-700 dark:text-gray-300 leading-relaxed">
                            <p>
                                في عام 2024، لاحظ فريقنا التحديات التي يواجهها المعلمون في إعداد المحتوى التعليمي. 
                                كان إنشاء خطط الدروس، والاختبارات، والأنشطة يستغرق ساعات طويلة من العمل الشاق.
                            </p>
                            <p>
                                قررنا الاستفادة من قوة الذكاء الاصطناعي لحل هذه المشكلة. بدأنا بتطوير أول أداة لنا - 
                                مولد خطط الدروس - والذي حقق نجاحاً كبيراً بين المعلمين.
                            </p>
                            <p>
                                اليوم، نفخر بتقديم 12 أداة ذكية تخدم أكثر من 5000 معلم ومعلمة، 
                                وقد ساعدناهم في إنشاء أكثر من 50,000 قطعة محتوى تعليمي عالي الجودة.
                            </p>
                        </div>
                    </div>

                    <div class="bg-white dark:bg-gray-700 p-8 rounded-2xl shadow-lg">
                        <h4 class="text-xl font-bold text-gray-900 dark:text-white mb-6">الإنجازات الرئيسية</h4>
                        <div class="space-y-6">
                            <div class="flex items-center space-x-4 space-x-reverse">
                                <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900/30 rounded-full flex items-center justify-center">
                                    <span class="text-blue-600 dark:text-blue-400 font-bold">12</span>
                                </div>
                                <div>
                                    <div class="font-semibold text-gray-900 dark:text-white">أداة ذكية</div>
                                    <div class="text-sm text-gray-600 dark:text-gray-300">تغطي كامل العملية التعليمية</div>
                                </div>
                            </div>
                            
                            <div class="flex items-center space-x-4 space-x-reverse">
                                <div class="w-12 h-12 bg-green-100 dark:bg-green-900/30 rounded-full flex items-center justify-center">
                                    <span class="text-green-600 dark:text-green-400 font-bold">5K+</span>
                                </div>
                                <div>
                                    <div class="font-semibold text-gray-900 dark:text-white">معلم ومعلمة</div>
                                    <div class="text-sm text-gray-600 dark:text-gray-300">يستخدمون المنصة يومياً</div>
                                </div>
                            </div>
                            
                            <div class="flex items-center space-x-4 space-x-reverse">
                                <div class="w-12 h-12 bg-purple-100 dark:bg-purple-900/30 rounded-full flex items-center justify-center">
                                    <span class="text-purple-600 dark:text-purple-400 font-bold">50K+</span>
                                </div>
                                <div>
                                    <div class="font-semibold text-gray-900 dark:text-white">محتوى تعليمي</div>
                                    <div class="text-sm text-gray-600 dark:text-gray-300">تم إنشاؤه باستخدام المنصة</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Timeline -->
        <section class="py-16 bg-white dark:bg-gray-800">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold text-gray-900 dark:text-white mb-6">رحلة النمو</h2>
                    <p class="text-xl text-gray-600 dark:text-gray-300">المحطات المهمة في تطوير المنصة</p>
                </div>

                <div class="relative">
                    <!-- Timeline line -->
                    <div class="absolute right-1/2 transform translate-x-1/2 w-1 h-full bg-gray-200 dark:bg-gray-600"></div>
                    
                    <div class="space-y-12">
                        <div v-for="(milestone, index) in milestones" :key="index" 
                             :class="['relative flex items-center', index % 2 === 0 ? 'justify-end' : 'justify-start']">
                            
                            <!-- Timeline dot -->
                            <div class="absolute right-1/2 transform translate-x-1/2 w-4 h-4 bg-blue-600 rounded-full border-4 border-white dark:border-gray-800 shadow-lg z-10"></div>
                            
                            <!-- Content -->
                            <div :class="['w-5/12 p-6 bg-white dark:bg-gray-700 rounded-lg shadow-lg', index % 2 === 0 ? 'text-right mr-8' : 'text-left ml-8']">
                                <div class="text-2xl font-bold text-blue-600 dark:text-blue-400 mb-2">{{ milestone.year }}</div>
                                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-3">{{ milestone.title }}</h3>
                                <p class="text-gray-600 dark:text-gray-300">{{ milestone.description }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- Team -->
        <section class="py-16 bg-gray-50 dark:bg-gray-900">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-16">
                    <h2 class="text-4xl font-bold text-gray-900 dark:text-white mb-6">فريقنا</h2>
                    <p class="text-xl text-gray-600 dark:text-gray-300">خبراء متخصصون في التعليم والتكنولوجيا</p>
                </div>

                <div class="grid md:grid-cols-3 gap-8">
                    <div v-for="member in team" :key="member.name" 
                         class="bg-white dark:bg-gray-800 p-8 rounded-2xl shadow-lg text-center hover:shadow-xl transition-shadow">
                        <div class="w-20 h-20 bg-gradient-to-br from-blue-400 to-purple-600 rounded-full flex items-center justify-center mx-auto mb-6">
                            <span class="text-white text-2xl">👥</span>
                        </div>
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-2">{{ member.name }}</h3>
                        <p class="text-blue-600 dark:text-blue-400 font-semibold mb-4">{{ member.role }}</p>
                        <p class="text-gray-600 dark:text-gray-300 leading-relaxed">{{ member.description }}</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Technology -->
        <section class="py-16 bg-gradient-to-r from-blue-600 to-purple-600 text-white">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h2 class="text-4xl font-bold mb-6">التكنولوجيا المتقدمة</h2>
                <p class="text-xl mb-12 max-w-3xl mx-auto opacity-90">
                    نستخدم أحدث تقنيات الذكاء الاصطناعي من Google Gemini لضمان جودة عالية في المحتوى التعليمي
                </p>
                
                <div class="grid md:grid-cols-3 gap-8">
                    <div class="bg-white/10 backdrop-blur-sm p-6 rounded-2xl">
                        <div class="text-4xl mb-4">🤖</div>
                        <h3 class="text-xl font-bold mb-3">Google Gemini AI</h3>
                        <p class="opacity-90">أحدث نماذج الذكاء الاصطناعي لإنشاء محتوى تعليمي متميز</p>
                    </div>
                    
                    <div class="bg-white/10 backdrop-blur-sm p-6 rounded-2xl">
                        <div class="text-4xl mb-4">🔒</div>
                        <h3 class="text-xl font-bold mb-3">الأمان والخصوصية</h3>
                        <p class="opacity-90">حماية كاملة لبيانات المعلمين والمحتوى التعليمي</p>
                    </div>
                    
                    <div class="bg-white/10 backdrop-blur-sm p-6 rounded-2xl">
                        <div class="text-4xl mb-4">⚡</div>
                        <h3 class="text-xl font-bold mb-3">الأداء العالي</h3>
                        <p class="opacity-90">إنشاء المحتوى في ثوانٍ مع ضمان الجودة والدقة</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- CTA Section -->
        <section class="py-20 bg-gray-50 dark:bg-gray-800">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <h2 class="text-4xl font-bold text-gray-900 dark:text-white mb-6">انضم إلى رحلة التعليم المتطور</h2>
                <p class="text-xl text-gray-600 dark:text-gray-300 mb-8">
                    ابدأ معنا اليوم واكتشف كيف يمكن للذكاء الاصطناعي أن يحول تجربتك التعليمية
                </p>
                <div class="flex justify-center space-x-4 space-x-reverse">
                    <Link href="/register" 
                          class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-4 rounded-lg text-lg font-semibold transition-colors">
                        ابدأ الآن مجاناً
                    </Link>
                    <Link href="/features" 
                          class="bg-white dark:bg-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 text-blue-600 dark:text-blue-400 border-2 border-blue-600 dark:border-blue-400 px-8 py-4 rounded-lg text-lg font-semibold transition-colors">
                        اكتشف المميزات
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
                            منصة رائدة في تطوير التعليم بالذكاء الاصطناعي، نساعد المعلمين على إنشاء محتوى تعليمي عالي الجودة بسرعة وكفاءة.
                        </p>
                        <div class="flex space-x-4 space-x-reverse">
                            <a href="#" class="text-gray-400 hover:text-white dark:hover:text-gray-200 transition-colors">
                                <span class="sr-only">تويتر</span>
                                🐦
                            </a>
                            <a href="#" class="text-gray-400 hover:text-white dark:hover:text-gray-200 transition-colors">
                                <span class="sr-only">لينكد إن</span>
                                💼
                            </a>
                            <a href="mailto:info@mueen.io" class="text-gray-400 hover:text-white dark:hover:text-gray-200 transition-colors">
                                <span class="sr-only">البريد الإلكتروني</span>
                                📧
                            </a>
                        </div>
                    </div>

                    <!-- روابط سريعة -->
                    <div>
                        <h5 class="text-lg font-bold mb-6">روابط سريعة</h5>
                        <ul class="space-y-3">
                            <li><Link href="/" class="text-gray-400 hover:text-white dark:hover:text-gray-200 transition-colors">الرئيسية</Link></li>
                            <li><Link href="/features" class="text-gray-400 hover:text-white dark:hover:text-gray-200 transition-colors">المميزات</Link></li>
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