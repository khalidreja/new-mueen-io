<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>منصة مُعين التعليمية - لوحة التحكم</title>
    <!-- تضمين مكتبة Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    <!-- دعم الخطوط العربية -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;700&display=swap" rel="stylesheet">
    <!-- مكتبة الأيقونات Phosphor Icons -->
    <script src="https://unpkg.com/@phosphor-icons/web"></script>
    <style>
        body {
            font-family: 'Cairo', sans-serif;
            background-color: #f7fafc;
        }
        .card-hover-effect {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .card-hover-effect:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05);
        }
        .hidden { display: none; }
        .prose { line-height: 1.75; }
        .prose strong { font-weight: 700; }
        .prose h4 { font-size: 1.1em; font-weight: bold; margin-top: 1rem; margin-bottom: 0.5rem; }
        #wheel-canvas { cursor: pointer; transition: transform 0.3s ease; }
        #wheel-canvas:hover { transform: scale(1.02); }
        .modal-overlay { transition: opacity 0.3s ease; }
        .modal-content { transition: transform 0.3s ease, opacity 0.3s ease; }
        .toast-notification {
            transition: opacity 0.5s, transform 0.5s;
        }
        .accordion-content {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease-in-out;
        }
    </style>
</head>
<body class="bg-gray-100">

    <div class="flex h-screen">
        <!-- الشريط الجانبي -->
        <aside class="w-64 bg-gray-900 text-white flex-col shadow-lg hidden md:flex">
            <div class="p-6 text-center border-b border-gray-700">
                <h1 class="text-2xl font-bold text-white">منصة مُعين</h1>
                <p class="text-sm text-gray-400 mt-1">مساعدك التعليمي الذكي</p>
            </div>
            <nav id="sidebar-nav" class="flex-1 px-4 py-6 space-y-2">
                <a href="#" data-target="dashboard-view" class="flex items-center px-4 py-2.5 bg-blue-600 rounded-lg font-bold shadow-md transition duration-200">
                    <i class="ph-house-line text-xl ml-3"></i> <span>لوحة التحكم</span>
                </a>
                 <a href="#" data-target="performance-review-view" class="flex items-center px-4 py-2.5 text-gray-300 hover:bg-gray-700 hover:text-white rounded-lg transition duration-200">
                   <i class="ph-star text-xl ml-3"></i> <span>ملف الإنجاز المهني</span>
                </a>
                <a href="#" data-target="parent-communication-view" class="flex items-center px-4 py-2.5 text-gray-300 hover:bg-gray-700 hover:text-white rounded-lg transition duration-200">
                   <i class="ph-chats-circle text-xl ml-3"></i> <span>رسائل أولياء الأمور</span>
                </a>
                <a href="#" data-target="lesson-planner-view" class="flex items-center px-4 py-2.5 text-gray-300 hover:bg-gray-700 hover:text-white rounded-lg transition duration-200">
                    <i class="ph-note-pencil text-xl ml-3"></i> <span>مولد خطط الدروس</span>
                </a>
                 <a href="#" data-target="objectives-generator-view" class="flex items-center px-4 py-2.5 text-gray-300 hover:bg-gray-700 hover:text-white rounded-lg transition duration-200">
                    <i class="ph-target text-xl ml-3"></i> <span>مولد الأهداف التعليمية</span>
                </a>
                <a href="#" data-target="concept-simplifier-view" class="flex items-center px-4 py-2.5 text-gray-300 hover:bg-gray-700 hover:text-white rounded-lg transition duration-200">
                   <i class="ph-atom text-xl ml-3"></i> <span>مبسّط المفاهيم</span>
                </a>
                <a href="#" data-target="activity-generator-view" class="flex items-center px-4 py-2.5 text-gray-300 hover:bg-gray-700 hover:text-white rounded-lg transition duration-200">
                    <i class="ph-lightbulb text-xl ml-3"></i> <span>مولد الأنشطة</span>
                </a>
                <a href="#" data-target="strategy-generator-view" class="flex items-center px-4 py-2.5 text-gray-300 hover:bg-gray-700 hover:text-white rounded-lg transition duration-200">
                   <i class="ph-path text-xl ml-3"></i> <span>مقترح الاستراتيجيات</span>
                </a>
                <a href="#" data-target="quiz-generator-view" class="flex items-center px-4 py-2.5 text-gray-300 hover:bg-gray-700 hover:text-white rounded-lg transition duration-200">
                   <i class="ph-exam text-xl ml-3"></i> <span>مولد الاختبارات</span>
                </a>
                 <a href="#" data-target="rubric-generator-view" class="flex items-center px-4 py-2.5 text-gray-300 hover:bg-gray-700 hover:text-white rounded-lg transition duration-200">
                   <i class="ph-scales text-xl ml-3"></i> <span>مولد معايير التقييم</span>
                </a>
                <a href="#" data-target="story-generator-view" class="flex items-center px-4 py-2.5 text-gray-300 hover:bg-gray-700 hover:text-white rounded-lg transition duration-200">
                   <i class="ph-book-open text-xl ml-3"></i> <span>مولد القصص التعليمية</span>
                </a>
                 <a href="#" data-target="report-card-generator-view" class="flex items-center px-4 py-2.5 text-gray-300 hover:bg-gray-700 hover:text-white rounded-lg transition duration-200">
                   <i class="ph-identification-card text-xl ml-3"></i> <span>مولد ملاحظات السجلات</span>
                </a>
                <a href="#" data-target="wheel-view" class="flex items-center px-4 py-2.5 text-gray-300 hover:bg-gray-700 hover:text-white rounded-lg transition duration-200">
                    <i class="ph-circle-dashed text-xl ml-3"></i> <span>عجلة الاختيار الذكية</span>
                </a>
            </nav>
            <div id="user-profile-button" data-target="profile-view" class="p-4 border-t border-gray-700 hover:bg-gray-700 cursor-pointer transition-colors">
                <div class="flex items-center">
                    <img id="sidebar-user-image" class="w-10 h-10 rounded-full object-cover" src="https://placehold.co/100x100/7E22CE/FFFFFF?text=خ" alt="صورة المستخدم">
                    <div class="mr-3">
                        <p id="sidebar-user-name" class="font-semibold text-white">أ. خالد الغامدي</p>
                        <a href="#" class="text-xs text-red-400 hover:underline">تسجيل الخروج</a>
                    </div>
                </div>
            </div>
        </aside>

        <!-- المحتوى الرئيسي -->
        <main class="flex-1 p-8 overflow-y-auto">
            
            <!-- 1. لوحة التحكم (الرئيسية) -->
            <div id="dashboard-view">
                <header class="mb-8">
                    <h2 class="text-3xl font-bold text-gray-800">أهلاً بك في لوحة التحكم</h2>
                    <p class="text-gray-600 mt-1">اختر إحدى أدوات الذكاء الاصطناعي للبدء في رحلتك الإبداعية.</p>
                </header>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <div data-target="performance-review-view" class="bg-white rounded-xl shadow-md p-6 card-hover-effect flex flex-col cursor-pointer"><div class="text-5xl mb-4">⭐</div><h3 class="text-xl font-bold text-gray-900 mb-2">ملف الإنجاز المهني</h3><p class="text-gray-600 mb-4 flex-grow">حوّل عناصر تقييم الأداء إلى ملف إنجاز تفاعلي.</p><button class="w-full mt-auto bg-amber-500 text-white py-2.5 rounded-lg font-semibold pointer-events-none">ابدأ الآن &larr;</button></div>
                    <div data-target="parent-communication-view" class="bg-white rounded-xl shadow-md p-6 card-hover-effect flex flex-col cursor-pointer"><div class="text-5xl mb-4">💬</div><h3 class="text-xl font-bold text-gray-900 mb-2">مساعد رسائل أولياء الأمور</h3><p class="text-gray-600 mb-4 flex-grow">أنشئ رسائل احترافية ومخصصة لأولياء الأمور.</p><button class="w-full mt-auto bg-cyan-600 text-white py-2.5 rounded-lg font-semibold pointer-events-none">ابدأ الآن &larr;</button></div>
                    <div data-target="lesson-planner-view" class="bg-white rounded-xl shadow-md p-6 card-hover-effect flex flex-col cursor-pointer"><div class="text-5xl mb-4">📝</div><h3 class="text-xl font-bold text-gray-900 mb-2">توليد خطط الدروس</h3><p class="text-gray-600 mb-4 flex-grow">أنشئ خطط دروس متكاملة ومفصلة في ثوانٍ.</p><button class="w-full mt-auto bg-blue-600 text-white py-2.5 rounded-lg font-semibold pointer-events-none">ابدأ الآن &larr;</button></div>
                    <div data-target="objectives-generator-view" class="bg-white rounded-xl shadow-md p-6 card-hover-effect flex flex-col cursor-pointer"><div class="text-5xl mb-4">🎯</div><h3 class="text-xl font-bold text-gray-900 mb-2">مولد الأهداف التعليمية</h3><p class="text-gray-600 mb-4 flex-grow">احصل على أهداف تعليمية مصاغة باحترافية.</p><button class="w-full mt-auto bg-purple-600 text-white py-2.5 rounded-lg font-semibold pointer-events-none">جرّب الآن &larr;</button></div>
                    <div data-target="concept-simplifier-view" class="bg-white rounded-xl shadow-md p-6 card-hover-effect flex flex-col cursor-pointer"><div class="text-5xl mb-4">⚛️</div><h3 class="text-xl font-bold text-gray-900 mb-2">مبسّط المفاهيم</h3><p class="text-gray-600 mb-4 flex-grow">حوّل المواضيع المعقدة إلى شروحات بسيطة.</p><button class="w-full mt-auto bg-green-600 text-white py-2.5 rounded-lg font-semibold pointer-events-none">بسّط الآن &larr;</button></div>
                    <div data-target="activity-generator-view" class="bg-white rounded-xl shadow-md p-6 card-hover-effect flex flex-col cursor-pointer"><div class="text-5xl mb-4">💡</div><h3 class="text-xl font-bold text-gray-900 mb-2">توليد أفكار للأنشطة</h3><p class="text-gray-600 mb-4 flex-grow">احصل على أفكار لأنشطة صفية تفاعلية.</p><button class="w-full mt-auto bg-blue-600 text-white py-2.5 rounded-lg font-semibold pointer-events-none">استكشف &larr;</button></div>
                    <div data-target="strategy-generator-view" class="bg-white rounded-xl shadow-md p-6 card-hover-effect flex flex-col cursor-pointer"><div class="text-5xl mb-4">📊</div><h3 class="text-xl font-bold text-gray-900 mb-2">مقترح الاستراتيجيات</h3><p class="text-gray-600 mb-4 flex-grow">احصل على استشارات تربوية لأفضل طرق التدريس.</p><button class="w-full mt-auto bg-indigo-600 text-white py-2.5 rounded-lg font-semibold pointer-events-none">اكتشف الآن &larr;</button></div>
                    <div data-target="quiz-generator-view" class="bg-white rounded-xl shadow-md p-6 card-hover-effect flex flex-col cursor-pointer"><div class="text-5xl mb-4">✍️</div><h3 class="text-xl font-bold text-gray-900 mb-2">مولد الاختبارات</h3><p class="text-gray-600 mb-4 flex-grow">أنشئ اختبارات قصيرة ومتنوعة مع مفتاح للإجابات.</p><button class="w-full mt-auto bg-pink-600 text-white py-2.5 rounded-lg font-semibold pointer-events-none">أنشئ اختبار &larr;</button></div>
                    <div data-target="rubric-generator-view" class="bg-white rounded-xl shadow-md p-6 card-hover-effect flex flex-col cursor-pointer"><div class="text-5xl mb-4">⚖️</div><h3 class="text-xl font-bold text-gray-900 mb-2">مولد معايير التقييم</h3><p class="text-gray-600 mb-4 flex-grow">أنشئ معايير تقييم (Rubrics) مفصلة للمشاريع والواجبات.</p><button class="w-full mt-auto bg-gray-700 text-white py-2.5 rounded-lg font-semibold pointer-events-none">أنشئ الآن &larr;</button></div>
                    <div data-target="story-generator-view" class="bg-white rounded-xl shadow-md p-6 card-hover-effect flex flex-col cursor-pointer"><div class="text-5xl mb-4">📖</div><h3 class="text-xl font-bold text-gray-900 mb-2">مولد القصص التعليمية</h3><p class="text-gray-600 mb-4 flex-grow">أنشئ قصصًا قصيرة وجذابة لطلابك حول أي موضوع.</p><button class="w-full mt-auto bg-orange-500 text-white py-2.5 rounded-lg font-semibold pointer-events-none">اكتب قصة &larr;</button></div>
                    <div data-target="report-card-generator-view" class="bg-white rounded-xl shadow-md p-6 card-hover-effect flex flex-col cursor-pointer"><div class="text-5xl mb-4">📇</div><h3 class="text-xl font-bold text-gray-900 mb-2">مولد ملاحظات السجلات</h3><p class="text-gray-600 mb-4 flex-grow">أنشئ ملاحظات دقيقة واحترافية لسجلات الطلاب وتقاريرهم.</p><button class="w-full mt-auto bg-rose-500 text-white py-2.5 rounded-lg font-semibold pointer-events-none">أنشئ الآن &larr;</button></div>
                    <div data-target="wheel-view" class="bg-white rounded-xl shadow-md p-6 card-hover-effect flex flex-col cursor-pointer"><div class="text-5xl mb-4">🎡</div><h3 class="text-xl font-bold text-gray-900 mb-2">عجلة الاختيار الذكية</h3><p class="text-gray-600 mb-4 flex-grow">أداة ممتعة للاختيار العشوائي مدعومة بالذكاء الاصطناعي.</p><button class="w-full mt-auto bg-teal-500 text-white py-2.5 rounded-lg font-semibold pointer-events-none">شغّل العجلة &larr;</button></div>
                </div>
            </div>

            <!-- 2. ملف الإنجاز المهني -->
            <div id="performance-review-view" class="hidden">
                 <header class="mb-8"><h2 class="text-3xl font-bold text-gray-800">⭐ ملف الإنجاز المهني (تقييم الأداء الوظيفي)</h2><p class="text-gray-600 mt-1">استعرض عناصر التقييم، واطلع على الشواهد المطلوبة، واستعن بالذكاء الاصطناعي لإعدادها.</p></header>
                 <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <!-- Accordion Column -->
                    <div class="lg:col-span-1 bg-white p-6 rounded-xl shadow-md">
                        <h3 class="text-xl font-bold text-gray-800 mb-4">عناصر التقييم</h3>
                        <div id="accordion-container" class="space-y-2">
                           <!-- سيتم إضافة العناصر هنا بواسطة الجافاسكريبت -->
                        </div>
                    </div>
                    <!-- AI Assistant Column -->
                    <div class="lg:col-span-2 bg-white p-6 rounded-xl shadow-md">
                        <h3 class="text-xl font-bold text-gray-800 mb-4 flex items-center"><i class="ph-robot text-2xl ml-2 text-amber-500"></i>المساعد الذكي لإعداد الشواهد</h3>
                        <form id="evidence-generator-form" class="space-y-4">
                            <div>
                               <label for="evidence-request" class="block text-sm font-medium text-gray-700 mb-1">اكتب طلبك هنا</label>
                               <textarea id="evidence-request" rows="3" class="w-full p-2.5 border border-gray-300 rounded-lg" placeholder="مثال: أُريد نموذج تقرير لدرس تطبيقي في مادة العلوم للصف الخامس عن دورة الماء."></textarea>
                            </div>
                            <button type="submit" class="w-full bg-amber-500 text-white py-3 rounded-lg font-semibold hover:bg-amber-600 transition-colors shadow-sm">✨ أنشئ لي النموذج</button>
                        </form>
                        <div class="mt-6 border-t pt-4">
                            <h4 class="text-lg font-semibold text-gray-800 mb-2">النموذج المقترح:</h4>
                            <div id="evidence-loading" class="hidden text-center"><div class="animate-spin rounded-full h-12 w-12 border-b-2 border-amber-500 mx-auto"></div><p class="mt-4 text-gray-600">جاري إعداد النموذج المطلوب...</p></div>
                            <div id="evidence-result" class="prose max-w-none text-gray-700 bg-gray-50 p-4 rounded-md border"><p class="text-gray-500">ستظهر نتيجة طلبك هنا.</p></div>
                        </div>
                    </div>
                 </div>
            </div>
            
            <!-- 3. رسائل أولياء الأمور -->
            <div id="parent-communication-view" class="hidden">
                <header class="mb-8"><h2 class="text-3xl font-bold text-gray-800">💬 مساعد رسائل أولياء الأمور</h2><p class="text-gray-600 mt-1">حوّل ملاحظاتك إلى رسائل واضحة واحترافية.</p></header>
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <div class="lg:col-span-1 bg-white p-6 rounded-xl shadow-md">
                        <form id="parent-communication-form" class="space-y-5">
                            <div><label for="pc-student-name" class="block text-sm font-medium text-gray-700 mb-1">اسم الطالب</label><input type="text" id="pc-student-name" placeholder="مثال: محمد الأحمدي" required class="w-full p-2.5 border border-gray-300 rounded-lg"></div>
                            <div><label for="pc-points" class="block text-sm font-medium text-gray-700 mb-1">النقاط الرئيسية</label><textarea id="pc-points" placeholder="مثال: تحسن مستواه في القراءة..." required rows="5" class="w-full p-2.5 border border-gray-300 rounded-lg"></textarea></div>
                            <div><label for="pc-tone" class="block text-sm font-medium text-gray-700 mb-1">نبرة الرسالة</label><select id="pc-tone" class="w-full p-2.5 border border-gray-300 rounded-lg"><option value="إيجابية ومشجعة">إيجابية ومشجعة</option><option value="رسمية وإعلامية">رسمية وإعلامية</option><option value="قلقة وتحتاج لمتابعة">قلقة وتحتاج لمتابعة</option></select></div>
                            <button type="submit" class="w-full bg-cyan-600 text-white py-3 rounded-lg font-semibold hover:bg-cyan-700">✨ أنشئ مسودة الرسالة</button>
                        </form>
                    </div>
                    <div class="lg:col-span-2 bg-white p-6 rounded-xl shadow-md">
                        <div class="flex justify-between items-center mb-4">
                             <h3 class="text-xl font-bold text-gray-800">مسودة الرسالة المقترحة</h3>
                             <button id="pc-copy-btn" class="bg-gray-200 text-gray-700 py-2 px-4 rounded-lg font-semibold hover:bg-gray-300 flex items-center hidden"><i class="ph-copy text-lg ml-2"></i><span>نسخ</span></button>
                        </div>
                        <div id="pc-loading" class="hidden text-center"><div class="animate-spin rounded-full h-12 w-12 border-b-2 border-cyan-600 mx-auto"></div><p class="mt-4 text-gray-600">يقوم الذكاء الاصطناعي بصياغة الرسالة...</p></div>
                        <div id="pc-result" class="prose max-w-none text-gray-700 bg-gray-50 p-4 rounded-md border"><p class="text-gray-500">ستظهر هنا مسودة الرسالة لولي الأمر.</p></div>
                    </div>
                </div>
            </div>

            <!-- 4. Lesson Planner -->
            <div id="lesson-planner-view" class="hidden">
                <header class="mb-8"><h2 class="text-3xl font-bold text-gray-800">📝 مولد خطط الدروس</h2><p class="text-gray-600 mt-1">أدخل تفاصيل الدرس ليقوم الذكاء الاصطناعي بإنشاء خطة متكاملة لك.</p></header>
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <div class="lg:col-span-1 bg-white p-6 rounded-xl shadow-md"><form id="lesson-planner-form" class="space-y-5">
                        <div><label for="lp-subject" class="block text-sm font-medium text-gray-700 mb-1">المادة</label><input type="text" id="lp-subject" placeholder="مثال: العلوم" required class="w-full p-2.5 border border-gray-300 rounded-lg"></div>
                        <div><label for="lp-grade" class="block text-sm font-medium text-gray-700 mb-1">المرحلة</label><input type="text" id="lp-grade" placeholder="مثال: الصف الأول متوسط" required class="w-full p-2.5 border border-gray-300 rounded-lg"></div>
                        <div><label for="lp-topic" class="block text-sm font-medium text-gray-700 mb-1">الموضوع</label><textarea id="lp-topic" placeholder="مثال: الخلية النباتية والحيوانية" required rows="3" class="w-full p-2.5 border border-gray-300 rounded-lg"></textarea></div>
                        <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700 transition-colors shadow-sm">✨ ولّد الخطة الآن</button>
                    </form></div>
                    <div class="lg:col-span-2 bg-white p-6 rounded-xl shadow-md"><h3 class="text-xl font-bold text-gray-800 mb-4">الخطة المُولّدة</h3><div id="lp-loading" class="hidden text-center"><div class="animate-spin rounded-full h-12 w-12 border-b-2 border-blue-600 mx-auto"></div><p class="mt-4 text-gray-600">يقوم الذكاء الاصطناعي بإعداد الخطة...</p></div><div id="lp-result" class="prose max-w-none text-gray-700"><p class="text-gray-500">ستظهر نتيجة الخطة الدراسية هنا.</p></div></div>
                </div>
            </div>
             <div id="objectives-generator-view" class="hidden">
                <header class="mb-8"><h2 class="text-3xl font-bold text-gray-800">🎯 مولد الأهداف التعليمية</h2><p class="text-gray-600 mt-1">حوّل موضوع الدرس إلى أهداف سلوكية قابلة للقياس.</p></header>
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <div class="lg:col-span-1 bg-white p-6 rounded-xl shadow-md"><form id="objectives-generator-form" class="space-y-5">
                        <div><label for="og-topic" class="block text-sm font-medium text-gray-700 mb-1">موضوع الدرس الأساسي</label><textarea id="og-topic" placeholder="مثال: دورة الماء في الطبيعة" required rows="3" class="w-full p-2.5 border border-gray-300 rounded-lg"></textarea></div>
                        <div><label for="og-level" class="block text-sm font-medium text-gray-700 mb-1">المستوى المعرفي (بلوم)</label><select id="og-level" class="w-full p-2.5 border border-gray-300 rounded-lg"><option value="التذكر">التذكر</option><option value="الفهم">الفهم</option><option value="التطبيق">التطبيق</option><option value="التحليل">التحليل</option><option value="التركيب">التركيب</option><option value="التقويم">التقويم</option></select></div>
                        <button type="submit" class="w-full bg-purple-600 text-white py-3 rounded-lg font-semibold hover:bg-purple-700 transition-colors shadow-sm">✨ ولّد الأهداف</button>
                    </form></div>
                    <div class="lg:col-span-2 bg-white p-6 rounded-xl shadow-md"><h3 class="text-xl font-bold text-gray-800 mb-4">الأهداف المقترحة</h3><div id="og-loading" class="hidden text-center"><div class="animate-spin rounded-full h-12 w-12 border-b-2 border-purple-600 mx-auto"></div><p class="mt-4 text-gray-600">...جاري صياغة الأهداف</p></div><div id="og-result" class="prose max-w-none text-gray-700"><p class="text-gray-500">ستظهر الأهداف التعليمية هنا.</p></div></div>
                </div>
            </div>
             <div id="concept-simplifier-view" class="hidden">
                <header class="mb-8"><h2 class="text-3xl font-bold text-gray-800">⚛️ مبسّط المفاهيم المعقدة</h2><p class="text-gray-600 mt-1">حوّل أي موضوع صعب إلى شرح مبسط وجذاب لطلابك.</p></header>
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <div class="lg:col-span-1 bg-white p-6 rounded-xl shadow-md">
                        <form id="concept-simplifier-form" class="space-y-5">
                            <div><label for="cs-concept" class="block text-sm font-medium text-gray-700 mb-1">المفهوم أو الموضوع</label><textarea id="cs-concept" placeholder="مثال: نظرية النسبية، التمثيل الضوئي" required rows="4" class="w-full p-2.5 border border-gray-300 rounded-lg"></textarea></div>
                            <div><label for="cs-grade" class="block text-sm font-medium text-gray-700 mb-1">المرحلة الدراسية</label><input type="text" id="cs-grade" placeholder="مثال: الصف السادس الابتدائي" required class="w-full p-2.5 border border-gray-300 rounded-lg"></div>
                            <div><label for="cs-method" class="block text-sm font-medium text-gray-700 mb-1">أسلوب الشرح</label><select id="cs-method" class="w-full p-2.5 border border-gray-300 rounded-lg"><option value="استخدام تشبيه">استخدام تشبيه</option><option value="شرح خطوة بخطوة">شرح خطوة بخطوة</option><option value="قصة قصيرة">قصة قصيرة</option></select></div>
                            <button type="submit" class="w-full bg-green-600 text-white py-3 rounded-lg font-semibold hover:bg-green-700">✨ بسّط لي المفهوم</button>
                        </form>
                    </div>
                    <div class="lg:col-span-2 bg-white p-6 rounded-xl shadow-md">
                        <h3 class="text-xl font-bold text-gray-800 mb-4">الشرح المبسّط</h3>
                        <div id="cs-loading" class="hidden text-center"><div class="animate-spin rounded-full h-12 w-12 border-b-2 border-green-600 mx-auto"></div><p class="mt-4 text-gray-600">يعمل الذكاء الاصطناعي على تبسيط المفهوم...</p></div>
                        <div id="cs-result" class="prose max-w-none text-gray-700"><p class="text-gray-500">سيظهر هنا الشرح المبسط.</p></div>
                    </div>
                </div>
            </div>
             <div id="activity-generator-view" class="hidden">
                 <header class="mb-8"><h2 class="text-3xl font-bold text-gray-800">💡 مولد أفكار الأنشطة</h2><p class="text-gray-600 mt-1">احصل على أفكار مبتكرة لأنشطة صفية وغير صفية.</p></header>
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <div class="lg:col-span-1 bg-white p-6 rounded-xl shadow-md"><form id="activity-generator-form" class="space-y-5">
                        <div><label for="ag-topic" class="block text-sm font-medium text-gray-700 mb-1">موضوع الدرس</label><input type="text" id="ag-topic" placeholder="مثال: المجموعة الشمسية" required class="w-full p-2.5 border border-gray-300 rounded-lg"></div>
                        <div><label for="ag-type" class="block text-sm font-medium text-gray-700 mb-1">نوع النشاط</label><select id="ag-type" class="w-full p-2.5 border border-gray-300 rounded-lg"><option value="نشاط فردي">فردي</option><option value="نشاط جماعي">جماعي</option><option value="واجب منزلي">واجب منزلي</option></select></div>
                        <button type="submit" class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700">✨ اقترح لي نشاطًا</button>
                    </form></div>
                    <div class="lg:col-span-2 bg-white p-6 rounded-xl shadow-md"><h3 class="text-xl font-bold text-gray-800 mb-4">الأنشطة المقترحة</h3><div id="ag-loading" class="hidden text-center"><div class="animate-spin rounded-full h-12 w-12 border-b-2 border-blue-600 mx-auto"></div><p class="mt-4 text-gray-600">...جاري البحث عن أفكار إبداعية</p></div><div id="ag-result" class="prose max-w-none text-gray-700"><p class="text-gray-500">ستظهر الأنشطة المقترحة هنا.</p></div></div>
                </div>
            </div>
             <div id="strategy-generator-view" class="hidden">
                <header class="mb-8"><h2 class="text-3xl font-bold text-gray-800">📊 مقترح الاستراتيجيات</h2><p class="text-gray-600 mt-1">احصل على استشارات تربوية مخصصة لدرسك.</p></header>
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <div class="lg:col-span-1 bg-white p-6 rounded-xl shadow-md"><form id="strategy-generator-form" class="space-y-5">
                        <div><label for="sg-subject" class="block text-sm font-medium text-gray-700 mb-1">المادة</label><input type="text" id="sg-subject" placeholder="مثال: تاريخ" required class="w-full p-2.5 border border-gray-300 rounded-lg"></div>
                        <div><label for="sg-grade" class="block text-sm font-medium text-gray-700 mb-1">المرحلة الدراسية</label><input type="text" id="sg-grade" placeholder="مثال: المرحلة الثانوية" required class="w-full p-2.5 border border-gray-300 rounded-lg"></div>
                        <div><label for="sg-topic" class="block text-sm font-medium text-gray-700 mb-1">موضوع الدرس</label><textarea id="sg-topic" placeholder="مثال: توحيد المملكة" required rows="3" class="w-full p-2.5 border border-gray-300 rounded-lg"></textarea></div>
                        <button type="submit" class="w-full bg-indigo-600 text-white py-3 rounded-lg font-semibold hover:bg-indigo-700">✨ اقترح الاستراتيجيات</button>
                    </form></div>
                    <div class="lg:col-span-2 bg-white p-6 rounded-xl shadow-md"><h3 class="text-xl font-bold text-gray-800 mb-4">الاستراتيجيات المقترحة</h3><div id="sg-loading" class="hidden text-center"><div class="animate-spin rounded-full h-12 w-12 border-b-2 border-indigo-600 mx-auto"></div><p class="mt-4 text-gray-600">يقوم الخبير التربوي بتحليل طلبك...</p></div><div id="sg-result" class="prose max-w-none text-gray-700"><p class="text-gray-500">ستظهر هنا أفضل الاستراتيجيات.</p></div></div>
                </div>
            </div>
             <div id="quiz-generator-view" class="hidden">
                <header class="mb-8"><h2 class="text-3xl font-bold text-gray-800">✍️ مولد الاختبارات</h2><p class="text-gray-600 mt-1">أنشئ اختبارات قصيرة مخصصة لطلابك في دقائق.</p></header>
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <div class="lg:col-span-1 bg-white p-6 rounded-xl shadow-md"><form id="quiz-generator-form" class="space-y-5">
                        <div><label for="qg-topic" class="block text-sm font-medium text-gray-700 mb-1">موضوع الاختبار</label><input type="text" id="qg-topic" placeholder="مثال: الأمن السيبراني" required class="w-full p-2.5 border border-gray-300 rounded-lg"></div>
                        <div><label for="qg-grade" class="block text-sm font-medium text-gray-700 mb-1">المرحلة الدراسية</label><input type="text" id="qg-grade" placeholder="مثال: السنة الجامعية الأولى" required class="w-full p-2.5 border border-gray-300 rounded-lg"></div>
                        <div><label for="qg-num-questions" class="block text-sm font-medium text-gray-700 mb-1">عدد الأسئلة</label><input type="number" id="qg-num-questions" min="1" max="15" value="5" required class="w-full p-2.5 border border-gray-300 rounded-lg"></div>
                        <div><label class="block text-sm font-medium text-gray-700 mb-2">أنواع الأسئلة</label><div class="space-y-2"><div class="flex items-center"><input id="qg-type-mcq" type="checkbox" checked class="h-4 w-4 rounded border-gray-300 text-pink-600"><label for="qg-type-mcq" class="mr-2">اختيار من متعدد</label></div><div class="flex items-center"><input id="qg-type-tf" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-pink-600"><label for="qg-type-tf" class="mr-2">صح وخطأ</label></div><div class="flex items-center"><input id="qg-type-sa" type="checkbox" class="h-4 w-4 rounded border-gray-300 text-pink-600"><label for="qg-type-sa" class="mr-2">سؤال قصير</label></div></div></div>
                        <button type="submit" class="w-full bg-pink-600 text-white py-3 rounded-lg font-semibold hover:bg-pink-700">✨ ولّد الاختبار</button>
                    </form></div>
                    <div class="lg:col-span-2 bg-white p-6 rounded-xl shadow-md"><h3 class="text-xl font-bold text-gray-800 mb-4">الاختبار المُولّد</h3><div id="qg-loading" class="hidden text-center"><div class="animate-spin rounded-full h-12 w-12 border-b-2 border-pink-600 mx-auto"></div><p class="mt-4 text-gray-600">يتم الآن وضع الأسئلة...</p></div><div id="qg-result" class="prose max-w-none text-gray-700"><p class="text-gray-500">سيظهر الاختبار هنا مع مفتاح الإجابات.</p></div></div>
                </div>
            </div>
            
            <div id="wheel-view" class="hidden">
                <header class="mb-8"><h2 class="text-3xl font-bold text-gray-800">🎡 عجلة الاختيار الذكية</h2><p class="text-gray-600 mt-1">أداة ممتعة للاختيار العشوائي مدعومة بالذكاء الاصطناعي.</p></header>
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <div class="lg:col-span-1 bg-white p-6 rounded-xl shadow-md space-y-4">
                        <h3 class="text-xl font-bold text-gray-800">إعدادات العجلة</h3>
                        <div class="flex items-center"><input type="checkbox" id="remove-winner-checkbox" class="h-4 w-4 rounded border-gray-300 text-blue-600"><label for="remove-winner-checkbox" class="mr-2">حذف الاسم بعد الاختيار</label></div>
                        <div><label for="wheel-topic" class="block text-sm font-medium">موضوع الدرس (للسؤال)</label><input type="text" id="wheel-topic" placeholder="مثال: أجزاء النبات" class="w-full p-2.5 border border-gray-300 rounded-lg"></div>
                        
                        <!-- Fetch from Class -->
                        <div class="border-t pt-4 space-y-2">
                            <label for="wheel-class-selector" class="block text-sm font-medium text-gray-800">1. جلب الطلاب من فصل:</label>
                            <select id="wheel-class-selector" class="w-full p-2.5 border border-gray-300 rounded-lg bg-white"></select>
                            <button type="button" id="wheel-fetch-students-btn" class="w-full bg-blue-500 text-white py-2 rounded-lg font-semibold hover:bg-blue-600">جلب القائمة</button>
                        </div>
            
                        <!-- AI Generation -->
                        <div class="border-t pt-4 space-y-2">
                            <label for="wheel-ai-prompt" class="block text-sm font-medium text-gray-800">2. أو دع الذكاء الاصطناعي يولد القائمة:</label>
                            <input type="text" id="wheel-ai-prompt" placeholder="مثال: 8 أسماء أولاد وبنات" class="w-full p-2.5 border border-gray-300 rounded-lg">
                            <button type="button" id="wheel-ai-generate-btn" class="w-full bg-teal-500 text-white py-2.5 rounded-lg font-semibold hover:bg-teal-600">ولّد بالـ AI</button>
                        </div>
            
                        <!-- Manual Entry -->
                        <div class="border-t pt-4">
                            <label for="wheel-items" class="block text-sm font-medium text-gray-800 mb-2">3. قائمة الأسماء (يمكن تعديلها يدوياً):</label>
                            <textarea id="wheel-items" rows="6" placeholder="محمد\nفاطمة" class="w-full p-2.5 border border-gray-300 rounded-lg"></textarea>
                        </div>
                    </div>
                    <div class="lg:col-span-2 bg-white p-6 rounded-xl shadow-md flex flex-col items-center justify-center relative"><div class="absolute top-4 right-4 text-xl font-bold transform -rotate-45">⬇️</div><canvas id="wheel-canvas" width="400" height="400"></canvas><button id="spin-btn" class="w-1/2 bg-red-500 text-white py-3 mt-4 rounded-full font-bold text-xl hover:bg-red-600 shadow-lg">أدر العجلة!</button>
                        <div id="wheel-result-container" class="mt-4 text-center hidden"><h3 class="text-2xl font-bold">الفائز: <span id="wheel-result-text" class="text-blue-600"></span></h3><button id="ai-question-btn" class="mt-2 bg-purple-600 text-white py-2 px-4 rounded-lg font-semibold hover:bg-purple-700">✨ اقترح سؤالاً للفائز</button></div>
                    </div>
                </div>
            </div>
            
            <div id="rubric-generator-view" class="hidden">
                <header class="mb-8">
                    <h2 class="text-3xl font-bold text-gray-800">⚖️ مولد معايير التقييم (Rubric)</h2>
                    <p class="text-gray-600 mt-1">صمم أدوات تقييم عادلة وواضحة لطلابك بسهولة.</p>
                </header>
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <div class="lg:col-span-1 bg-white p-6 rounded-xl shadow-md">
                        <form id="rubric-generator-form" class="space-y-5">
                            <div>
                                <label for="rg-title" class="block text-sm font-medium text-gray-700 mb-1">عنوان الواجب</label>
                                <input type="text" id="rg-title" placeholder="مثال: بحث عن المجموعة الشمسية" required class="w-full p-2.5 border border-gray-300 rounded-lg">
                            </div>
                            <div>
                                <label for="rg-grade" class="block text-sm font-medium text-gray-700 mb-1">المرحلة الدراسية</label>
                                <input type="text" id="rg-grade" placeholder="مثال: الصف الخامس الابتدائي" required class="w-full p-2.5 border border-gray-300 rounded-lg">
                            </div>
                            <div>
                                <label for="rg-description" class="block text-sm font-medium text-gray-700 mb-1">وصف موجز للواجب</label>
                                <textarea id="rg-description" placeholder="اذكر هنا ما هو متوقع من الطالب..." required rows="4" class="w-full p-2.5 border border-gray-300 rounded-lg"></textarea>
                            </div>
                             <div>
                                <label for="rg-levels" class="block text-sm font-medium text-gray-700 mb-1">عدد مستويات الأداء</label>
                                <input type="number" id="rg-levels" min="2" max="5" value="4" required class="w-full p-2.5 border border-gray-300 rounded-lg">
                            </div>
                            <div>
                                <label for="rg-criteria" class="block text-sm font-medium text-gray-700 mb-1">معايير التقييم (اختياري)</label>
                                <textarea id="rg-criteria" placeholder="مثال: المحتوى العلمي، التنظيم... (افصل بينها بفاصلة)" rows="3" class="w-full p-2.5 border border-gray-300 rounded-lg"></textarea>
                            </div>
                            <button type="submit" class="w-full bg-gray-700 text-white py-3 rounded-lg font-semibold hover:bg-gray-800">✨ ولّد معيار التقييم</button>
                        </form>
                    </div>
                    <div class="lg:col-span-2 bg-white p-6 rounded-xl shadow-md">
                        <h3 class="text-xl font-bold text-gray-800 mb-4">معيار التقييم المقترح</h3>
                        <div id="rg-loading" class="hidden text-center">
                            <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-gray-700 mx-auto"></div>
                            <p class="mt-4 text-gray-600">يقوم خبير التقييم بإعداد المعيار...</p>
                        </div>
                        <div id="rg-result" class="prose max-w-none text-gray-700">
                            <p class="text-gray-500">سيظهر هنا معيار التقييم المفصل.</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div id="story-generator-view" class="hidden">
                <header class="mb-8">
                    <h2 class="text-3xl font-bold text-gray-800">📖 مولد القصص التعليمية</h2>
                    <p class="text-gray-600 mt-1">أطلق العنان للإبداع وألهم طلابك بقصص فريدة من نوعها.</p>
                </header>
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <div class="lg:col-span-1 bg-white p-6 rounded-xl shadow-md">
                        <form id="story-generator-form" class="space-y-5">
                            <div>
                                <label for="story-topic" class="block text-sm font-medium text-gray-700 mb-1">موضوع القصة</label>
                                <input type="text" id="story-topic" placeholder="مثال: أهمية الصداقة" required class="w-full p-2.5 border border-gray-300 rounded-lg">
                            </div>
                            <div>
                                <label for="story-grade" class="block text-sm font-medium text-gray-700 mb-1">المرحلة العمرية</label>
                                <input type="text" id="story-grade" placeholder="مثال: الأطفال من 5-7 سنوات" required class="w-full p-2.5 border border-gray-300 rounded-lg">
                            </div>
                            <div>
                                <label for="story-characters" class="block text-sm font-medium text-gray-700 mb-1">الشخصيات (اختياري)</label>
                                <input type="text" id="story-characters" placeholder="مثال: أرنب سريع وسلحفاة حكيمة" class="w-full p-2.5 border border-gray-300 rounded-lg">
                            </div>
                            <div>
                                <label for="story-moral" class="block text-sm font-medium text-gray-700 mb-1">الدرس الأخلاقي (اختياري)</label>
                                <input type="text" id="story-moral" placeholder="مثال: العبرة ليست بالسرعة بل بالمثابرة" class="w-full p-2.5 border border-gray-300 rounded-lg">
                            </div>
                            <button type="submit" class="w-full bg-orange-500 text-white py-3 rounded-lg font-semibold hover:bg-orange-600">✨ ولّد القصة</button>
                        </form>
                    </div>
                    <div class="lg:col-span-2 bg-white p-6 rounded-xl shadow-md">
                        <h3 class="text-xl font-bold text-gray-800 mb-4">القصة المُولّدة</h3>
                        <div id="story-loading" class="hidden text-center">
                            <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-orange-500 mx-auto"></div>
                            <p class="mt-4 text-gray-600">يقوم الراوي بتأليف القصة...</p>
                        </div>
                        <div id="story-result" class="prose max-w-none text-gray-700">
                            <p class="text-gray-500">ستظهر هنا القصة التعليمية لطلابك.</p>
                        </div>
                    </div>
                </div>
            </div>

             <div id="report-card-generator-view" class="hidden">
                <header class="mb-8">
                    <h2 class="text-3xl font-bold text-gray-800">📇 مولد ملاحظات سجلات الطلاب</h2>
                    <p class="text-gray-600 mt-1">حوّل نقاط القوة والضعف إلى ملاحظات بناءة واحترافية.</p>
                </header>
                <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                    <div class="lg:col-span-1 bg-white p-6 rounded-xl shadow-md">
                        <form id="report-card-generator-form" class="space-y-5">
                            <div>
                                <label for="rcg-student-name" class="block text-sm font-medium text-gray-700 mb-1">اسم الطالب</label>
                                <input type="text" id="rcg-student-name" placeholder="مثال: سارة العتيبي" required class="w-full p-2.5 border border-gray-300 rounded-lg">
                            </div>
                             <div>
                                <label for="rcg-subject" class="block text-sm font-medium text-gray-700 mb-1">المادة الدراسية</label>
                                <input type="text" id="rcg-subject" placeholder="مثال: الرياضيات" required class="w-full p-2.5 border border-gray-300 rounded-lg">
                            </div>
                            <div>
                                <label for="rcg-strengths" class="block text-sm font-medium text-gray-700 mb-1">أبرز نقاط القوة</label>
                                <textarea id="rcg-strengths" placeholder="مثال: مشاركتها فعالة، فهمها للمفاهيم سريع..." required rows="4" class="w-full p-2.5 border border-gray-300 rounded-lg"></textarea>
                            </div>
                            <div>
                                <label for="rcg-improvements" class="block text-sm font-medium text-gray-700 mb-1">الجوانب التي تحتاج لتطوير</label>
                                <textarea id="rcg-improvements" placeholder="مثال: تحتاج للتركيز على حل الواجبات بانتظام..." required rows="4" class="w-full p-2.5 border border-gray-300 rounded-lg"></textarea>
                            </div>
                            <div>
                                <label for="rcg-tone" class="block text-sm font-medium text-gray-700 mb-1">نبرة الملاحظة</label>
                                <select id="rcg-tone" class="w-full p-2.5 border border-gray-300 rounded-lg">
                                    <option value="مشجعة وإيجابية">مشجعة وإيجابية</option>
                                    <option value="رسمية ومباشرة">رسمية ومباشرة</option>
                                    <option value="تحفيزية مع لمسة قلق">تحفيزية مع لمسة قلق</option>
                                </select>
                            </div>
                            <button type="submit" class="w-full bg-rose-500 text-white py-3 rounded-lg font-semibold hover:bg-rose-600">✨ ولّد الملاحظة</button>
                        </form>
                    </div>
                    <div class="lg:col-span-2 bg-white p-6 rounded-xl shadow-md">
                        <h3 class="text-xl font-bold text-gray-800 mb-4">الملاحظة المقترحة</h3>
                        <div id="rcg-loading" class="hidden text-center">
                            <div class="animate-spin rounded-full h-12 w-12 border-b-2 border-rose-500 mx-auto"></div>
                            <p class="mt-4 text-gray-600">يقوم الخبير التربوي بصياغة الملاحظة...</p>
                        </div>
                        <div id="rcg-result" class="prose max-w-none text-gray-700">
                            <p class="text-gray-500">ستظهر هنا الملاحظة المقترحة لسجل الطالب.</p>
                        </div>
                    </div>
                </div>
            </div>

            <div id="profile-view" class="hidden">
                <header class="mb-8"><h2 class="text-3xl font-bold text-gray-800">👤 الملف الشخصي وإدارة الفصول</h2><p class="text-gray-600 mt-1">قم بتحديث بياناتك الشخصية وإدارة فصولك الدراسية من هنا.</p></header>
                <div class="max-w-4xl mx-auto bg-white p-8 rounded-xl shadow-md">
                    <!-- Tabs Navigation -->
                    <div class="border-b border-gray-200">
                        <nav id="profile-tabs" class="-mb-px flex space-x-6 space-x-reverse" aria-label="Tabs">
                            <button data-tab-target="personal-info-panel" class="profile-tab whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm text-blue-600 border-blue-600">البيانات الشخصية</button>
                            <button data-tab-target="class-a-panel" class="profile-tab whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm text-gray-500 border-transparent hover:text-gray-700 hover:border-gray-300">فصل 1/أ (الرياضيات)</button>
                            <button data-tab-target="class-b-panel" class="profile-tab whitespace-nowrap py-4 px-1 border-b-2 font-medium text-sm text-gray-500 border-transparent hover:text-gray-700 hover:border-gray-300">فصل 2/ج (العلوم)</button>
                        </nav>
                    </div>
                    <!-- Tabs Content -->
                    <div id="profile-tabs-content" class="mt-6">
                        <div id="personal-info-panel" class="profile-tab-panel">
                             <form id="profile-form" class="space-y-6">
                                <div class="text-center">
                                    <img id="profile-preview-image" class="w-24 h-24 rounded-full object-cover mx-auto mb-4" src="https://placehold.co/100x100/7E22CE/FFFFFF?text=خ" alt="صورة المستخدم">
                                    <label for="profile-image-upload" class="inline-block bg-white py-2 px-4 border rounded-lg shadow-sm text-sm font-medium cursor-pointer hover:bg-gray-50"><i class="ph-upload-simple text-lg ml-1"></i><span>تغيير الصورة</span></label>
                                    <input type="file" id="profile-image-upload" class="hidden" accept="image/png, image/jpeg"><p class="text-xs text-gray-500 mt-2">مسموح بالصور JPG, PNG</p>
                                </div>
                                <div><label for="profile-name" class="block text-sm font-medium text-gray-700 mb-1">الاسم الكامل</label><input type="text" id="profile-name" value="أ. خالد الغامدي" required class="w-full p-2.5 border rounded-lg"></div>
                                <div class="grid md:grid-cols-2 gap-6">
                                    <div><label for="profile-email" class="block text-sm font-medium mb-1">البريد الإلكتروني</label><input type="email" id="profile-email" value="k.alghamdi@email.com" disabled class="w-full p-2.5 border rounded-lg bg-gray-100"></div>
                                    <div><label for="profile-phone" class="block text-sm font-medium mb-1">رقم الجوال</label><input type="tel" id="profile-phone" value="0501234567" disabled class="w-full p-2.5 border rounded-lg bg-gray-100 text-left" dir="ltr"></div>
                                </div>
                                <div class="grid md:grid-cols-2 gap-6">
                                     <div><label for="profile-city" class="block text-sm font-medium mb-1">المدينة</label><input type="text" id="profile-city" placeholder="مثال: الرياض" class="w-full p-2.5 border rounded-lg"></div>
                                     <div><label for="profile-stage" class="block text-sm font-medium mb-1">المرحلة الدراسية</label><input type="text" id="profile-stage" placeholder="مثال: المرحلة الثانوية" class="w-full p-2.5 border rounded-lg"></div>
                                </div>
                                 <div><label for="profile-subjects" class="block text-sm font-medium mb-1">المواد</label><input type="text" id="profile-subjects" placeholder="مثال: الرياضيات، الفيزياء" class="w-full p-2.5 border rounded-lg"></div>
                                 <div><label for="profile-school" class="block text-sm font-medium mb-1">المدرسة</label><input type="text" id="profile-school" placeholder="مثال: مدرسة الملك فهد الثانوية" class="w-full p-2.5 border rounded-lg"></div>
                                <div class="border-t pt-6"><button type="submit" class="w-full bg-blue-600 text-white py-3 rounded-lg font-semibold hover:bg-blue-700 flex items-center justify-center"><i class="ph-floppy-disk text-xl ml-2"></i><span>حفظ التغييرات</span></button></div>
                            </form>
                        </div>
                        <div id="class-a-panel" class="profile-tab-panel hidden">
                           <div class="grid md:grid-cols-2 gap-8">
                                <div class="bg-gray-50 p-6 rounded-lg border">
                                    <h4 class="text-lg font-semibold mb-4">إضافة طلاب جدد</h4>
                                    <div class="mb-4"><label for="class-a-manual-add" class="block text-sm font-medium mb-1">إضافة يدوية</label><textarea data-class-id="class-a" id="class-a-manual-add" rows="5" class="w-full p-2 border rounded-lg manual-add-textarea" placeholder="أدخل اسم كل طالب في سطر..."></textarea><button data-class-id="class-a" class="w-full mt-2 bg-blue-500 text-white py-2 rounded-lg font-semibold hover:bg-blue-600 add-manual-btn">إضافة القائمة</button></div>
                                    <div class="relative my-6"><div class="absolute inset-0 flex items-center"><span class="w-full border-t"></span></div><div class="relative flex justify-center text-sm"><span class="px-2 bg-gray-50 text-gray-500">أو</span></div></div>
                                    <div><label for="class-a-file-upload-input" class="block text-sm font-medium mb-2">رفع من ملف</label><label for="class-a-file-upload-input" class="w-full flex items-center justify-center px-4 py-2 bg-white text-blue-500 border border-blue-500 rounded-lg cursor-pointer hover:bg-blue-50"><i class="ph-file-text text-xl ml-2"></i><span>اختر ملف (.txt)</span></label><input type="file" data-class-id="class-a" id="class-a-file-upload-input" class="hidden file-upload-input" accept=".txt"><p data-class-id="class-a" class="text-xs text-gray-500 mt-2 text-center file-name-display"></p></div>
                                </div>
                                <div class="bg-white p-6 rounded-lg border">
                                     <div class="flex justify-between items-center mb-4"><h4 class="text-lg font-semibold">قائمة الطلاب</h4><span data-class-id="class-a" class="text-sm font-medium bg-gray-100 px-3 py-1 rounded-full student-count">0 طالب</span></div>
                                     <div data-class-id="class-a" class="space-y-2 max-h-72 overflow-y-auto pr-2 student-list-container"><p class="text-gray-500 text-center mt-8">لا يوجد طلاب في هذا الفصل.</p></div>
                                </div>
                            </div>
                        </div>
                        <div id="class-b-panel" class="profile-tab-panel hidden">
                           <div class="grid md:grid-cols-2 gap-8">
                                <div class="bg-gray-50 p-6 rounded-lg border">
                                    <h4 class="text-lg font-semibold mb-4">إضافة طلاب جدد</h4>
                                    <div class="mb-4"><label for="class-b-manual-add" class="block text-sm font-medium mb-1">إضافة يدوية</label><textarea data-class-id="class-b" id="class-b-manual-add" rows="5" class="w-full p-2 border rounded-lg manual-add-textarea" placeholder="أدخل اسم كل طالب في سطر..."></textarea><button data-class-id="class-b" class="w-full mt-2 bg-blue-500 text-white py-2 rounded-lg font-semibold hover:bg-blue-600 add-manual-btn">إضافة القائمة</button></div>
                                    <div class="relative my-6"><div class="absolute inset-0 flex items-center"><span class="w-full border-t"></span></div><div class="relative flex justify-center text-sm"><span class="px-2 bg-gray-50 text-gray-500">أو</span></div></div>
                                    <div><label for="class-b-file-upload-input" class="block text-sm font-medium mb-2">رفع من ملف</label><label for="class-b-file-upload-input" class="w-full flex items-center justify-center px-4 py-2 bg-white text-blue-500 border border-blue-500 rounded-lg cursor-pointer hover:bg-blue-50"><i class="ph-file-text text-xl ml-2"></i><span>اختر ملف (.txt)</span></label><input type="file" data-class-id="class-b" id="class-b-file-upload-input" class="hidden file-upload-input" accept=".txt"><p data-class-id="class-b" class="text-xs text-gray-500 mt-2 text-center file-name-display"></p></div>
                                </div>
                                <div class="bg-white p-6 rounded-lg border">
                                     <div class="flex justify-between items-center mb-4"><h4 class="text-lg font-semibold">قائمة الطلاب</h4><span data-class-id="class-b" class="text-sm font-medium bg-gray-100 px-3 py-1 rounded-full student-count">0 طالب</span></div>
                                     <div data-class-id="class-b" class="space-y-2 max-h-72 overflow-y-auto pr-2 student-list-container"><p class="text-gray-500 text-center mt-8">لا يوجد طلاب في هذا الفصل.</p></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <div id="question-modal" class="fixed inset-0 bg-black bg-opacity-50 flex items-center justify-center p-4 z-50 hidden modal-overlay opacity-0">
        <div class="bg-white rounded-xl shadow-2xl p-6 w-full max-w-lg mx-auto transform scale-95 opacity-0 modal-content">
            <div class="flex justify-between items-center border-b pb-3"><h3 class="text-xl font-bold">سؤال للمراجعة</h3><button id="close-modal-btn" class="text-gray-400 hover:text-gray-600 text-3xl">&times;</button></div>
            <div id="modal-question-loading" class="text-center py-8 hidden"><div class="animate-spin rounded-full h-10 w-10 border-b-2 border-purple-600 mx-auto"></div><p class="mt-3 text-gray-600">...جاري تحضير السؤال</p></div>
            <div class="mt-4"><div id="modal-question-text" class="text-gray-700 text-lg prose max-w-none"></div></div>
            <div id="modal-feedback-buttons" class="mt-6 flex justify-end space-x-4 space-x-reverse hidden"><button id="incorrect-btn" class="bg-red-500 text-white py-2 px-5 rounded-lg font-semibold hover:bg-red-600">❌ إجابة خاطئة</button><button id="correct-btn" class="bg-green-500 text-white py-2 px-5 rounded-lg font-semibold hover:bg-green-600">✔️ إجابة صحيحة</button></div>
        </div>
    </div>

    <div id="toast-notification" class="fixed top-5 right-5 bg-green-500 text-white py-3 px-6 rounded-lg shadow-lg hidden toast-notification transform translate-x-full opacity-0">
        <p>تم حفظ التغييرات بنجاح!</p>
    </div>


