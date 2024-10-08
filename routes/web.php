<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\AssessmentController;
use App\Http\Controllers\PeerReviewController;
use App\Http\Controllers\ScoreController;

Route::middleware('auth')->group(function () {
    Route::get('/', [CourseController::class, 'index'])->name('home');
    Route::get('/courses/upload', [CourseController::class, 'upload'])->middleware('teacher')->name('courses.upload');
    Route::post('/courses/upload_file', [CourseController::class, 'upload_file'])->middleware('teacher')->name('courses.upload_file');
    Route::get('/courses/{id}', [CourseController::class, 'show'])->name('courses.show');
    Route::post('/courses/{id}/enrol', [CourseController::class, 'enrol'])->middleware('teacher')->name('courses.enrol');
    Route::get('/assessments/{id}/teacher', [AssessmentController::class, 'show_teacher'])->middleware('teacher')->name('assessments.show_teacher');
    Route::get('/assessments/{id}/student', [AssessmentController::class, 'show_student'])->name('assessments.show_student');
    Route::post('/courses/{id}/assessments', [AssessmentController::class, 'store'])->middleware('teacher')->name('assessments.store');
    Route::get('/assessments/{id}/edit', [AssessmentController::class, 'edit'])->middleware('teacher')->name('assessments.edit');
    Route::put('/assessments/{id}', [AssessmentController::class, 'update'])->middleware('teacher')->name('assessments.update');
    Route::post('/assessments/{id}/submit_review', [AssessmentController::class, 'submit_review'])->name('assessments.submit_review');
    Route::get('/assessments/{assessment_id}/students/{student_id}/reviews', [PeerReviewController::class, 'index'])->middleware('teacher')->name('reviews.index');
    Route::post('/reviews/{id}/rate', [PeerReviewController::class, 'rate'])->name('reviews.rate');
    Route::get('/reviews/top_five_reviewers', [PeerReviewController::class, 'top_five_reviewers'])->name('reviews.top_five_reviewers');
    Route::post('/assessments/{assessment_id}/students/{student_id}/assign_score', [ScoreController::class, 'assign_score'])->middleware('teacher')->name('scores.assign_score');
});

require __DIR__.'/auth.php';
