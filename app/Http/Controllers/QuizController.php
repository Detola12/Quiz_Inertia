<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Quiz;
use App\Models\QuizQuestion;
use Illuminate\Http\Request;
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

            return redirect()->route('question.index');
        }
        catch (\Exception $exception){
            DB::rollBack();
            Log::error('Something went wrong: ' . $exception);
            return Inertia::render('Quiz/Create', [
                'errors' => $exception
            ]);
        }
    }

    public function delete(Quiz $quiz)
    {
        $quiz->delete();
        return $this->index();
    }
}
