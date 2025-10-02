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
        Schema::table('teachers', function (Blueprint $table) {
            $table->string('years_experience')->nullable()->after('stage');
            $table->string('qualification')->nullable()->after('years_experience');
            $table->string('specialization')->nullable()->after('qualification');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('teachers', function (Blueprint $table) {
            $table->dropColumn(['years_experience', 'qualification', 'specialization']);
        });
    }
};
