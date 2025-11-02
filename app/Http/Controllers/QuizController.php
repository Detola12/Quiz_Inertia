<?php

namespace App\Http\Controllers;

use App\Events\QuizSubmitted;
use App\Models\Question;
use App\Models\Quiz;
use App\Models\QuizQuestion;
use App\Models\Section;
use App\Models\UserResult;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;

class QuizController extends Controller
{
    public function index()
    {
        if (Auth::user()->is_admin) {
            return Inertia::render('Quiz/Admin/Show', [
                'quizzes' => Quiz::all()
            ]);
        }
        return Inertia::render('Quiz/User/Show', [
            'quizzes' => Quiz::all()
        ]);
    }

    public function create(Request $request)
    {
        Gate::authorize('create', Quiz::class);
        return Inertia::render('Quiz/Admin/Create', [
            'questions' => Question::query()
                ->with('section')
                ->when($request->search, function ($query) use ($request) {
                    $query->where('text', 'like', '%' . $request->search . '%')
                        ->orWhereHas('section', function ($query) use ($request) {
                            $query->where('name', 'like', '%' . $request->search . '%');
                        });
                })->get(),
            'filters' => $request->only('search')
        ]);
    }

    public function store(Request $request)
    {
        Gate::authorize('create', Quiz::class);
        $this->validateQuiz($request);

        DB::transaction(function () use ($request) {
            $quiz = $this->createQuiz($request);
            $this->syncQuestions($quiz, $request->question);
        });

        return redirect()->route('quiz.index');
    }

    public function edit(Request $request, Quiz $quiz)
    {
        Gate::authorize('edit', [Auth::user(),Quiz::class]);
        return Inertia::render('Quiz/Admin/Edit', [
            'quiz_questions' => $quiz->question()->get(),
            'quiz' => $quiz->only([
                'id','name'
            ]),
            'questions' => Question::query()
                ->with('section')
                ->when($request->search, function ($query) use ($request) {
                    $query->where('text', 'like', '%' . $request->search . '%')
                        ->orWhereHas('section', function ($query) use ($request) {
                            $query->where('name', 'like', '%' . $request->search . '%');
                        });
                })->get(),
            'filters' => $request->only('search')
        ]);
    }

    public function update(Request $request, Quiz $quiz)
    {
        Gate::authorize('edit', [Auth::user(), Quiz::class]);
        $this->validateQuiz($request, $quiz);

        DB::transaction(function () use ($request, $quiz) {
            $this->updateQuiz($quiz, $request);
            $this->syncQuestions($quiz, $request->question);
        });

        return redirect()->route('quiz.index');
    }

    public function delete(Quiz $quiz)
    {
        Gate::authorize('delete', $quiz);
        $quiz->delete();
        return $this->index();
    }

    public function take(Quiz $quiz)
    {
        return Inertia::render('Quiz/Take', [
            'title' => $quiz->name,
            'id' => $quiz->id,
            'questions' => $quiz->question,
            'count' => $quiz->question->count()
        ]);
    }

    public function submit(Request $request, Quiz $quiz)
    {
        $request->validate([
            'answer.*' => 'nullable|array'
        ]);

        $data = [];
        foreach ($request->answer as $index => $answer) {
            if ($answer != null)
            $data[$answer[0]] = $answer[1];
        }

        DB::table('user_test_details')->insert([
            'user_id' => Auth::id(),
            'quiz_id' => $quiz->id,
            'data' => json_encode($data),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        QuizSubmitted::dispatch($quiz, $data);
        return redirect('/dashboard');
    }

    public function showResult()
    {
        return Inertia::render('Quiz/User/Result', [
            'user_result' => UserResult::with('quiz')->where('user_id', Auth::id())->get()
        ]);
    }

    private function validateQuiz(Request $request, Quiz $quiz = null)
    {
        $rules = [
            'quiz' => 'required|string|unique:quizzes,name' . ($quiz ? ',' . $quiz->id : ''),
            'question' => 'required|array|min:10',
        ];

        $validator = Validator::make($request->all(), $rules);

        $validator->validate();
    }

    private function createQuiz(Request $request): Quiz
    {
        return Quiz::create([
            'name' => $request->quiz,
            'description' => $request->description,
            'question_count' => count($request->question),
        ]);
    }

    private function updateQuiz(Quiz $quiz, Request $request): void
    {
        $quiz->update([
            'name' => $request->quiz,
            'description' => $request->description,
            'question_count' => count($request->question),
        ]);
    }

    private function syncQuestions(Quiz $quiz, array $questions): void
    {
        $quiz->question()->sync($questions);
    }
}
