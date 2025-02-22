<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\OpenCallsController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProjectController;
use Illuminate\Support\Facades\Route;

// Publicly accessible routes

Route::get('/', [ProjectController::class, 'index'])->name('main.index'); // Display projects on the homepage
Route::get('/projects/{project}', [ProjectController::class, 'show'])->name('projects.show-main'); // View individual projects
Route::get('/projects', [ProjectController::class, 'allProjects'])->name('projects'); // Admin-specific projects view
Route::get('/opencalls-news', [\App\Http\Controllers\OpenCallsController::class, 'allOpenCalls'])->name('openCalls'); // Admin-specific projects view
Route::get('/opencalls-news/{openCall}', [\App\Http\Controllers\OpenCallsController::class, 'show'])->name('openCall.show-main'); // View individual projects
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');

// Admin routes for authenticated user (admin)
Route::middleware('auth')->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/projects', [\App\Http\Controllers\Admin\ProjectController::class, 'index'])->name('projects.index'); // Admin-specific projects view
    Route::get('/admin/projects/{project}', [\App\Http\Controllers\Admin\ProjectController::class, 'show'])->name('projects.show'); // View individual projects
    Route::delete('/admin/projects/{project}', [\App\Http\Controllers\Admin\ProjectController::class, 'show'])->name('projects.destroy');
    Route::post('/admin/projects', [\App\Http\Controllers\Admin\ProjectController::class, 'store'])->name('projects.store');
    Route::get('/admin/projects/{project}/edit', [\App\Http\Controllers\Admin\ProjectController::class, 'edit'])->name('projects.edit');
    Route::put('/admin/projects/{project}', [\App\Http\Controllers\Admin\ProjectController::class, 'update'])->name('projects.update');
    Route::delete('/admin/projects/{project}', [\App\Http\Controllers\Admin\ProjectController::class, 'destroy'])->name('projects.destroy');
    Route::get('/create-projects', [\App\Http\Controllers\Admin\ProjectController::class, 'create'])->name('projects.create'); // Correct route to create project


    Route::get('/admin/opencalls', [OpenCallsController::class, 'index'])->name('opencalls.index');
    Route::get('/admin/opencalls/create', [OpenCallsController::class, 'create'])->name('opencalls.create');
    Route::post('/admin/opencalls', [OpenCallsController::class, 'store'])->name('opencalls.store');
    Route::get('/admin/opencalls/{opencall}', [OpenCallsController::class, 'show'])->name('opencalls.show');
    Route::get('/admin/opencalls/{opencall}/edit', [OpenCallsController::class, 'edit'])->name('opencalls.edit');
    Route::put('/admin/opencalls/{opencall}', [OpenCallsController::class, 'update'])->name('opencalls.update');
    Route::delete('/admin/opencalls/{opencall}', [OpenCallsController::class, 'destroy'])->name('opencalls.destroy');


});

// Authentication routes (typically generated by Laravel Breeze or similar)
require __DIR__.'/auth.php';
