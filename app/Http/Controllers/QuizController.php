<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Quiz;
use App\Models\QuizQuestion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Inertia\Inertia;

class QuizController extends Controller
{
    public function index()
    {
        return Inertia::render('Quiz/Show', [
            'quizzes' => Quiz::all()
        ]);
    }

    public function create(Request $request)
    {
        return Inertia::render('Quiz/Create', [
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
        $request->validate([
            'quiz' => 'required|string|unique:quizzes,name',
            'question' => 'required|array'
        ]);
        DB::beginTransaction();
        try {
            $quiz = Quiz::create(['name' => $request->quiz]);

            foreach ($request->question as $item) {
                QuizQuestion::create([
                    'quiz_id' => $quiz->id,
                    'question_id' => $item
                ]);
            }
            DB::commit();

            return redirect()->route('quiz.index');
        }
        catch (\Exception $exception){
            DB::rollBack();
            Log::error('Something went wrong: ' . $exception);
            return Inertia::render('Quiz/Create', [
                'errors' => $exception
            ]);
        }
    }

    public function edit(Request $request, Quiz $quiz)
    {
        return Inertia::render('Quiz/Edit', [
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
        $request->validate([
            'quiz' => 'required|string',
            'question' => 'required|array',
            'removed' => 'nullable|array'
        ]);

        DB::beginTransaction();
        try {
            $quiz->question()->sync($request->question);
            DB::commit();
            return redirect()->route('quiz.index');
        }
        catch (\Exception $exception){
            DB::rollBack();
            Log::error('Something went wrong: ' . $exception);
            return Inertia::render('Quiz/Edit', [
                'errors' => $exception
            ]);
        }
    }

    public function delete(Quiz $quiz)
    {
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
            'answer.*' => 'array'
        ]);

        $data = [];
        foreach ($request->answer as $answer) {
            $data[$answer[0]] = $answer[1];
        }
        

        DB::table('user_test_details')->insert([
            'user_id' => Auth::id(),
            'quiz_id' => $quiz->id,
            'data' => json_encode($data),
            'created_at' => now(),
            'updated_at' => now()
        ]);
        return redirect('/dashboard');
    }
}
