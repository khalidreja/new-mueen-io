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
        Schema::table('lesson_plans', function (Blueprint $table) {
            // إضافة الحقول الجديدة
            $table->string('grade')->nullable()->after('subject');
            $table->string('class_name')->nullable()->after('grade');
            $table->integer('duration')->nullable()->after('class_name'); 
            $table->json('resources')->nullable()->after('activities');
            $table->text('assessment')->nullable()->after('resources');
            $table->text('notes')->nullable()->after('assessment');
            $table->date('lesson_date')->nullable()->after('notes');
            $table->enum('status', ['draft', 'active', 'completed', 'archived'])->default('draft')->after('lesson_date');
            
            // إزالة الحقول القديمة
            $table->dropColumn(['grade_level', 'topic', 'is_favorite']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('lesson_plans', function (Blueprint $table) {
            // إزالة الحقول الجديدة
            $table->dropColumn(['grade', 'class_name', 'duration', 'resources', 'assessment', 'notes', 'lesson_date', 'status']);
            
            // إعادة الحقول القديمة
            $table->string('grade_level')->after('subject');
            $table->string('topic')->after('grade_level');
            $table->boolean('is_favorite')->default(false)->after('activities');
        });
    }
};
