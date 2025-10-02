# منصة مُعين التعليمية

منصة تعليمية ذكية تعتمد على الذكاء الاصطناعي لمساعدة المعلمين في إنشاء المحتوى التعليمي وإدارة الفصول الدراسية.

## المميزات الرئيسية

### 🎯 أدوات الذكاء الاصطناعي
- **مولد خطط الدروس**: إنشاء خطط دروس متكاملة ومفصلة
- **مولد الأهداف التعليمية**: صياغة أهداف تعليمية وفقاً لتصنيف بلوم
- **مولد الاختبارات**: إنشاء اختبارات متنوعة مع مفاتيح الإجابات
- **مولد الأنشطة التعليمية**: أفكار إبداعية للأنشطة الصفية
- **مبسّط المفاهيم**: تحويل المفاهيم المعقدة إلى شروحات مبسطة
- **مولد القصص التعليمية**: قصص جذابة لتعزيز التعلم
- **مولد معايير التقييم**: إنشاء معايير تقييم (Rubrics) احترافية
- **مولد ملاحظات السجلات**: ملاحظات دقيقة لسجلات الطلاب
- **مقترح الاستراتيجيات**: استشارات تربوية لطرق التدريس
- **مساعد رسائل أولياء الأمور**: رسائل احترافية للتواصل مع الأهالي

### 📚 إدارة المحتوى التعليمي
- **إدارة خطط الدروس**: حفظ وتنظيم وتحرير خطط الدروس
- **مكتبة المحتوى المولد**: أرشيف لجميع المحتويات المنشأة
- **نظام المفضلة**: تمييز المحتوى المهم للوصول السريع
- **البحث والتصفية**: العثور على المحتوى بسهولة

### 👥 إدارة الفصول والطلاب
- **إنشاء الفصول**: تنظيم الطلاب في فصول دراسية
- **إدارة قوائم الطلاب**: إضافة وحذف الطلاب
- **ملفات الطلاب**: تتبع أداء وملاحظات كل طالب
- **عجلة الاختيار الذكية**: أداة ممتعة لاختيار الطلاب عشوائياً

### 👤 إدارة الملف الشخصي
- **الملف الشخصي للمعلم**: إدارة البيانات الشخصية والمهنية
- **رفع الصورة الشخصية**: تخصيص الملف الشخصي
- **إعدادات المواد والمراحل**: تخصيص المنصة حسب التخصص

## المتطلبات التقنية

### متطلبات الخادم
- PHP >= 8.2
- Composer
- Node.js >= 18
- MySQL >= 8.0 أو PostgreSQL >= 13
- Redis (اختياري للتخزين المؤقت)

### الحزم المستخدمة
#### Backend (Laravel)
- Laravel 12.x
- Laravel Fortify (المصادقة)
- Inertia.js (ربط Frontend/Backend)

#### Frontend (Vue.js)
- Vue.js 3
- TypeScript
- Tailwind CSS
- Vite

## التثبيت والإعداد

### 1. استنساخ المشروع
```bash
git clone <repository-url>
cd mueen-platform
```

### 2. التثبيت التلقائي
```bash
chmod +x install.sh
./install.sh
```

### 3. التثبيت اليدوي

#### تثبيت حزم PHP
```bash
composer install
```

#### تثبيت حزم Node.js
```bash
npm install
```

#### إعداد البيئة
```bash
cp .env.example .env
php artisan key:generate
```

#### إعداد قاعدة البيانات
قم بتحديث الإعدادات في `.env`:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=mueen_platform
DB_USERNAME=your_username
DB_PASSWORD=your_password
```

#### تشغيل المايجريشن
```bash
php artisan migrate
```

#### بناء الواجهة الأمامية
```bash
npm run build
```

## التشغيل

### بيئة التطوير
```bash
# تشغيل خادم Laravel
php artisan serve

# تشغيل Vite (في terminal منفصل)
npm run dev
```

### بيئة الإنتاج
```bash
# تحسين الأداء
php artisan config:cache
php artisan route:cache
php artisan view:cache

# تشغيل الخادم باستخدام Nginx/Apache
```

## هيكل المشروع

```
├── app/
│   ├── Http/Controllers/          # تحكم في الطلبات
│   │   ├── DashboardController.php    # لوحة التحكم
│   │   ├── LessonPlanController.php   # خطط الدروس
│   │   ├── AIToolsController.php      # أدوات الذكاء الاصطناعي
│   │   ├── ProfileController.php      # الملف الشخصي
│   │   └── StudentClassController.php # إدارة الفصول
│   ├── Models/                    # نماذج البيانات
│   │   ├── User.php                   # المستخدم
│   │   ├── Teacher.php                # المعلم
│   │   ├── StudentClass.php           # الفصل الدراسي
│   │   ├── Student.php                # الطالب
│   │   ├── LessonPlan.php             # خطة الدرس
│   │   └── GeneratedContent.php       # المحتوى المولد
│   └── Policies/                  # سياسات التفويض
├── database/
│   └── migrations/                # ملفات قاعدة البيانات
├── resources/
│   ├── js/
│   │   ├── pages/                 # صفحات Vue
│   │   │   ├── Dashboard.vue          # لوحة التحكم
│   │   │   ├── Tools/                 # أدوات الذكاء الاصطناعي
│   │   │   └── LessonPlans/           # إدارة خطط الدروس
│   │   ├── layouts/               # تخطيطات الصفحات
│   │   └── components/            # مكونات Vue
│   └── views/                     # ملفات Blade
└── routes/
    ├── web.php                    # مسارات الويب
    └── auth.php                   # مسارات المصادقة
