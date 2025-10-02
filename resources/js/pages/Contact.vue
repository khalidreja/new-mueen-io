<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import { ref, reactive } from 'vue';
import AppearanceTabs from '@/components/AppearanceTabs.vue';

const form = reactive({
    name: '',
    email: '',
    subject: '',
    message: '',
    type: 'general'
});

const isSubmitting = ref(false);
const isSubmitted = ref(false);

const contactTypes = [
    { id: 'general', name: 'استفسار عام', icon: '💬' },
    { id: 'technical', name: 'دعم فني', icon: '🔧' },
    { id: 'billing', name: 'فوترة واشتراكات', icon: '💳' },
    { id: 'feedback', name: 'اقتراح أو ملاحظة', icon: '💡' },
    { id: 'partnership', name: 'شراكة أو تعاون', icon: '🤝' }
];

const contactInfo = [
    {
        title: 'البريد الإلكتروني',
        value: 'admin@mueen.io',
        icon: '📧',
        link: 'mailto:admin@mueen.io'
    },
    {
        title: 'الهاتف',
        value: '+966 50 007 1811',
        icon: '📞',
        link: 'tel:+966500071811'
    },
    {
        title: 'العنوان',
        value: 'الخبر، المملكة العربية السعودية',
        icon: '📍',
        link: null
    },
    {
        title: 'ساعات العمل',
        value: 'الأحد - الخميس: 9:00 - 17:00',
        icon: '🕒',
        link: null
    }
];

const submitForm = async () => {
    isSubmitting.value = true;
    
    // محاكاة إرسال النموذج
    setTimeout(() => {
        isSubmitting.value = false;
        isSubmitted.value = true;
        
        // إعادة تعيين النموذج
        Object.keys(form).forEach(key => {
            if (key === 'type') {
                form[key] = 'general';
            } else {
                form[key] = '';
            }
        });
        
        // إخفاء رسالة النجاح بعد 5 ثوان
        setTimeout(() => {
            isSubmitted.value = false;
        }, 5000);
    }, 2000);
};
</script>

