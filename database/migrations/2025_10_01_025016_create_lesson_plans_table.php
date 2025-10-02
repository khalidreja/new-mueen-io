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
        Schema::create('lesson_plans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('teacher_id')->constrained('teachers')->onDelete('cascade');
            $table->string('title');
            $table->string('subject');
            $table->string('grade');
            $table->string('class_name');
            $table->integer('duration'); // بالدقائق
            $table->json('objectives'); // أهداف الدرس
            $table->text('content'); // محتوى الدرس المولد
            $table->json('activities')->nullable(); // الأنشطة
            $table->json('resources')->nullable(); // المصادر المطلوبة
            $table->text('assessment')->nullable(); // أساليب التقييم
            $table->text('notes')->nullable(); // ملاحظات إضافية
            $table->date('lesson_date')->nullable(); // تاريخ الدرس المخطط
            $table->enum('status', ['draft', 'active', 'completed', 'archived'])->default('draft');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lesson_plans');
    }
};
