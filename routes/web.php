<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\AssessmentController;
use App\Http\Controllers\PeerReviewController;
use App\Http\Controllers\ScoreController;

Route::middleware('auth')->group(function () {
    Route::get('/', [CourseController::class, 'index'])->name('home');
    Route::get('/courses/upload', [CourseController::class, 'upload'])->middleware('teacher')->name('courses.upload');
    Route::post('/courses/upload_file', [CourseController::class, 'upload_file'])->name('courses.upload_file');
    Route::get('/courses/{id}', [CourseController::class, 'show'])->name('courses.show');
    Route::post('/courses/{id}/enrol', [CourseController::class, 'enrol'])->name('courses.enrol');
    Route::get('/assessments/{id}/teacher', [AssessmentController::class, 'show_teacher'])->name('assessments.show_teacher');
    Route::get('/assessments/{id}/student', [AssessmentController::class, 'show_student'])->name('assessments.show_student');
    Route::post('/courses/{id}/assessments', [AssessmentController::class, 'store'])->name('assessments.store');
    Route::get('/assessments/{id}/edit', [AssessmentController::class, 'edit'])->name('assessments.edit');
    Route::put('/assessments/{id}', [AssessmentController::class, 'update'])->name('assessments.update');
    Route::post('/assessments/{id}/submit_review', [AssessmentController::class, 'submit_review'])->name('assessments.submit_review');
    Route::get('/assessments/{assessment_id}/students/{student_id}/reviews', [PeerReviewController::class, 'index'])->name('reviews.index');
    Route::post('/reviews/{id}/rate', [PeerReviewController::class, 'rate'])->name('reviews.rate');
    Route::get('/reviews/top_five_reviewers', [PeerReviewController::class, 'top_five_reviewers'])->name('reviews.top_five_reviewers');
    Route::post('/assessments/{assessment_id}/students/{student_id}/assign_score', [ScoreController::class, 'assign_score'])->name('scores.assign_score');
});

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

// Route::middleware('auth')->group(function () {
//     Route::get('/', [CourseController::class, 'index'])->name('home');
//     Route::get('/courses/upload', [CourseController::class, 'upload'])->name('courses.upload');
//     Route::post('/courses/upload_file', [CourseController::class, 'upload_file'])->name('courses.upload_file');
//     Route::get('/courses/{id}', [CourseController::class, 'show'])->name('courses.show');
//     Route::post('/courses/{id}/enrol', [CourseController::class, 'enrol'])->name('courses.enrol');
//     Route::get('/assessments/{id}/teacher', [AssessmentController::class, 'show_teacher'])->name('assessments.show_teacher');
//     Route::get('/assessments/{id}/student', [AssessmentController::class, 'show_student'])->name('assessments.show_student');
//     Route::post('/courses/{id}/assessments', [AssessmentController::class, 'store'])->name('assessments.store');
//     Route::get('/assessments/{id}/edit', [AssessmentController::class, 'edit'])->name('assessments.edit');
//     Route::put('/assessments/{id}', [AssessmentController::class, 'update'])->name('assessments.update');
//     Route::post('/assessments/{id}/submit_review', [AssessmentController::class, 'submit_review'])->name('assessments.submit_review');
//     Route::get('/assessments/{assessment_id}/students/{student_id}/reviews', [PeerReviewController::class, 'index'])->name('reviews.index');
//     Route::post('/reviews/{id}/rate', [PeerReviewController::class, 'rate'])->name('reviews.rate');
//     Route::get('/reviews/top_five_reviewers', [PeerReviewController::class, 'top_five_reviewers'])->name('reviews.top_five_reviewers');
//     Route::post('/assessments/{assessment_id}/students/{student_id}/assign_score', [ScoreController::class, 'assign_score'])->name('scores.assign_score');
// });

require __DIR__.'/auth.php';
