<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\AssessmentController;

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::middleware('auth')->group(function () {
    Route::get('/', [CourseController::class, 'index'])->name('home');
    Route::get('/courses/{id}', [CourseController::class, 'show'])->name('courses.show');
    Route::post('/courses/{id}/enrol', [CourseController::class, 'enrol'])->name('courses.enrol');
    Route::get('/assessments/{id}', [AssessmentController::class, 'show'])->name('assessments.show');
    Route::post('/courses/{id}/assessments', [CourseController::class, 'store'])->name('assessments.store');
});

require __DIR__.'/auth.php';