<script>
    document.addEventListener('DOMContentLoaded', () => {

    // =================================================================
    // SECTION 0: DATA & STATE
    // =================================================================

    const performanceReviewItems = [
        {
            title: "المعرفة المهنية",
            evidence: [
                "شهادات حضور دورات تدريبية وورش عمل.",
                "ملخصات لكتب تربوية حديثة.",
                "نماذج من تطبيق استراتيجيات تدريس مبتكرة."
            ]
        },
        {
            title: "دعم تعلم الطلاب",
            evidence: [
                "خطط دروس تراعي الفروق الفردية.",
                "نماذج من أعمال الطلاب تظهر تقدمهم.",
                "تقارير تحليل نتائج الطلاب وخطط التحسين."
            ]
        },
        {
            title: "الممارسة المهنية",
            evidence: [
                "تقرير درس تطبيقي.",
                "نماذج من تقويمات متنوعة (بنائية وختامية).",
                "سجل استخدام التقنية في التعليم."
            ]
        },
        {
            title: "المسؤوليات المهنية",
            evidence: [
                "محاضر اجتماعات اللجان المدرسية.",
                "شهادات شكر وتقدير للمساهمة في الأنشطة.",
                "نماذج من التواصل الفعّال مع أولياء الأمور."
            ]
        }
    ];
    
    // Wheel variables
    let wheelItems = [];
    let isSpinning = false;
    let spinAngleStart = 0;
    let spinTime = 0;
    let spinTimeTotal = 0;
    let startAngle = 0;
    
    // App State
    let studentLists = {
        'class-a': [],
        'class-b': []
    };

    // =================================================================
    // SECTION 1: CORE FUNCTIONS
    // =================================================================

    function navigateTo(viewId) {
        document.querySelectorAll('main > div[id$="-view"]').forEach(view => view.classList.add('hidden'));
        const targetView = document.getElementById(viewId);
        if (targetView) targetView.classList.remove('hidden');

        document.querySelectorAll('#sidebar-nav a, #user-profile-button').forEach(link => {
            const isActive = link.dataset.target === viewId;
            link.classList.toggle('bg-blue-600', isActive);
            if (!link.id.includes('user-profile')) {
                link.classList.toggle('text-gray-300', !isActive);
            }
        });
        
        // If navigating away from profile, highlight last active nav item
        if (viewId !== 'profile-view') {
           document.getElementById('user-profile-button').classList.remove('bg-blue-600');
        } else {
             document.querySelectorAll('#sidebar-nav a').forEach(link => link.classList.remove('bg-blue-600'));
        }
    }

    function showToast(message) {
        const toast = document.getElementById('toast-notification');
        toast.querySelector('p').textContent = message;
        toast.classList.remove('hidden', 'translate-x-full', 'opacity-0');
        setTimeout(() => {
            toast.classList.add('translate-x-full', 'opacity-0');
            setTimeout(() => toast.classList.add('hidden'), 500);
        }, 3000);
    }

    // --- Gemini API Integration ---
    async function callGeminiAPI(prompt, resultContainer, loadingIndicator, isRawText = false) {
        if (loadingIndicator) loadingIndicator.classList.remove('hidden');
        if (resultContainer) resultContainer.innerHTML = '';

        const apiKey = ""; // API Key will be injected by the environment
        const apiUrl = `https://generativelanguage.googleapis.com/v1beta/models/gemini-2.5-flash-preview-05-20:generateContent?key=${apiKey}`;
        const payload = { contents: [{ parts: [{ text: prompt }] }] };
        
        let retries = 3;
        while(retries > 0) {
            try {
                const response = await fetch(apiUrl, {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/json' },
                    body: JSON.stringify(payload)
                });

                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }

                const result = await response.json();
                const text = result.candidates?.[0]?.content?.parts?.[0]?.text;
                
                if (text && resultContainer) {
                    resultContainer.innerHTML = isRawText ? text : formatGeminiResponse(text);
                } else if (!text) {
                     throw new Error("No content received from API.");
                }

                if (loadingIndicator) loadingIndicator.classList.add('hidden');
                return text; // Return the generated text for further use
            
            } catch (error) {
                console.error("Gemini API call failed:", error);
                retries--;
                if (retries === 0) {
                    if (resultContainer) resultContainer.innerHTML = `<p class="text-red-500">حدث خطأ أثناء الاتصال بالخادم. يرجى المحاولة مرة أخرى.</p>`;
                    if (loadingIndicator) loadingIndicator.classList.add('hidden');
                } else {
                     await new Promise(res => setTimeout(res, (3 - retries) * 1000)); // Exponential backoff
                }
            }
        }
    }

    function formatGeminiResponse(text) {
        // Simple Markdown to HTML conversion
        return text
            .replace(/\*\*(.*?)\*\*/g, '<strong>$1</strong>') // Bold
            .replace(/\*(.*?)\*/g, '<em>$1</em>')     // Italics
            .replace(/^#### (.*$)/gim, '<h4>$1</h4>')
            .replace(/^### (.*$)/gim, '<h3>$1</h3>')
            .replace(/^## (.*$)/gim, '<h2>$1</h2>')
            .replace(/^# (.*$)/gim, '<h1>$1</h1>')
            .replace(/^\* (.*$)/gim, '<ul><li>$1</li></ul>') // Unordered list items
            .replace(/^\s*\d+\.\s(.*$)/gim, '<ol><li>$1</li></ol>') // Ordered list items
            .replace(/<\/ul>\s*<ul>/g, '') // Merge consecutive lists
            .replace(/<\/ol>\s*<ol>/g, '') // Merge consecutive lists
            .replace(/\n/g, '<br>'); // Newlines
    }

    async function handleFormSubmit(formId, promptFn, resultId, loadingId, copyBtnId = null) {
        const form = document.getElementById(formId);
        if (!form) return;

        form.addEventListener('submit', async (e) => {
            e.preventDefault();
            const prompt = promptFn();
            if (!prompt) return;

            const resultContainer = document.getElementById(resultId);
            const loadingIndicator = document.getElementById(loadingId);
            
            const copyBtn = copyBtnId ? document.getElementById(copyBtnId) : null;
            if(copyBtn) copyBtn.classList.add('hidden');

            const generatedText = await callGeminiAPI(prompt, resultContainer, loadingIndicator);

            if (generatedText && copyBtn) {
                 copyBtn.classList.remove('hidden');
            }
        });
    }


    // =================================================================
    // SECTION 2: VIEW-SPECIFIC LOGIC
    // =================================================================

    // --- Performance Review ---
    function setupPerformanceReview() {
        const container = document.getElementById('accordion-container');
        if (!container) return;
        container.innerHTML = performanceReviewItems.map((item, index) => `
            <div class="border rounded-lg">
                <button class="w-full text-right p-4 bg-gray-50 hover:bg-gray-100 flex justify-between items-center accordion-header">
                    <span class="font-semibold">${item.title}</span>
                    <i class="ph-caret-down text-lg transition-transform"></i>
                </button>
                <div class="accordion-content px-4 pb-4">
                    <h4 class="font-bold mt-2 mb-2 text-sm text-gray-700">أمثلة على الشواهد المطلوبة:</h4>
                    <ul class="list-disc list-inside space-y-1 text-gray-600">
                        ${item.evidence.map(e => `<li>${e}</li>`).join('')}
                    </ul>
                </div>
            </div>
        `).join('');

        container.querySelectorAll('.accordion-header').forEach(header => {
            header.addEventListener('click', () => {
                const content = header.nextElementSibling;
                const icon = header.querySelector('i');
                const isOpen = content.style.maxHeight;
                
                // Close all others
                container.querySelectorAll('.accordion-content').forEach(c => c.style.maxHeight = null);
                container.querySelectorAll('.accordion-header i').forEach(i => i.classList.remove('rotate-180'));

                if (!isOpen) {
                    content.style.maxHeight = content.scrollHeight + "px";
                    icon.classList.add('rotate-180');
                }
            });
        });
    }

    // --- Parent Communication ---
    function setupParentCommunication() {
        const copyBtn = document.getElementById('pc-copy-btn');
        const resultDiv = document.getElementById('pc-result');
        if (!copyBtn || !resultDiv) return;

        copyBtn.addEventListener('click', () => {
            const textToCopy = resultDiv.innerText;
            navigator.clipboard.writeText(textToCopy).then(() => {
                copyBtn.querySelector('span').textContent = 'تم النسخ!';
                setTimeout(() => { copyBtn.querySelector('span').textContent = 'نسخ'; }, 2000);
            });
        });
    }
    
    // --- Profile & Class Management ---
    function setupProfile() {
        // Tabs
        const tabs = document.querySelectorAll('.profile-tab');
        const panels = document.querySelectorAll('.profile-tab-panel');
        tabs.forEach(tab => {
            tab.addEventListener('click', () => {
                tabs.forEach(t => t.classList.remove('text-blue-600', 'border-blue-600'));
                panels.forEach(p => p.classList.add('hidden'));
                
                tab.classList.add('text-blue-600', 'border-blue-600');
                document.getElementById(tab.dataset.tabTarget).classList.remove('hidden');
            });
        });
        
        // Image Upload
        const imgUpload = document.getElementById('profile-image-upload');
        const imgPreview = document.getElementById('profile-preview-image');
        const sidebarImg = document.getElementById('sidebar-user-image');
        imgUpload.addEventListener('change', (e) => {
            if (e.target.files && e.target.files[0]) {
                const reader = new FileReader();
                reader.onload = function(event) {
                    const imageUrl = event.target.result;
                    imgPreview.src = imageUrl;
                    sidebarImg.src = imageUrl;
                    localStorage.setItem('userProfileImage', imageUrl);
                }
                reader.readAsDataURL(e.target.files[0]);
            }
        });

        // Form Submit
        const profileForm = document.getElementById('profile-form');
        profileForm.addEventListener('submit', (e) => {
            e.preventDefault();
            const name = document.getElementById('profile-name').value;
            document.getElementById('sidebar-user-name').textContent = name;
            // Store other fields
            const profileData = {
                name,
                city: document.getElementById('profile-city').value,
                stage: document.getElementById('profile-stage').value,
                subjects: document.getElementById('profile-subjects').value,
                school: document.getElementById('profile-school').value
            };
            localStorage.setItem('userProfileData', JSON.stringify(profileData));
            showToast('تم حفظ بيانات الملف الشخصي بنجاح!');
        });
        
        // Load Profile Data
        const savedData = JSON.parse(localStorage.getItem('userProfileData'));
        if (savedData) {
            document.getElementById('profile-name').value = savedData.name || 'أ. خالد الغامدي';
            document.getElementById('sidebar-user-name').textContent = savedData.name || 'أ. خالد الغامدي';
            document.getElementById('profile-city').value = savedData.city || '';
            document.getElementById('profile-stage').value = savedData.stage || '';
            document.getElementById('profile-subjects').value = savedData.subjects || '';
            document.getElementById('profile-school').value = savedData.school || '';
        }
        const savedImage = localStorage.getItem('userProfileImage');
        if (savedImage) {
            imgPreview.src = savedImage;
            sidebarImg.src = savedImage;
        }
    }
    
    function setupClassManagement() {
        document.querySelectorAll('.add-manual-btn').forEach(btn => {
            btn.addEventListener('click', () => {
                const classId = btn.dataset.classId;
                const textarea = document.querySelector(`textarea[data-class-id="${classId}"]`);
                const names = textarea.value.trim().split('\n').filter(Boolean);
                addStudents(classId, names);
                textarea.value = '';
            });
        });
        
        document.querySelectorAll('.file-upload-input').forEach(input => {
            input.addEventListener('change', (e) => {
                const classId = input.dataset.classId;
                const file = e.target.files[0];
                if (file) {
                    document.querySelector(`.file-name-display[data-class-id="${classId}"]`).textContent = file.name;
                    const reader = new FileReader();
                    reader.onload = (event) => {
                        const names = event.target.result.trim().split('\n').filter(Boolean);
                        addStudents(classId, names);
                        input.value = ''; // Reset input
                         document.querySelector(`.file-name-display[data-class-id="${classId}"]`).textContent = '';
                    };
                    reader.readAsText(file);
                }
            });
        });

        loadStudentsFromStorage();
    }
    
    function addStudents(classId, names) {
        const uniqueNames = names.filter(name => !studentLists[classId].includes(name.trim()));
        studentLists[classId].push(...uniqueNames);
        saveStudentsToStorage();
        renderStudentList(classId);
    }
    
    function removeStudent(classId, studentName) {
        studentLists[classId] = studentLists[classId].filter(s => s !== studentName);
        saveStudentsToStorage();
        renderStudentList(classId);
    }

    function renderStudentList(classId) {
        const container = document.querySelector(`.student-list-container[data-class-id="${classId}"]`);
        const countSpan = document.querySelector(`.student-count[data-class-id="${classId}"]`);
        const list = studentLists[classId];

        countSpan.textContent = `${list.length} طالب`;
        if (list.length === 0) {
            container.innerHTML = `<p class="text-gray-500 text-center mt-8">لا يوجد طلاب في هذا الفصل.</p>`;
        } else {
            container.innerHTML = list.map(name => `
                <div class="flex justify-between items-center bg-gray-50 p-2 rounded-md">
                    <span>${name}</span>
                    <button data-class-id="${classId}" data-student-name="${name}" class="text-red-500 hover:text-red-700 remove-student-btn">&times;</button>
                </div>
            `).join('');
            
            container.querySelectorAll('.remove-student-btn').forEach(btn => {
                btn.addEventListener('click', () => {
                    removeStudent(btn.dataset.classId, btn.dataset.studentName);
                });
            });
        }
    }
    
    function saveStudentsToStorage() {
        localStorage.setItem('studentLists', JSON.stringify(studentLists));
    }
    
    function loadStudentsFromStorage() {
        const savedLists = JSON.parse(localStorage.getItem('studentLists'));
        if (savedLists) {
            studentLists = savedLists;
        }
        renderStudentList('class-a');
        renderStudentList('class-b');
    }

    // --- Wheel Logic ---
    function setupWheel() {
        const canvas = document.getElementById('wheel-canvas');
        if (!canvas) return;

        document.getElementById('wheel-items').addEventListener('input', (e) => {
            updateWheelItems(e.target.value);
            drawWheel();
        });
        
        document.getElementById('spin-btn').addEventListener('click', spinWheel);
        document.getElementById('wheel-ai-generate-btn').addEventListener('click', generateWheelItemsWithAI);
        document.getElementById('ai-question-btn').addEventListener('click', generateAIQuestion);
        document.getElementById('wheel-fetch-students-btn').addEventListener('click', fetchStudentsForWheel);

        setupWheelClassSelector();

        // Load students from class A into the wheel by default
        const classAStudents = studentLists['class-a'].join('\n');
        document.getElementById('wheel-items').value = classAStudents;
        updateWheelItems(classAStudents);

        drawWheel();
    }
    
    function setupWheelClassSelector() {
        const selector = document.getElementById('wheel-class-selector');
        const fetchBtn = document.getElementById('wheel-fetch-students-btn');
        if (!selector || !fetchBtn) return;

        selector.innerHTML = ''; // Clear existing options

        // Get class names from the profile tabs
        const classTabs = document.querySelectorAll('#profile-tabs button[data-tab-target^="class-"]');
        
        if (classTabs.length === 0) {
            selector.innerHTML = '<option disabled selected>لا توجد فصول دراسية معرفة</option>';
            fetchBtn.disabled = true;
            return;
        }
        
        classTabs.forEach(tab => {
            const classId = tab.dataset.tabTarget.replace('-panel', '');
            const className = tab.textContent;
            const option = document.createElement('option');
            option.value = classId;
            option.textContent = className;
            selector.appendChild(option);
        });
        fetchBtn.disabled = false;
    }

    function fetchStudentsForWheel() {
        const selector = document.getElementById('wheel-class-selector');
        const itemsTextarea = document.getElementById('wheel-items');
        const selectedClassId = selector.value;

        if (selectedClassId && studentLists[selectedClassId] && studentLists[selectedClassId].length > 0) {
            const studentNames = studentLists[selectedClassId].join('\n');
            itemsTextarea.value = studentNames;
            
            // Trigger update and redraw
            updateWheelItems(studentNames);
            drawWheel();
            showToast(`تم جلب ${studentLists[selectedClassId].length} طالبًا بنجاح.`);
        } else {
            itemsTextarea.value = ''; // Clear the textarea if class is empty
            updateWheelItems('');
            drawWheel();
            showToast('الفصل المحدد فارغ. يرجى إضافة طلاب أولاً.');
        }
    }
    
    function updateWheelItems(text) {
        wheelItems = text.trim().split('\n').filter(Boolean);
    }

    function drawWheel() {
        const canvas = document.getElementById('wheel-canvas');
        if (!canvas || !canvas.getContext) return;
        const ctx = canvas.getContext('2d');
        
        const numItems = wheelItems.length;
        const arcSize = (2 * Math.PI) / numItems;
        const colors = ['#3B82F6', '#10B981', '#F59E0B', '#EF4444', '#8B5CF6', '#14B8A6'];
        
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        ctx.strokeStyle = '#fff';
        ctx.lineWidth = 2;
        ctx.font = '16px Cairo';
        
        for (let i = 0; i < numItems; i++) {
            const angle = startAngle + i * arcSize;
            ctx.fillStyle = colors[i % colors.length];
            
            ctx.beginPath();
            ctx.arc(200, 200, 190, angle, angle + arcSize);
            ctx.arc(200, 200, 0, angle + arcSize, angle, true);
            ctx.fill();
            
            ctx.save();
            ctx.fillStyle = 'white';
            ctx.translate(200 + Math.cos(angle + arcSize / 2) * 120, 200 + Math.sin(angle + arcSize / 2) * 120);
            ctx.rotate(angle + arcSize / 2 + Math.PI / 2);
            const text = wheelItems[i] || '';
            ctx.fillText(text, -ctx.measureText(text).width / 2, 0);
            ctx.restore();
        }
    }

    function spinWheel() {
        if (isSpinning) return;
        isSpinning = true;
        document.getElementById('wheel-result-container').classList.add('hidden');
        spinAngleStart = Math.random() * 10 + 10;
        spinTimeTotal = Math.random() * 3000 + 4000;
        spinTime = 0;
        rotateWheel();
    }

    function rotateWheel() {
        spinTime += 30;
        if (spinTime >= spinTimeTotal) {
            stopRotateWheel();
            return;
        }
        const spinAngle = spinAngleStart - easeOut(spinTime, 0, spinAngleStart, spinTimeTotal);
        startAngle += (spinAngle * Math.PI / 180);
        drawWheel();
        requestAnimationFrame(rotateWheel);
    }

    function stopRotateWheel() {
        isSpinning = false;
        const canvas = document.getElementById('wheel-canvas');
        const ctx = canvas.getContext('2d');
        const degrees = startAngle * 180 / Math.PI + 90;
        const arcd = (2 * Math.PI) / wheelItems.length;
        const index = Math.floor((360 - degrees % 360) / (360 / wheelItems.length));
        
        const winner = wheelItems[index];
        document.getElementById('wheel-result-text').textContent = winner;
        document.getElementById('wheel-result-container').classList.remove('hidden');

        if (document.getElementById('remove-winner-checkbox').checked) {
            wheelItems.splice(index, 1);
            document.getElementById('wheel-items').value = wheelItems.join('\n');
        }
    }

    function easeOut(t, b, c, d) {
        const ts = (t /= d) * t;
        const tc = ts * t;
        return b + c * (tc + -3 * ts + 3 * t);
    }
    
    async function generateWheelItemsWithAI() {
        const promptInput = document.getElementById('wheel-ai-prompt');
        const itemsTextarea = document.getElementById('wheel-items');
        const btn = document.getElementById('wheel-ai-generate-btn');
        const originalText = btn.textContent;

        if (!promptInput.value) {
            alert("الرجاء إدخال طلب في حقل الذكاء الاصطناعي.");
            return;
        }

        btn.textContent = '...جاري التوليد';
        btn.disabled = true;

        const prompt = `قم بإنشاء قائمة من ${promptInput.value}، كل عنصر في سطر منفصل وبدون ترقيم أو علامات.`;
        const generatedText = await callGeminiAPI(prompt, null, null, true); // No UI elements, just get text
        
        if (generatedText) {
            itemsTextarea.value = generatedText;
            updateWheelItems(generatedText);
            drawWheel();
        }

        btn.textContent = originalText;
        btn.disabled = false;
    }
    
    // --- Modal Logic ---
    function setupModal() {
        const modal = document.getElementById('question-modal');
        const closeModalBtn = document.getElementById('close-modal-btn');
        
        const closeModal = () => {
            modal.querySelector('.modal-content').classList.add('scale-95', 'opacity-0');
            modal.classList.add('opacity-0');
            setTimeout(() => modal.classList.add('hidden'), 300);
        };
        
        closeModalBtn.addEventListener('click', closeModal);
        document.getElementById('incorrect-btn').addEventListener('click', closeModal);
        document.getElementById('correct-btn').addEventListener('click', closeModal);
        modal.addEventListener('click', (e) => {
            if (e.target === modal) closeModal();
        });
    }
    
    async function generateAIQuestion() {
        const modal = document.getElementById('question-modal');
        const loading = document.getElementById('modal-question-loading');
        const resultContainer = document.getElementById('modal-question-text');
        const feedbackBtns = document.getElementById('modal-feedback-buttons');
        
        const topic = document.getElementById('wheel-topic').value;
        const winner = document.getElementById('wheel-result-text').textContent;
        
        if (!topic) {
            alert('الرجاء إدخال موضوع الدرس لاقتراح سؤال.');
            return;
        }
        
        // Show modal
        modal.classList.remove('hidden');
        setTimeout(() => {
            modal.classList.remove('opacity-0');
            modal.querySelector('.modal-content').classList.remove('scale-95', 'opacity-0');
        }, 10);
        
        feedbackBtns.classList.add('hidden');
        resultContainer.innerHTML = '';
        
        const prompt = `أنت معلم. اطرح سؤالاً واحداً سريعاً ومناسباً للطالب "${winner}" لمراجعة موضوع الدرس: "${topic}". يجب أن يكون السؤال واضحاً ومباشراً.`;
        
        await callGeminiAPI(prompt, resultContainer, loading);
        
        feedbackBtns.classList.remove('hidden');
    }

    // =================================================================
    // SECTION 3: INITIALIZATION & EVENT LISTENERS
    // =================================================================

    function initialize() {
        // --- Setup Navigation ---
        document.querySelectorAll('[data-target]').forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault();
                navigateTo(e.currentTarget.getAttribute('data-target'));
            });
        });

        // --- Setup All Form Submissions ---
        handleFormSubmit('evidence-generator-form', () => `أنت خبير في التقييم المهني للمعلمين في السعودية. بناءً على الطلب التالي: "${document.getElementById('evidence-request').value}", قم بإنشاء نموذج شاهد احترافي ومفصل يمكن للمعلم إرفاقه في ملف إنجازه المهني.`, 'evidence-result', 'evidence-loading');
        
        handleFormSubmit('parent-communication-form', () => {
            const studentName = document.getElementById('pc-student-name').value;
            const points = document.getElementById('pc-points').value;
            const tone = document.getElementById('pc-tone').value;
            return `أنت معلم خبير في التواصل مع أولياء الأمور. قم بصياغة رسالة احترافية وموجزة لولي أمر الطالب "${studentName}" بناءً على النقاط التالية: "${points}". يجب أن تكون نبرة الرسالة "${tone}". ابدأ الرسالة بـ "السلام عليكم ورحمة الله وبركاته، ولي أمر الطالب/ـة ${studentName}".`;
        }, 'pc-result', 'pc-loading', 'pc-copy-btn');

        handleFormSubmit('lesson-planner-form', () => {
            const subject = document.getElementById('lp-subject').value;
            const grade = document.getElementById('lp-grade').value;
            const topic = document.getElementById('lp-topic').value;
            return `أنت خبير في تصميم المناهج. قم بإعداد خطة درس مفصلة ومتكاملة للمادة "${subject}" للمرحلة الدراسية "${grade}" حول موضوع "${topic}". يجب أن تشمل الخطة: الأهداف، المواد التعليمية، استراتيجيات التدريس، سير الدرس (تمهيد، عرض، خاتمة)، وأساليب التقويم.`;
        }, 'lp-result', 'lp-loading');
        
        handleFormSubmit('objectives-generator-form', () => {
            const topic = document.getElementById('og-topic').value;
            const level = document.getElementById('og-level').value;
            return `أنت خبير تربوي متخصص في صياغة الأهداف التعليمية. قم بصياغة 3-5 أهداف سلوكية ( قابلة للقياس) لموضوع الدرس "${topic}" بناءً على مستوى "${level}" في تصنيف بلوم.`;
        }, 'og-result', 'og-loading');
        
        handleFormSubmit('concept-simplifier-form', () => {
            const concept = document.getElementById('cs-concept').value;
            const grade = document.getElementById('cs-grade').value;
            const method = document.getElementById('cs-method').value;
            return `أنت معلم مبدع ومتخصص في تبسيط المفاهيم العلمية. اشرح المفهوم التالي: "${concept}" لطلاب في المرحلة الدراسية "${grade}". استخدم أسلوب "${method}" لجعل الشرح سهلاً وجذاباً.`;
        }, 'cs-result', 'cs-loading');
        
        handleFormSubmit('activity-generator-form', () => {
            const topic = document.getElementById('ag-topic').value;
            const type = document.getElementById('ag-type').value;
            return `أنت معلم مبتكر. اقترح 3 أفكار لأنشطة تعليمية تفاعلية لموضوع الدرس "${topic}". يجب أن يكون نوع النشاط "${type}". قدم وصفاً موجزاً لكل نشاط.`;
        }, 'ag-result', 'ag-loading');

        handleFormSubmit('strategy-generator-form', () => {
            const subject = document.getElementById('sg-subject').value;
            const grade = document.getElementById('sg-grade').value;
            const topic = document.getElementById('sg-topic').value;
            return `أنت مستشار تربوي خبير. اقترح أفضل 3 استراتيجيات تدريس مناسبة لدرس في مادة "${subject}" للمرحلة "${grade}" حول موضوع "${topic}". اشرح باختصار لماذا كل استراتيجية مناسبة.`;
        }, 'sg-result', 'sg-loading');
        
        handleFormSubmit('quiz-generator-form', () => {
            const topic = document.getElementById('qg-topic').value;
            const grade = document.getElementById('qg-grade').value;
            const numQuestions = document.getElementById('qg-num-questions').value;
            const questionTypes = [...document.querySelectorAll('#quiz-generator-form input[type="checkbox"]:checked')].map(el => el.nextElementSibling.textContent).join(', ');
            return `أنت متخصص في تقييم الطلاب. قم بإنشاء اختبار قصير من ${numQuestions} سؤالاً حول موضوع "${topic}" لطلاب في المرحلة "${grade}". يجب أن يتضمن الاختبار أنواع الأسئلة التالية: ${questionTypes}. في نهاية الاختبار، أضف قسم "مفتاح الإجابات" مع الإجابات الصحيحة.`;
        }, 'qg-result', 'qg-loading');

        handleFormSubmit('rubric-generator-form', () => {
            const title = document.getElementById('rg-title').value;
            const grade = document.getElementById('rg-grade').value;
            const description = document.getElementById('rg-description').value;
            const levels = document.getElementById('rg-levels').value;
            const criteria = document.getElementById('rg-criteria').value;
            
            let prompt = `أنت خبير تربوي متخصص في تصميم أدوات التقييم. قم بإنشاء معيار تقييم مفصل (Rubric) للواجب التالي:\n- عنوان الواجب: "${title}"\n- المرحلة الدراسية: "${grade}"\n- وصف الواجب: "${description}"\n\n`;
            prompt += `يجب أن يحتوي المعيار على ${levels} مستويات للأداء (مثال: متقن، متقدم، مقبول، مبتدئ).\n`;
            
            if (criteria) {
                prompt += `استخدم المعايير التالية للتقييم: "${criteria}".\n`;
            } else {
                prompt += `اقترح 3 إلى 5 معايير تقييم مناسبة للواجب (مثل: المحتوى، التنظيم، الدقة اللغوية، الإبداع).\n`;
            }

            prompt += `قم بتنسيق الإخراج بشكل واضح واحترافي. استخدم تنسيق ماركداون. لكل معيار تقييم، استخدم عنوانًا غامقًا (e.g., **المعيار الأول: المحتوى العلمي**). تحت كل عنوان، صف كل مستوى أداء في نقطة منفصلة باستخدام علامة النجمة (*).`;
            return prompt;
        }, 'rg-result', 'rg-loading');
        
        handleFormSubmit('story-generator-form', () => {
            const topic = document.getElementById('story-topic').value;
            const grade = document.getElementById('story-grade').value;
            const characters = document.getElementById('story-characters').value;
            const moral = document.getElementById('story-moral').value;
            
            let prompt = `أنت كاتب قصص أطفال مبدع وخبير. قم بتأليف قصة قصيرة وممتعة ومناسبة للأطفال في المرحلة العمرية "${grade}".\n- موضوع القصة الأساسي هو: "${topic}".\n`;
            
            if (characters) {
                prompt += `- يجب أن تكون الشخصيات الرئيسية هي: "${characters}".\n`;
            }
            
            if (moral) {
                prompt += `- يجب أن تحمل القصة في طياتها الدرس الأخلاقي التالي: "${moral}".\n`;
            }

            prompt += `اجعل لغة القصة بسيطة وجذابة، وأضف حوارًا بين الشخصيات إن أمكن. يجب ألا تكون القصة طويلة جدًا.`;
            return prompt;
        }, 'story-result', 'story-loading');

        handleFormSubmit('report-card-generator-form', () => {
            const studentName = document.getElementById('rcg-student-name').value;
            const subject = document.getElementById('rcg-subject').value;
            const strengths = document.getElementById('rcg-strengths').value;
            const improvements = document.getElementById('rcg-improvements').value;
            const tone = document.getElementById('rcg-tone').value;
            
            let prompt = `أنت معلم خبير ومتمرس. قم بكتابة ملاحظة موجزة واحترافية لسجل تقرير الطالب "${studentName}" في مادة "${subject}".\n`;
            prompt += `يجب أن تكون نبرة الملاحظة "${tone}".\n`;
            prompt += `- أبرز نقاط القوة التي يجب ذكرها: "${strengths}".\n`;
            prompt += `- الجوانب التي تحتاج إلى تطوير وتحسين: "${improvements}".\n`;
            prompt += `اجعل الملاحظة متوازنة وبناءة، تجمع بين الثناء على نقاط القوة وتقديم توصيات واضحة للتحسين.`;
            
            return prompt;
        }, 'rcg-result', 'rcg-loading');

        // --- Setup Individual View Components ---
        setupPerformanceReview();
        setupParentCommunication();
        setupProfile();
        setupClassManagement();
        setupWheel();
        setupModal();
    }

    // --- Run Initialization ---
    initialize();
});
</script>

</body>
</html>

