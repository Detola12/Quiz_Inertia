<?php

use App\Http\Controllers\ProfileController;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\Section;
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
Route::middleware(['auth'])->group(function () {

    Route::get('/section', [\App\Http\Controllers\SectionController::class, 'index'])->can('viewAll', Section::class)->name('section.index');

    Route::get('/section/create', [\App\Http\Controllers\SectionController::class, 'create'])->can('create', Section::class)->name('section.create');

    Route::post('/section/create', [\App\Http\Controllers\SectionController::class, 'store'])->can('create', Section::class)->name('section.store');

    Route::get('/section/edit/{section}', [\App\Http\Controllers\SectionController::class, 'edit'])->can('edit', Section::class)->name('section.edit');

    Route::get('/section/{section}/questions', [\App\Http\Controllers\SectionController::class, 'getQuestions'])->can('viewAll', Section::class)->name('section.questions');

    Route::patch('/section/edit/{section}', [\App\Http\Controllers\SectionController::class, 'update'])->can('edit', Section::class)->name('section.update');

    Route::delete('/section/{section}', [\App\Http\Controllers\SectionController::class, 'delete'])->can('delete', Section::class)->name('section.delete');

});

/************************ Question Routes ***************************/
Route::middleware('auth')->group(function () {
    Route::get('/questions', [\App\Http\Controllers\QuestionController::class, 'index'])->can('viewAll', Question::class)->name('question.index');

    Route::get('/question/create', [\App\Http\Controllers\QuestionController::class, 'create'])->can('create', Question::class)->name('question.create');

    Route::post('/question/create', [\App\Http\Controllers\QuestionController::class, 'store'])->can('create', Question::class)->name('question.store');

    Route::get('/question/edit/{question}', [\App\Http\Controllers\QuestionController::class, 'edit'])->can('edit', Question::class)->name('question.edit');

    Route::patch('/question/edit/{question}', [\App\Http\Controllers\QuestionController::class, 'update'])->can('update', Question::class)->name('question.update');

    Route::delete('/question/{question}', [\App\Http\Controllers\QuestionController::class, 'delete'])->can('delete', Question::class)->name('question.delete');

});

/*************************** Quiz Routes ********************************/
Route::middleware(['auth'])->group(function () {
    Route::get('/quiz', [\App\Http\Controllers\QuizController::class, 'index'])->name('quiz.index');

    Route::get('/quiz/create', [\App\Http\Controllers\QuizController::class, 'create'])->can('create', Quiz::class)->name('quiz.create');

    Route::post('/quiz/create', [\App\Http\Controllers\QuizController::class, 'store'])->can('create', Quiz::class)->name('quiz.store');

    Route::get('/quiz/edit/{quiz}', [\App\Http\Controllers\QuizController::class, 'edit'])->name('quiz.edit');

    Route::patch('/quiz/edit/{quiz}', [\App\Http\Controllers\QuizController::class, 'update'])->name('quiz.update');

    Route::delete('/quiz/{quiz}', [\App\Http\Controllers\QuizController::class, 'delete'])->name('quiz.delete');

});
/**************************** Test Routes *********************************/
Route::middleware('auth')->group(function () {
    Route::get('/test/take/{quiz}', [\App\Http\Controllers\QuizController::class, 'take'])->name('quiz.take');
    Route::get('/result/show', [\App\Http\Controllers\QuizController::class, 'showResult'])->name('show.result');
    Route::post('/test/take/{quiz}', [\App\Http\Controllers\QuizController::class, 'submit'])->name('quiz.submit');
});

require __DIR__.'/auth.php';
