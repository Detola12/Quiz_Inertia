<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});

/************************ Section Routes ***************************/
Route::middleware('auth')->group(function () {

    Route::get('/section', [\App\Http\Controllers\SectionController::class, 'index'])->name('section.index');

    Route::get('/section/create', [\App\Http\Controllers\SectionController::class, 'create'])->name('section.create');

    Route::post('/section/create', [\App\Http\Controllers\SectionController::class, 'store'])->name('section.store');

    Route::get('/section/edit/{section}', [\App\Http\Controllers\SectionController::class, 'edit'])->name('section.edit');

    Route::patch('/section/edit/{section}', [\App\Http\Controllers\SectionController::class, 'update'])->name('section.update');

});

/************************ Question Routes ***************************/
Route::middleware('auth')->group(function () {
    Route::get('/questions', [\App\Http\Controllers\QuestionController::class, 'index'])->name('question.index');

    Route::get('/question/create', [\App\Http\Controllers\QuestionController::class, 'create'])->name('question.create');

    Route::post('/question/create', [\App\Http\Controllers\QuestionController::class, 'store'])->name('question.store');

    Route::get('/question/edit/{question}', [\App\Http\Controllers\QuestionController::class, 'edit'])->name('question.edit');

    Route::patch('/question/edit/{question}', [\App\Http\Controllers\QuestionController::class, 'update'])->name('question.update');

    Route::delete('/question/{question}', [\App\Http\Controllers\QuestionController::class, 'delete'])->name('question.delete');

});

/*************************** Quiz Routes ********************************/
Route::middleware('auth')->group(function () {
    Route::get('/quiz', [\App\Http\Controllers\QuizController::class, 'index'])->name('quiz.index');

    Route::get('/quiz/create', [\App\Http\Controllers\QuizController::class, 'create'])->name('quiz.create');

    Route::post('/quiz/create', [\App\Http\Controllers\QuizController::class, 'store'])->name('quiz.store');

    Route::get('/quiz/edit/{quiz}', [\App\Http\Controllers\QuizController::class, 'edit'])->name('quiz.edit');

    Route::patch('/quiz/edit/{quiz}', [\App\Http\Controllers\QuizController::class, 'update'])->name('quiz.update');

    Route::delete('/quiz/{quiz}', [\App\Http\Controllers\QuizController::class, 'delete'])->name('quiz.delete');

});
/**************************** Test Routes *********************************/
Route::middleware('auth')->group(function () {
    Route::get('/test/take/{quiz}', [\App\Http\Controllers\QuizController::class, 'take'])->name('quiz.take');
    Route::post('/test/take/{quiz}', [\App\Http\Controllers\QuizController::class, 'submit'])->name('quiz.submit');
});

require __DIR__.'/auth.php';
