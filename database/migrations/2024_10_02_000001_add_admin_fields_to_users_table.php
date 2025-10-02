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
        Schema::table('users', function (Blueprint $table) {
            $table->enum('role', ['user', 'teacher', 'admin'])->default('user')->after('email');
            $table->enum('status', ['active', 'inactive', 'suspended'])->default('active')->after('role');
            $table->enum('subscription_type', ['free', 'premium', 'pro'])->default('free')->after('status');
            $table->timestamp('subscription_updated_at')->nullable()->after('subscription_type');
            $table->boolean('is_active')->default(true)->after('subscription_updated_at');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'role',
                'status', 
                'subscription_type',
                'subscription_updated_at',
                'is_active'
            ]);
        });
    }
};