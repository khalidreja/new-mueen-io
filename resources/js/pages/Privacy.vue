<script setup lang="ts">
import { Head, Link } from '@inertiajs/vue3';
import { ref, onMounted } from 'vue';

const isVisible = ref(false);

onMounted(() => {
    setTimeout(() => {
        isVisible.value = true;
    }, 100);
});
</script>

<template>
    <div dir="rtl" class="min-h-screen bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50">
        <Head title="سياسة الخصوصية - منصة مُعين التعليمية" />
        
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
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
                <div :class="['transition-all duration-1000', isVisible ? 'opacity-100 translate-y-0' : 'opacity-0 translate-y-10']">
                    <h1 class="text-5xl font-bold text-gray-900 mb-6" style="font-family: 'Cairo', sans-serif;">
                        سياسة الخصوصية
                    </h1>
                    <p class="text-xl text-gray-600 leading-relaxed mb-8">
                        نحن ملتزمون بحماية خصوصيتك وبياناتك الشخصية
                    </p>
                    <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                        <p class="text-blue-800 text-sm">
                            آخر تحديث: 1 يناير 2025
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Privacy Policy Content -->
        <section class="py-16">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="bg-white rounded-2xl shadow-lg p-8 md:p-12">
                    
                    <!-- مقدمة -->
                    <div class="mb-12">
                        <h2 class="text-3xl font-bold text-gray-900 mb-6">المقدمة</h2>
                        <p class="text-gray-700 leading-relaxed mb-4">
                            مرحباً بكم في منصة مُعين التعليمية. نحن نقدر ثقتكم بنا ونلتزم بحماية خصوصيتكم وأمان بياناتكم الشخصية. 
                            تشرح هذه السياسة كيفية جمعنا واستخدامنا وحمايتنا لمعلوماتكم الشخصية.
                        </p>
                        <p class="text-gray-700 leading-relaxed">
                            باستخدامكم لمنصة مُعين التعليمية، فإنكم توافقون على الممارسات الموضحة في هذه السياسة.
                        </p>
                    </div>

                    <!-- المعلومات التي نجمعها -->
                    <div class="mb-12">
                        <h2 class="text-3xl font-bold text-gray-900 mb-6">المعلومات التي نجمعها</h2>
                        
                        <h3 class="text-xl font-semibold text-gray-900 mb-4">المعلومات الشخصية</h3>
                        <ul class="list-disc list-inside text-gray-700 mb-6 space-y-2">
                            <li>الاسم الكامل وعنوان البريد الإلكتروني</li>
                            <li>معلومات المؤسسة التعليمية (اختياري)</li>
                            <li>تفضيلات الحساب والإعدادات</li>
                            <li>المحتوى التعليمي الذي تنشئونه أو تحفظونه</li>
                        </ul>

                        <h3 class="text-xl font-semibold text-gray-900 mb-4">المعلومات التقنية</h3>
                        <ul class="list-disc list-inside text-gray-700 mb-6 space-y-2">
                            <li>عنوان IP ونوع المتصفح</li>
                            <li>معلومات الجهاز ونظام التشغيل</li>
                            <li>ملفات تعريف الارتباط وتقنيات التتبع</li>
                            <li>سجلات الاستخدام والأنشطة</li>
                        </ul>
                    </div>

                    <!-- كيفية استخدام المعلومات -->
                    <div class="mb-12">
                        <h2 class="text-3xl font-bold text-gray-900 mb-6">كيفية استخدام المعلومات</h2>
                        <p class="text-gray-700 leading-relaxed mb-4">
                            نستخدم معلوماتكم للأغراض التالية:
                        </p>
                        <ul class="list-disc list-inside text-gray-700 space-y-3">
                            <li><strong>تقديم الخدمات:</strong> تشغيل المنصة وتقديم الأدوات التعليمية</li>
                            <li><strong>التخصيص:</strong> تخصيص المحتوى والتوصيات حسب احتياجاتكم</li>
                            <li><strong>التحسين:</strong> تطوير وتحسين خدماتنا وأدواتنا</li>
                            <li><strong>الدعم:</strong> تقديم الدعم الفني والرد على استفساراتكم</li>
                            <li><strong>التواصل:</strong> إرسال التحديثات والإشعارات المهمة</li>
                            <li><strong>الأمان:</strong> حماية المنصة ومنع الاستخدام غير المشروع</li>
                        </ul>
                    </div>

                    <!-- مشاركة المعلومات -->
                    <div class="mb-12">
                        <h2 class="text-3xl font-bold text-gray-900 mb-6">مشاركة المعلومات</h2>
                        <div class="bg-green-50 border border-green-200 rounded-lg p-6 mb-6">
                            <h3 class="text-lg font-semibold text-green-800 mb-2">التزامنا</h3>
                            <p class="text-green-700">
                                نحن لا نبيع أو نؤجر أو نتاجر بمعلوماتكم الشخصية مع أطراف ثالثة لأغراض تجارية.
                            </p>
                        </div>
                        
                        <p class="text-gray-700 leading-relaxed mb-4">
                            قد نشارك معلوماتكم في الحالات المحدودة التالية:
                        </p>
                        <ul class="list-disc list-inside text-gray-700 space-y-2">
                            <li>مع مقدمي الخدمات الموثوقين الذين يساعدوننا في تشغيل المنصة</li>
                            <li>عند الحاجة للامتثال للقوانين أو الأوامر القضائية</li>
                            <li>لحماية حقوقنا وحقوق مستخدمينا وأمانهم</li>
                            <li>في حالة دمج أو بيع الشركة (مع إشعار مسبق)</li>
                        </ul>
                    </div>

                    <!-- أمان البيانات -->
                    <div class="mb-12">
                        <h2 class="text-3xl font-bold text-gray-900 mb-6">أمان البيانات</h2>
                        <p class="text-gray-700 leading-relaxed mb-4">
                            نطبق أقوى معايير الأمان لحماية بياناتكم:
                        </p>
                        
                        <div class="grid md:grid-cols-2 gap-6">
                            <div class="bg-blue-50 p-6 rounded-lg">
                                <h3 class="text-lg font-semibold text-blue-800 mb-3">🔒 التشفير</h3>
                                <p class="text-blue-700 text-sm">
                                    جميع البيانات مشفرة أثناء النقل والتخزين باستخدام تشفير SSL/TLS
                                </p>
                            </div>
                            
                            <div class="bg-purple-50 p-6 rounded-lg">
                                <h3 class="text-lg font-semibold text-purple-800 mb-3">🛡️ الحماية</h3>
                                <p class="text-purple-700 text-sm">
                                    أنظمة حماية متقدمة ضد الاختراق والوصول غير المصرح به
                                </p>
                            </div>
                            
                            <div class="bg-green-50 p-6 rounded-lg">
                                <h3 class="text-lg font-semibold text-green-800 mb-3">💾 النسخ الاحتياطي</h3>
                                <p class="text-green-700 text-sm">
                                    نسخ احتياطية منتظمة ومؤمنة لضمان عدم فقدان بياناتكم
                                </p>
                            </div>
                            
                            <div class="bg-orange-50 p-6 rounded-lg">
                                <h3 class="text-lg font-semibold text-orange-800 mb-3">👥 التحكم بالوصول</h3>
                                <p class="text-orange-700 text-sm">
                                    وصول محدود ومراقب للموظفين المخولين فقط
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- حقوقكم -->
                    <div class="mb-12">
                        <h2 class="text-3xl font-bold text-gray-900 mb-6">حقوقكم</h2>
                        <p class="text-gray-700 leading-relaxed mb-4">
                            لديكم الحق في:
                        </p>
                        <div class="space-y-4">
                            <div class="flex items-start space-x-3 space-x-reverse">
                                <span class="text-blue-600 text-xl mt-1">✓</span>
                                <div>
                                    <h3 class="font-semibold text-gray-900">الوصول</h3>
                                    <p class="text-gray-700 text-sm">طلب نسخة من بياناتكم الشخصية</p>
                                </div>
                            </div>
                            <div class="flex items-start space-x-3 space-x-reverse">
                                <span class="text-blue-600 text-xl mt-1">✓</span>
                                <div>
                                    <h3 class="font-semibold text-gray-900">التصحيح</h3>
                                    <p class="text-gray-700 text-sm">تحديث أو تصحيح البيانات غير الدقيقة</p>
                                </div>
                            </div>
                            <div class="flex items-start space-x-3 space-x-reverse">
                                <span class="text-blue-600 text-xl mt-1">✓</span>
                                <div>
                                    <h3 class="font-semibold text-gray-900">الحذف</h3>
                                    <p class="text-gray-700 text-sm">طلب حذف بياناتكم في ظروف معينة</p>
                                </div>
                            </div>
                            <div class="flex items-start space-x-3 space-x-reverse">
                                <span class="text-blue-600 text-xl mt-1">✓</span>
                                <div>
                                    <h3 class="font-semibold text-gray-900">النقل</h3>
                                    <p class="text-gray-700 text-sm">الحصول على بياناتكم بتنسيق قابل للنقل</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- ملفات تعريف الارتباط -->
                    <div class="mb-12">
                        <h2 class="text-3xl font-bold text-gray-900 mb-6">ملفات تعريف الارتباط</h2>
                        <p class="text-gray-700 leading-relaxed mb-4">
                            نستخدم ملفات تعريف الارتباط (Cookies) لتحسين تجربتكم:
                        </p>
                        <ul class="list-disc list-inside text-gray-700 space-y-2">
                            <li><strong>الضرورية:</strong> مطلوبة لتشغيل المنصة الأساسي</li>
                            <li><strong>الوظيفية:</strong> تذكر تفضيلاتكم وإعداداتكم</li>
                            <li><strong>التحليلية:</strong> تساعدنا في فهم كيفية استخدام المنصة</li>
                            <li><strong>التسويقية:</strong> لتقديم محتوى مخصص ومناسب</li>
                        </ul>
                    </div>

                    <!-- تغييرات السياسة -->
                    <div class="mb-12">
                        <h2 class="text-3xl font-bold text-gray-900 mb-6">تغييرات السياسة</h2>
                        <p class="text-gray-700 leading-relaxed mb-4">
                            قد نحدث هذه السياسة من وقت لآخر. سنقوم بإشعاركم بأي تغييرات جوهرية عبر:
                        </p>
                        <ul class="list-disc list-inside text-gray-700 space-y-2">
                            <li>إشعار في المنصة</li>
                            <li>رسالة بريد إلكتروني</li>
                            <li>تحديث تاريخ "آخر تحديث" في أعلى هذه الصفحة</li>
                        </ul>
                    </div>

                    <!-- التواصل -->
                    <div class="bg-gray-50 rounded-lg p-8">
                        <h2 class="text-3xl font-bold text-gray-900 mb-6">تواصل معنا</h2>
                        <p class="text-gray-700 leading-relaxed mb-6">
                            إذا كانت لديكم أسئلة حول سياسة الخصوصية أو تريدون ممارسة حقوقكم، يمكنكم التواصل معنا:
                        </p>
                        
                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <h3 class="font-semibold text-gray-900 mb-2">📧 البريد الإلكتروني</h3>
                                <a href="mailto:Admin@mueen.io" class="text-blue-600 hover:text-blue-700">
                                    Admin@mueen.io
                                </a>
                            </div>
                            
                            <div>
                                <h3 class="font-semibold text-gray-900 mb-2">📞 الهاتف</h3>
                                <a href="tel:+966500071811" class="text-blue-600 hover:text-blue-700">
                                    <p dir="ltr">+966 50 007 1811</p>
                                </a>
                            </div>
                        </div>
                        
                        <div class="mt-6">
                            <Link href="/contact" 
                                  class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-3 rounded-lg font-semibold transition-colors inline-block">
                                تواصل معنا
                            </Link>
                        </div>
                    </div>
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
                            <li><Link href="/contact" class="text-gray-400 hover:text-white transition-colors">تواصل معنا</Link></li>
                        </ul>
                    </div>
                    <div>
                        <h5 class="text-lg font-bold mb-6">الدعم</h5>
                        <ul class="space-y-3">
                            <li><Link href="/help" class="text-gray-400 hover:text-white transition-colors">مركز المساعدة</Link></li>
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