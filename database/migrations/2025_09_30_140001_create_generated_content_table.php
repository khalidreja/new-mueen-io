<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('generated_content', function (Blueprint $table) {
            $table->id();
            $table->foreignId('teacher_id')->constrained()->onDelete('cascade');
            $table->enum('type', ['quiz', 'activity', 'story', 'rubric', 'concept', 'objective', 'parent_message', 'report_card', 'strategy']);
            $table->string('title');
            $table->json('input_data'); // البيانات المدخلة
            $table->longText('generated_content'); // المحتوى المولد
            $table->boolean('is_favorite')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('generated_content');
    }
};