<template>
    <div dir="rtl" class="min-h-screen bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 dark:from-gray-900 dark:via-gray-800 dark:to-gray-900">
        <Head title="تواصل معنا - منصة مُعين التعليمية" />
        
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
                <h1 class="text-5xl font-bold text-gray-900 dark:text-white mb-6" style="font-family: 'Cairo', sans-serif;">
                    تواصل معنا
                </h1>
                <p class="text-xl text-gray-600 dark:text-gray-300 max-w-4xl mx-auto leading-relaxed">
                    نحن هنا لمساعدتك! تواصل معنا وسنكون سعداء للإجابة على استفساراتك ومساعدتك في تحقيق أهدافك التعليمية
                </p>
            </div>
        </section>

        <!-- Contact Form & Info -->
        <section class="py-16">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid lg:grid-cols-2 gap-12">
                    <!-- Contact Form -->
                    <div class="bg-white dark:bg-gray-800 p-8 rounded-2xl shadow-lg">
                        <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-6">أرسل لنارسالة</h2>
                        
                        <!-- Success Message -->
                        <div v-if="isSubmitted" class="mb-6 p-4 bg-green-50 border border-green-200 rounded-lg">
                            <div class="flex items-center space-x-2 space-x-reverse">
                                <span class="text-green-600 text-xl">✅</span>
                                <div>
                                    <h3 class="text-green-800 font-semibold">تم إرسال رسالتك بنجاح!</h3>
                                    <p class="text-green-600 text-sm">سنتواصل معك في أقرب وقت ممكن.</p>
                                </div>
                            </div>
                        </div>

                        <form @submit.prevent="submitForm" class="space-y-6">
                            <!-- Contact Type -->
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-3">نوع الاستفسار</label>
                                <div class="grid grid-cols-2 md:grid-cols-3 gap-3">
                                    <label v-for="type in contactTypes" :key="type.id" 
                                           :class="[
                                               'flex items-center space-x-2 space-x-reverse p-3 rounded-lg border-2 cursor-pointer transition-all',
                                               form.type === type.id 
                                                   ? 'border-blue-500 bg-blue-50 text-blue-700' 
                                                   : 'border-gray-200 hover:border-gray-300'
                                           ]">
                                        <input v-model="form.type" :value="type.id" type="radio" class="sr-only">
                                        <span class="text-lg">{{ type.icon }}</span>
                                        <span class="text-sm font-medium">{{ type.name }}</span>
                                    </label>
                                </div>
                            </div>

                            <div class="grid md:grid-cols-2 gap-6">
                                <!-- Name -->
                                <div>
                                    <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">الاسم الكامل</label>
                                    <input v-model="form.name" type="text" id="name" required
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                </div>

                                <!-- Email -->
                                <div>
                                    <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">البريد الإلكتروني</label>
                                    <input v-model="form.email" type="email" id="email" required
                                           class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                                </div>
                            </div>

                            <!-- Subject -->
                            <div>
                                <label for="subject" class="block text-sm font-semibold text-gray-700 mb-2">موضوع الرسالة</label>
                                <input v-model="form.subject" type="text" id="subject" required
                                       class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            </div>

                            <!-- Message -->
                            <div>
                                <label for="message" class="block text-sm font-semibold text-gray-700 mb-2">الرسالة</label>
                                <textarea v-model="form.message" id="message" rows="6" required
                                          class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent resize-none"
                                          placeholder="اكتب رسالتك هنا..."></textarea>
                            </div>

                            <!-- Submit Button -->
                            <button type="submit" :disabled="isSubmitting"
                                    :class="[
                                        'w-full py-4 px-6 rounded-lg font-semibold text-lg transition-all duration-300',
                                        isSubmitting 
                                            ? 'bg-gray-400 cursor-not-allowed' 
                                            : 'bg-blue-600 hover:bg-blue-700 text-white shadow-lg hover:shadow-xl'
                                    ]">
                                <span v-if="isSubmitting" class="flex items-center justify-center space-x-2 space-x-reverse">
                                    <div class="animate-spin rounded-full h-5 w-5 border-b-2 border-white"></div>
                                    <span>جاري الإرسال...</span>
                                </span>
                                <span v-else>إرسال الرسالة</span>
                            </button>
                        </form>
                    </div>

                    <!-- Contact Information -->
                    <div class="space-y-8">
                        <div class="bg-white dark:bg-gray-800 p-8 rounded-2xl shadow-lg">
                            <h2 class="text-3xl font-bold text-gray-900 dark:text-white mb-6">معلومات التواصل</h2>
                            
                            <div class="space-y-6">
                                <div v-for="info in contactInfo" :key="info.title" 
                                     class="flex items-start space-x-4 space-x-reverse">
                                    <div class="w-12 h-12 bg-blue-100 rounded-lg flex items-center justify-center flex-shrink-0">
                                        <span class="text-xl">{{ info.icon }}</span>
                                    </div>
                                    <div>
                                        <h3 class="font-semibold text-gray-900 mb-1">{{ info.title }}</h3>
                                        <a v-if="info.link" :href="info.link" 
                                           class="text-blue-600 hover:text-blue-700 transition-colors">
                                            {{ info.value }}
                                        </a>
                                        <p v-else class="text-gray-600">{{ info.value }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Quick Support -->
                        <div class="bg-gradient-to-br from-blue-500 to-purple-600 p-8 rounded-2xl text-white">
                            <h3 class="text-2xl font-bold mb-4">هل تحتاج مساعدة فورية؟</h3>
                            <p class="text-blue-100 mb-6">
                                تصفح مركز المساعدة أو راجع الأسئلة الشائعة للحصول على إجابات سريعة
                            </p>
                            <div class="flex flex-col sm:flex-row gap-3">
                                <Link href="/help" 
                                      class="bg-white text-blue-600 hover:bg-gray-100 px-6 py-3 rounded-lg font-semibold transition-colors text-center">
                                    مركز المساعدة
                                </Link>
                                <Link href="/faq" 
                                      class="border-2 border-white hover:bg-white hover:text-blue-600 px-6 py-3 rounded-lg font-semibold transition-colors text-center">
                                    الأسئلة الشائعة
                                </Link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- FAQ Preview -->
        <section class="py-16 bg-white dark:bg-gray-800">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center mb-12">
                    <h2 class="text-4xl font-bold text-gray-900 dark:text-white mb-6">أسئلة شائعة</h2>
                    <p class="text-xl text-gray-600 dark:text-gray-300">ربما تجد إجابة سؤالك هنا</p>
                </div>

                <div class="grid md:grid-cols-2 gap-8 max-w-4xl mx-auto">
                    <div v-for="faq in [
                        { q: 'كيف يمكنني إنشاء حساب جديد؟', a: 'يمكنك إنشاء حساب جديد بالنقر على زر إنشاء حساب في أعلى الصفحة.' },
                        { q: 'هل المنصة مجانية؟', a: 'نعم، نقدم خطة مجانية مع إمكانية الترقية للحصول على مميزات إضافية.' },
                        { q: 'كيف أستخدم مولد خطط الدروس؟', a: 'بعد تسجيل الدخول، انتقل إلى أدوات المحتوى واختر مولد خطط الدروس.' },
                        { q: 'هل يدعم المحتوى المناهج السعودية؟', a: 'نعم، المنصة مصممة خصيصاً لدعم المناهج السعودية والعربية.' }
                    ]" :key="faq.q" 
                         class="bg-gray-50 p-6 rounded-xl">
                        <h3 class="font-bold text-gray-900 mb-3">{{ faq.q }}</h3>
                        <p class="text-gray-600 text-sm">{{ faq.a }}</p>
                    </div>
                </div>

                <div class="text-center mt-8">
                    <Link href="/faq" 
                          class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-lg font-semibold transition-colors">
                        عرض جميع الأسئلة
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
                        <p class="text-gray-400 mb-6 leading-relaxed">
                            منصة رائدة في تطوير التعليم بالذكاء الاصطناعي، نساعد المعلمين على إنشاء محتوى تعليمي عالي الجودة.
                        </p>
                    </div>

                    <div>
                        <h5 class="text-lg font-bold mb-6">روابط سريعة</h5>
                        <ul class="space-y-3">
                            <li><Link href="/" class="text-gray-400 hover:text-white transition-colors">الرئيسية</Link></li>
                            <li><Link href="/about" class="text-gray-400 hover:text-white transition-colors">عن المنصة</Link></li>
                            <li><Link href="/features" class="text-gray-400 hover:text-white transition-colors">المميزات</Link></li>
                            <li><Link href="/blog" class="text-gray-400 hover:text-white transition-colors">المدونة</Link></li>
                        </ul>
                    </div>

                    <div>
                        <h5 class="text-lg font-bold mb-6">الدعم والمساعدة</h5>
                        <ul class="space-y-3">
                            <li><Link href="/help" class="text-gray-400 hover:text-white transition-colors">مركز المساعدة</Link></li>
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