<?php
require_once 'vendor/autoload.php';

use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

// تهيئة Laravel
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

// محاكاة request للتحديث
$request = Request::create('/teacher-profile', 'PATCH', [
    'name' => 'اختبار المستخدم',
    'phone' => '0501234567',
    'city' => 'الرياض',
    'school' => 'مدرسة الاختبار',
    'subject' => 'الرياضيات',
    'stage' => 'المتوسطة',
    'years_experience' => '5 سنوات',
    'qualification' => 'بكالوريوس',
    'specialization' => 'تعليم الرياضيات',
    'classes' => [
        [
            'id' => 1,
            'stage' => 'المتوسطة',
            'grade' => 'الأول المتوسط',
            'className' => '1/أ',
            'subjects' => ['الرياضيات'],
            'students' => [
                ['id' => 1, 'name' => 'أحمد محمد', 'number' => 1]
            ]
        ]
    ]
]);

// إضافة headers مطلوبة
$request->headers->set('Accept', 'application/json');
$request->headers->set('Content-Type', 'application/json');

try {
    $response = $kernel->handle($request);
    echo "Response Status: " . $response->getStatusCode() . "\n";
    echo "Response Content: " . $response->getContent() . "\n";
} catch (Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
    echo "Trace: " . $e->getTraceAsString() . "\n";
}