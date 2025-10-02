#!/bin/bash

# منصة مُعين التعليمية - نص التثبيت
echo "=== تثبيت منصة مُعين التعليمية ==="

# التحقق من متطلبات النظام
echo "التحقق من متطلبات النظام..."

# تثبيت dependencies
echo "تثبيت حزم PHP..."
composer install --no-dev --optimize-autoloader

echo "تثبيت حزم Node.js..."
npm install

# إعداد البيئة
echo "إعداد ملف البيئة..."
if [ ! -f .env ]; then
    cp .env.example .env
    echo "تم إنشاء ملف .env - يرجى تحديث إعدادات قاعدة البيانات"
fi

# توليد مفتاح التطبيق
echo "توليد مفتاح التطبيق..."
php artisan key:generate

# تشغيل المايجريشن
echo "إنشاء جداول قاعدة البيانات..."
php artisan migrate --force

# بناء الواجهة الأمامية
echo "بناء ملفات الواجهة الأمامية..."
npm run build

# إعداد الصلاحيات
echo "إعداد صلاحيات المجلدات..."
chmod -R 755 storage bootstrap/cache
chown -R www-data:www-data storage bootstrap/cache

# تحسين الأداء
echo "تحسين الأداء..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "=== تم الانتهاء من التثبيت بنجاح! ==="
echo "يمكنك الآن الوصول للمنصة من خلال المتصفح"
echo "لا تنس تحديث إعدادات قاعدة البيانات في ملف .env"