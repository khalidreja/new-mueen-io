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
        <Head title="شروط الاستخدام - منصة مُعين التعليمية" />
        
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
                        شروط الاستخدام
                    </h1>
                    <p class="text-xl text-gray-600 leading-relaxed mb-8">
                        شروط وأحكام استخدام منصة مُعين التعليمية
                    </p>
                    <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                        <p class="text-blue-800 text-sm">
                            آخر تحديث: 1 يناير 2025
                        </p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Terms Content -->
        <section class="py-16">
            <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="bg-white rounded-2xl shadow-lg p-8 md:p-12 space-y-12">
                    
                    <!-- مقبولية الشروط -->
                    <div>
                        <h2 class="text-3xl font-bold text-gray-900 mb-6">قبول الشروط</h2>
                        <p class="text-gray-700 leading-relaxed mb-4">
                            مرحباً بكم في منصة مُعين التعليمية. باستخدامكم لهذه المنصة، فإنكم توافقون على الالتزام بهذه الشروط والأحكام. 
                            إذا كنتم لا توافقون على أي من هذه الشروط، يرجى عدم استخدام المنصة.
                        </p>
                        <p class="text-gray-700 leading-relaxed">
                            هذه الشروط تحكم علاقتكم مع منصة مُعين التعليمية وتنطبق على جميع المستخدمين والزوار.
                        </p>
                    </div>

                    <!-- تعريفات -->
                    <div>
                        <h2 class="text-3xl font-bold text-gray-900 mb-6">التعريفات</h2>
                        <div class="space-y-4">
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <h3 class="font-semibold text-gray-900 mb-2">المنصة</h3>
                                <p class="text-gray-700 text-sm">منصة مُعين التعليمية وجميع خدماتها وأدواتها المتاحة</p>
                            </div>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <h3 class="font-semibold text-gray-900 mb-2">المستخدم</h3>
                                <p class="text-gray-700 text-sm">أي شخص يصل إلى المنصة أو يستخدمها</p>
                            </div>
                            <div class="bg-gray-50 p-4 rounded-lg">
                                <h3 class="font-semibold text-gray-900 mb-2">المحتوى</h3>
                                <p class="text-gray-700 text-sm">أي نص أو صورة أو فيديو أو مواد تعليمية متاحة على المنصة</p>
                            </div>
                        </div>
                    </div>

                    <!-- الخدمات المقدمة -->
                    <div>
                        <h2 class="text-3xl font-bold text-gray-900 mb-6">الخدمات المقدمة</h2>
                        <p class="text-gray-700 leading-relaxed mb-4">
                            توفر منصة مُعين التعليمية مجموعة من الأدوات الذكية المدعومة بالذكاء الاصطناعي لمساعدة المعلمين في:
                        </p>
                        <ul class="list-disc list-inside text-gray-700 space-y-2 mb-4">
                            <li>إنشاء خطط الدروس والمحتوى التعليمي</li>
                            <li>تطوير الاختبارات والتقييمات</li>
                            <li>إنشاء الأنشطة التعليمية التفاعلية</li>
                            <li>التواصل مع أولياء الأمور</li>
                            <li>إدارة وتنظيم المحتوى التعليمي</li>
                        </ul>
                        <p class="text-gray-700 leading-relaxed">
                            نحتفظ بالحق في تعديل أو إيقاف أي من الخدمات مؤقتاً أو دائماً دون إشعار مسبق.
                        </p>
                    </div>

                    <!-- التسجيل والحسابات -->
                    <div>
                        <h2 class="text-3xl font-bold text-gray-900 mb-6">التسجيل والحسابات</h2>
                        <div class="space-y-4 text-gray-700">
                            <p class="leading-relaxed">
                                <strong>شروط إنشاء الحساب:</strong>
                            </p>
                            <ul class="list-disc list-inside space-y-2">
                                <li>يجب أن تكونوا في سن 16 عاماً أو أكبر</li>
                                <li>تقديم معلومات صحيحة ومكتملة</li>
                                <li>المحافظة على سرية كلمة المرور</li>
                                <li>تحديث المعلومات عند الضرورة</li>
                            </ul>
                            <p class="leading-relaxed mt-4">
                                <strong>مسؤوليات المستخدم:</strong>
                                أنتم مسؤولون عن جميع الأنشطة التي تحدث تحت حسابكم وعن الحفاظ على أمان معلومات تسجيل الدخول.
                            </p>
                        </div>
                    </div>

                    <!-- الاستخدام المقبول -->
                    <div>
                        <h2 class="text-3xl font-bold text-gray-900 mb-6">سياسة الاستخدام المقبول</h2>
                        
                        <div class="mb-6">
                            <h3 class="text-xl font-semibold text-green-700 mb-3">✅ يُسمح بـ:</h3>
                            <ul class="list-disc list-inside text-gray-700 space-y-2">
                                <li>استخدام المنصة للأغراض التعليمية المشروعة</li>
                                <li>إنشاء المحتوى التعليمي والمشاركة البناءة</li>
                                <li>احترام حقوق الآخرين والملكية الفكرية</li>
                                <li>الإبلاغ عن أي مشاكل أو انتهاكات</li>
                            </ul>
                        </div>

                        <div>
                            <h3 class="text-xl font-semibold text-red-700 mb-3">❌ يُحظر:</h3>
                            <ul class="list-disc list-inside text-gray-700 space-y-2">
                                <li>استخدام المنصة لأي أنشطة غير قانونية أو ضارة</li>
                                <li>محاولة اختراق أو إتلاف النظام</li>
                                <li>نشر محتوى مسيء أو غير لائق</li>
                                <li>انتهاك حقوق الطبع والنشر أو الملكية الفكرية</li>
                                <li>إنشاء حسابات متعددة بهدف الإضرار بالخدمة</li>
                                <li>استخدام برامج آلية للوصول إلى المنصة</li>
                            </ul>
                        </div>
                    </div>

                    <!-- الملكية الفكرية -->
                    <div>
                        <h2 class="text-3xl font-bold text-gray-900 mb-6">الملكية الفكرية</h2>
                        
                        <div class="bg-blue-50 border border-blue-200 rounded-lg p-6 mb-6">
                            <h3 class="text-lg font-semibold text-blue-800 mb-2">محتوى المنصة</h3>
                            <p class="text-blue-700 text-sm">
                                جميع حقوق الملكية الفكرية للمنصة وأدواتها والتقنيات المستخدمة محفوظة لمنصة مُعين التعليمية.
                            </p>
                        </div>

                        <div class="bg-green-50 border border-green-200 rounded-lg p-6">
                            <h3 class="text-lg font-semibold text-green-800 mb-2">المحتوى المنشأ بواسطة المستخدم</h3>
                            <p class="text-green-700 text-sm mb-2">
                                تحتفظون بملكية المحتوى التعليمي الذي تنشئونه باستخدام أدوات المنصة، مع منحنا ترخيصاً لاستخدامه لتحسين خدماتنا.
                            </p>
                        </div>
                    </div>

                    <!-- الخصوصية والبيانات -->
                    <div>
                        <h2 class="text-3xl font-bold text-gray-900 mb-6">الخصوصية والبيانات</h2>
                        <p class="text-gray-700 leading-relaxed mb-4">
                            نحن ملتزمون بحماية خصوصيتكم وبياناتكم الشخصية. لمزيد من التفاصيل، يرجى مراجعة 
                            <Link href="/privacy" class="text-blue-600 hover:text-blue-700 underline">سياسة الخصوصية</Link>.
                        </p>
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <p class="text-gray-700 text-sm">
                                <strong>ملاحظة:</strong> نستخدم البيانات لتحسين الخدمة وتخصيص التجربة، ولا نشارك معلوماتكم الشخصية مع أطراف ثالثة لأغراض تجارية.
                            </p>
                        </div>
                    </div>

                    <!-- المدفوعات والاشتراكات -->
                    <div>
                        <h2 class="text-3xl font-bold text-gray-900 mb-6">المدفوعات والاشتراكات</h2>
                        <div class="space-y-4 text-gray-700">
                            <p><strong>الخطة المجانية:</strong> متاحة لجميع المستخدمين مع حدود استخدام معقولة.</p>
                            
                            <p><strong>الخطط المدفوعة:</strong> توفر مميزات إضافية واستخدام غير محدود.</p>

                            <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
                                <p class="text-yellow-800 text-sm">
                                    <strong>سياسة الاسترداد:</strong> يمكن طلب استرداد كامل خلال 30 يوماً من تاريخ الاشتراك إذا لم تكونوا راضين عن الخدمة.
                                </p>
                            </div>
                        </div>
                    </div>

                    <!-- إخلاء المسؤولية -->
                    <div>
                        <h2 class="text-3xl font-bold text-gray-900 mb-6">إخلاء المسؤولية</h2>
                        <div class="bg-orange-50 border border-orange-200 rounded-lg p-6">
                            <p class="text-orange-800 text-sm leading-relaxed">
                                المنصة مقدمة "كما هي" دون أي ضمانات صريحة أو ضمنية. لا نضمن أن الخدمة ستكون متاحة دون انقطاع أو خالية من الأخطاء. 
                                نحن غير مسؤولين عن أي أضرار مباشرة أو غير مباشرة قد تنتج عن استخدام المنصة.
                            </p>
                        </div>
                    </div>

                    <!-- تعديل الشروط -->
                    <div>
                        <h2 class="text-3xl font-bold text-gray-900 mb-6">تعديل الشروط</h2>
                        <p class="text-gray-700 leading-relaxed mb-4">
                            نحتفظ بالحق في تعديل هذه الشروط في أي وقت. سيتم إشعاركم بأي تغييرات جوهرية عبر:
                        </p>
                        <ul class="list-disc list-inside text-gray-700 space-y-2">
                            <li>إشعار في المنصة</li>
                            <li>رسالة بريد إلكتروني</li>
                            <li>تحديث تاريخ "آخر تحديث" في أعلى هذه الصفحة</li>
                        </ul>
                    </div>

                    <!-- إنهاء الخدمة -->
                    <div>
                        <h2 class="text-3xl font-bold text-gray-900 mb-6">إنهاء الخدمة</h2>
                        <div class="grid md:grid-cols-2 gap-6 text-gray-700">
                            <div>
                                <h3 class="font-semibold text-gray-900 mb-2">من طرفكم:</h3>
                                <p class="text-sm">يمكنكم إلغاء حسابكم في أي وقت من خلال إعدادات الحساب</p>
                            </div>
                            <div>
                                <h3 class="font-semibold text-gray-900 mb-2">من طرفنا:</h3>
                                <p class="text-sm">قد نوقف حسابكم في حالة انتهاك هذه الشروط</p>
                            </div>
                        </div>
                    </div>

                    <!-- القانون المطبق -->
                    <div>
                        <h2 class="text-3xl font-bold text-gray-900 mb-6">القانون المطبق</h2>
                        <p class="text-gray-700 leading-relaxed">
                            هذه الشروط محكومة بقوانين المملكة العربية السعودية. أي نزاع ينشأ عن هذه الشروط سيخضع 
                            للاختصاص الحصري للمحاكم السعودية.
                        </p>
                    </div>

                    <!-- معلومات التواصل -->
                    <div class="bg-gray-50 rounded-lg p-8">
                        <h2 class="text-3xl font-bold text-gray-900 mb-6">معلومات التواصل</h2>
                        <p class="text-gray-700 leading-relaxed mb-6">
                            لأي استفسارات حول هذه الشروط، يرجى التواصل معنا:
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
                                   <p dir="ltr">+966 500071811</p>
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
                            <li><Link href="/privacy" class="text-gray-400 hover:text-white transition-colors">سياسة الخصوصية</Link></li>
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