<?php

use App\Http\Controllers\Admin\AdminDashboardController;
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->name('admin.')->middleware(['auth', 'admin'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [AdminDashboardController::class, 'dashboard'])->name('dashboard');
    
    // User Management
    Route::get('/users', [AdminDashboardController::class, 'users'])->name('users');
    Route::post('/users', [AdminDashboardController::class, 'storeUser'])->name('users.store');
    Route::put('/users/{user}', [AdminDashboardController::class, 'updateUser'])->name('users.update');
    Route::delete('/users/{user}', [AdminDashboardController::class, 'destroyUser'])->name('users.destroy');
    Route::patch('/users/{user}/status', [AdminDashboardController::class, 'toggleUserStatus'])->name('users.toggle-status');
    
    // Memberships Management
    Route::get('/memberships', [AdminDashboardController::class, 'memberships'])->name('memberships');
    Route::patch('/memberships/{user}', [AdminDashboardController::class, 'updateMembership'])->name('memberships.update');
    
    // Teachers Management
    Route::get('/teachers', [AdminDashboardController::class, 'teachers'])->name('teachers');
    Route::post('/teachers', [AdminDashboardController::class, 'storeTeacher'])->name('teachers.store');
    Route::put('/teachers/{teacher}', [AdminDashboardController::class, 'updateTeacher'])->name('teachers.update');
    Route::delete('/teachers/{teacher}', [AdminDashboardController::class, 'destroyTeacher'])->name('teachers.destroy');
    
    // Content Management
    Route::get('/content', [AdminDashboardController::class, 'content'])->name('content');
    Route::delete('/content/{content}', [AdminDashboardController::class, 'destroyContent'])->name('content.destroy');
    Route::delete('/content/bulk', [AdminDashboardController::class, 'bulkDestroyContent'])->name('content.bulk-destroy');
    Route::get('/content/export', [AdminDashboardController::class, 'exportContent'])->name('content.export');
    
    // Lesson Plans Management
    Route::get('/lesson-plans', [AdminDashboardController::class, 'lessonPlans'])->name('lesson-plans');
    
    // Reports Management
    Route::get('/reports', [AdminDashboardController::class, 'reports'])->name('reports');
    
    // System Settings
    Route::get('/settings', [AdminDashboardController::class, 'settings'])->name('settings');
    Route::put('/settings', [AdminDashboardController::class, 'updateSettings'])->name('settings.update');
    
    // Activity Logs
    Route::get('/logs', [AdminDashboardController::class, 'logs'])->name('logs');
    
    // Backup Management
    Route::get('/backups', [AdminDashboardController::class, 'backups'])->name('backups');
    Route::post('/backups', [AdminDashboardController::class, 'createBackup'])->name('backups.create');
    Route::delete('/backups/{backup}', [AdminDashboardController::class, 'deleteBackup'])->name('backups.delete');
});