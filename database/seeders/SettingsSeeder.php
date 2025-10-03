<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Setting;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $defaultSettings = [
            // General Settings
            [
                'key' => 'site_name',
                'value' => 'منصة مُعين التعليمية',
                'type' => 'string',
                'description' => 'اسم الموقع'
            ],
            [
                'key' => 'site_description',
                'value' => 'منصة تعليمية ذكية لإنشاء المحتوى التعليمي',
                'type' => 'string',
                'description' => 'وصف الموقع'
            ],
            [
                'key' => 'max_free_generations',
                'value' => '10',
                'type' => 'integer',
                'description' => 'الحد الأقصى للمحتوى المجاني'
            ],
            [
                'key' => 'registration_enabled',
                'value' => '1',
                'type' => 'boolean',
                'description' => 'السماح بالتسجيل الجديد'
            ],
            [
                'key' => 'email_verification_required',
                'value' => '0',
                'type' => 'boolean',
                'description' => 'يتطلب تأكيد البريد الإلكتروني'
            ],
            [
                'key' => 'maintenance_mode',
                'value' => '0',
                'type' => 'boolean',
                'description' => 'وضع الصيانة'
            ],

            // AI Settings
            [
                'key' => 'ai_provider',
                'value' => 'gemini',
                'type' => 'string',
                'description' => 'مزود الذكاء الاصطناعي'
            ],
            [
                'key' => 'ai_model',
                'value' => 'gemini-pro',
                'type' => 'string',
                'description' => 'النموذج المستخدم'
            ],
            [
                'key' => 'ai_api_key',
                'value' => '',
                'type' => 'string',
                'description' => 'مفتاح API'
            ],
            [
                'key' => 'ai_rate_limit',
                'value' => '100',
                'type' => 'integer',
                'description' => 'الحد الأقصى للطلبات/ساعة'
            ],

            // Security Settings
            [
                'key' => 'min_password_length',
                'value' => '8',
                'type' => 'integer',
                'description' => 'طول كلمة المرور الأدنى'
            ],
            [
                'key' => 'session_timeout',
                'value' => '120',
                'type' => 'integer',
                'description' => 'مدة انقضاء الجلسة (دقيقة)'
            ],
            [
                'key' => 'require_password_complexity',
                'value' => '1',
                'type' => 'boolean',
                'description' => 'يتطلب كلمة مرور معقدة'
            ],
            [
                'key' => 'enable_two_factor',
                'value' => '0',
                'type' => 'boolean',
                'description' => 'تفعيل المصادقة الثنائية'
            ],
            [
                'key' => 'log_user_activities',
                'value' => '1',
                'type' => 'boolean',
                'description' => 'تسجيل أنشطة المستخدمين'
            ]
        ];

        foreach ($defaultSettings as $setting) {
            Setting::updateOrCreate(
                ['key' => $setting['key']],
                $setting
            );
        }
    }
}