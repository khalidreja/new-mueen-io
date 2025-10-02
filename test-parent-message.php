<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Services\GeminiService;
use App\Http\Controllers\AIToolsController;

echo "=== Parent Message API Test ===\n";

// Test data
$testData = [
    'student_name' => 'أحمد محمد',
    'message_type' => 'تقدير وشكر',
    'subject' => 'الرياضيات',
    'details' => 'الطالب يظهر تحسناً ملحوظاً في مادة الرياضيات ويشارك بفاعلية في الصف'
];

try {
    echo "Testing GeminiService directly...\n";
    $geminiService = new GeminiService();
    $result = $geminiService->generateParentMessage($testData);
    echo "✅ GeminiService Success: " . substr($result, 0, 100) . "...\n\n";
    
    echo "Testing via Controller...\n";
    
    // Test the full endpoint
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'http://localhost:8000/ai/generate-parent-message');
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($testData));
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Content-Type: application/json',
        'Accept: application/json',
        'X-CSRF-TOKEN: test-token'
    ]);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_TIMEOUT, 60);
    
    $response = curl_exec($ch);
    $httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    curl_close($ch);
    
    echo "HTTP Code: $httpCode\n";
    echo "Response: " . substr($response, 0, 200) . "\n";
    
    if ($httpCode === 200) {
        $data = json_decode($response, true);
        if ($data && $data['success']) {
            echo "✅ API Success!\n";
        } else {
            echo "❌ API returned error: " . ($data['error'] ?? 'Unknown') . "\n";
        }
    } else {
        echo "❌ HTTP Error: $httpCode\n";
    }
    
} catch (\Exception $e) {
    echo "❌ Error: " . $e->getMessage() . "\n";
    echo "Stack trace:\n" . $e->getTraceAsString() . "\n";
}

echo "\n=== Test Complete ===\n";