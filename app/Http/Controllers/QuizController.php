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
        $validated = Validator::make($request->all(),[
            'quiz' => 'required|string|unique:quizzes,name',
            'question' => 'required|array'
        ]);
        $validated->after(function ($validated) use ($request){
            if (count($request->question) < 10){
                $validated->errors()->add('question_count','Questions must be at least 10');
            }
        });
        $validated->validate();

        DB::beginTransaction();
        try {
            $quiz = Quiz::create([
                'name' => $request->quiz,
                'description' => $request->description,
                'question_count' => count($request->question)
                ]);

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
            return Inertia::render('Quiz/Admin/Create', [
                'errors' => $exception
            ]);
        }
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
        Gate::authorize('edit', [Auth::user(),Quiz::class]);
        $request->validate([
            'quiz' => 'required|string',
            'question' => 'required|array',
            'removed' => 'nullable|array'
        ]);

        DB::beginTransaction();
        try {
            $quiz->question()->sync($request->question);
            $quiz->question_count = count($request->question);
            $quiz->save();
            DB::commit();
            return redirect()->route('quiz.index');
        }
        catch (\Exception $exception){
            DB::rollBack();
            Log::error('Something went wrong: ' . $exception);
            return Inertia::render('Quiz/Admin/Edit', [
                'errors' => $exception
            ]);
        }
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
//        dd(UserResult::with('quiz')->where('user_id', Auth::id())->get());
        return Inertia::render('Quiz/User/Result', [
            'user_result' => UserResult::with('quiz')->where('user_id', Auth::id())->get()
        ]);
    }
}
