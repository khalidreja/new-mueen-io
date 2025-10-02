<?php

require_once 'vendor/autoload.php';

$app = require_once 'bootstrap/app.php';
$app->make(\Illuminate\Contracts\Console\Kernel::class)->bootstrap();

use App\Services\GeminiService;

echo "=== Gemini API Test ===\n";

try {
    $geminiService = new GeminiService();
    echo "✅ GeminiService instance created successfully\n";
    
    $testPrompt = "اكتب جملة بسيطة عن التعليم";
    echo "Testing with prompt: $testPrompt\n\n";
    
    $response = $geminiService->makeRequest($testPrompt);
    echo "✅ API Response received:\n";
    echo substr($response, 0, 200) . "...\n";
    
} catch (\Exception $e) {
    echo "❌ Error: " . $e->getMessage() . "\n";
    echo "Stack trace:\n" . $e->getTraceAsString() . "\n";
}

echo "\n=== Test Complete ===\n";