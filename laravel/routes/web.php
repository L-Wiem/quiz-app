<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuizController;


Route::get('/', [QuizController::class, 'showCategories'])->name('categories');
Route::get('/quiz/{id}', [QuizController::class, 'startQuiz'])->name('quiz.start');
Route::post('/quiz/check', [QuizController::class, 'checkAnswers'])->name('quiz.check');