```

## الاستخدام

### 1. إنشاء حساب معلم
- قم بالتسجيل باستخدام البريد الإلكتروني
- أكمل بيانات الملف الشخصي

### 2. إنشاء فصل دراسي
- اذهب إلى "إدارة الفصول"
- أضف فصلاً جديداً
- أضف قائمة الطلاب

### 3. استخدام أدوات الذكاء الاصطناعي
- اختر الأداة المطلوبة من لوحة التحكم
- أدخل البيانات المطلوبة
- احصل على المحتوى المولد
- احفظ المحتوى في مكتبتك

### 4. إدارة خطط الدروس
- عرض جميع خطط الدروس المحفوظة
- تحرير أو حذف الخطط
- إضافة الخطط إلى المفضلة
- البحث والتصفية

## المساهمة

### متطلبات التطوير
- معرفة بـ Laravel/PHP
- معرفة بـ Vue.js/TypeScript
- معرفة بـ Tailwind CSS

### خطوات المساهمة
1. Fork المشروع
2. إنشاء branch جديد للميزة
3. تطوير الميزة مع الاختبارات
4. إرسال Pull Request

## الترخيص

هذا المشروع مرخص تحت رخصة MIT. انظر الملف [LICENSE](LICENSE) للمزيد من التفاصيل.

## دليل النشر على الإنترنت

### خيارات النشر المتاحة

#### 1. النشر على Vercel (الأسهل - مجاني)
```bash
# تثبيت Vercel CLI
npm install -g vercel

# تسجيل الدخول
vercel login

# النشر
vercel --prod
```

**المتغيرات البيئية المطلوبة في Vercel:**
- `APP_KEY`: مفتاح التطبيق
- `GEMINI_API_KEY`: مفتاح Google Gemini API
- `DB_CONNECTION`: نوع قاعدة البيانات (mysql/pgsql)
- باقي إعدادات قاعدة البيانات

#### 2. النشر باستخدام Docker
```bash
# بناء الصورة
docker build -t laravel-app .

# تشغيل باستخدام Docker Compose
docker-compose up -d
```

#### 3. النشر على VPS (DigitalOcean/AWS/Linode)
```bash
# رفع الملفات
rsync -avz --exclude-from='.gitignore' . user@server:/var/www/html/

# إعداد الخادم
sudo apt update
sudo apt install php8.2 php8.2-fpm nginx mysql-server nodejs npm composer

# إعداد صلاحيات الملفات
sudo chown -R www-data:www-data /var/www/html
sudo chmod -R 755 /var/www/html/storage
sudo chmod -R 755 /var/www/html/bootstrap/cache

# إعداد Laravel
php artisan key:generate
php artisan migrate --force
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### إعدادات الإنتاج المهمة

**ملف .env للإنتاج:**
```env
APP_ENV=production
APP_DEBUG=false
APP_URL=https://your-domain.com

DB_CONNECTION=mysql
DB_HOST=your-db-host
DB_DATABASE=your-db-name
DB_USERNAME=your-db-user
DB_PASSWORD=your-secure-password

GEMINI_API_KEY=your-gemini-api-key

SESSION_ENCRYPT=true
MAIL_ENCRYPTION=tls
```

### خطوات ما بعد النشر

1. **إعداد SSL:**
   ```bash
   sudo certbot --nginx -d your-domain.com
   ```

2. **إعداد المهام المجدولة:**
   ```bash
   * * * * * cd /var/www/html && php artisan schedule:run >> /dev/null 2>&1
   ```

### استكشاف الأخطاء الشائعة

- **خطأ 500**: تحقق من `storage/logs/laravel.log`
- **مشاكل الأصول**: تشغيل `npm run build`
- **خطأ قاعدة البيانات**: التحقق من إعدادات الاتصال
- **خطأ Gemini API**: التحقق من صحة المفتاح

## الدعم

للحصول على الدعم:
- افتح issue في GitHub
- راسلنا على البريد الإلكتروني
- راجع الوثائق التقنية

## خارطة الطريق

### الإصدار التالي (v2.0)
- [ ] تكامل مع APIs الذكاء الاصطناعي الحقيقية
- [ ] نظام إشعارات متقدم
- [ ] تطبيق الهاتف المحمول
- [ ] تحليلات الأداء والإحصائيات
- [ ] نظام التعاون بين المعلمين
- [ ] دعم متعدد اللغات

### التحديثات المستقبلية
- [ ] تكامل مع أنظمة إدارة التعلم (LMS)
- [ ] واجهة برمجة تطبيقات (API) عامة
- [ ] نظام القوالب المخصصة
- [ ] تصدير المحتوى بصيغ متعددة

---

**منصة مُعين التعليمية** - مساعدك التعليمي الذكي 🎓