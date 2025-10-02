<?php

// Test script for profile update
require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Models\User;
use App\Models\Teacher;

echo "=== Profile Update Test ===\n";

// Get first user
$user = User::first();
if (!$user) {
    echo "No users found!\n";
    exit(1);
}

echo "User ID: {$user->id}\n";
echo "User Name: {$user->name}\n";

// Get or create teacher
$teacher = $user->teacher;
if (!$teacher) {
    echo "Creating teacher profile...\n";
    $teacher = $user->teacher()->create([
        'phone' => '0501234567',
        'city' => 'Test City',
        'school' => 'Test School',
        'subject' => 'Test Subject',
        'stage' => 'Test Stage',
    ]);
} else {
    echo "Teacher profile exists\n";
}

echo "Teacher ID: {$teacher->id}\n";
echo "Teacher Phone: {$teacher->phone}\n";
echo "Teacher City: {$teacher->city}\n";
echo "Teacher School: {$teacher->school}\n";

// Update teacher data
echo "\nUpdating teacher data...\n";
$teacher->update([
    'phone' => '0507654321',
    'city' => 'Updated City',
    'school' => 'Updated School',
    'subject' => 'Updated Subject',
    'stage' => 'Updated Stage',
    'classes_data' => [
        [
            'id' => 1,
            'stage' => 'المتوسطة',
            'grade' => 'الأول المتوسط',
            'className' => '1/أ',
            'subjects' => ['الرياضيات'],
            'students' => [
                ['id' => 1, 'name' => 'أحمد محمد', 'number' => 1],
                ['id' => 2, 'name' => 'فاطمة علي', 'number' => 2]
            ]
        ]
    ]
]);

// Refresh and check
$teacher->refresh();
echo "After update:\n";
echo "Teacher Phone: {$teacher->phone}\n";
echo "Teacher City: {$teacher->city}\n";
echo "Teacher School: {$teacher->school}\n";
echo "Classes Data: " . json_encode($teacher->classes_data, JSON_UNESCAPED_UNICODE) . "\n";

echo "\n=== Test Complete ===\n";