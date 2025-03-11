<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Section;
use Illuminate\Http\Request;
use Inertia\Inertia;

/**
 *
 */
class QuestionController extends Controller
{
    public function index(Request $request)
    {
        return Inertia::render('Question/Show', [
            'questions' => Question::query()
                ->with('section')
                ->when($request->search, function ($query) use ($request) {
                    $query->where('text', 'like', '%' . $request->search . '%')
                        ->orWhereHas('section', function ($query) use ($request) {
                            $query->where('name', 'like', '%' . $request->search . '%');
                        });
                })
                ->paginate(10)
                ->withQueryString(),
            'filters' => $request->only('search')
        ]);
    }

    public function create(Request $request)
    {
        if ($request->has('section_id')){
            return Inertia::render('Question/Create', [
                'sections' => Section::query()->where('id', $request->query('section_id'))->first()
            ]);
        }
        return Inertia::render('Question/Create', [
            'sections' => Section::all()
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'text' => 'required|string',
            'section' => 'required|integer',
            'options.*' => 'required|string',
            'correctAnswer' => 'required|integer'
        ]);

        Question::create([
            'text' => $validated['text'],
            'section_id' => $validated['section'],
            'correct_answer' => $validated['correctAnswer'],
            'answer_a' => $validated['options'][0],
            'answer_b' => $validated['options'][1],
            'answer_c' => $validated['options'][2] ?? null,
            'answer_d' => $validated['options'][3] ?? null,
            'answer_e' => $validated['options'][4] ?? null,
        ]);

        return redirect()->route('questions.index');
    }

    public function edit(Question $question)
    {
        return Inertia::render('Question/Edit', [
            'question' =>  [
                'id' => $question->id,
                'text' => $question->text,
                'section_id' => $question->section_id,
                'correct_answer' => $question->correct_answer,
                'answers' => [
                    $question->answer_a,
                    $question->answer_b,
                    $question->answer_c,
                    $question->answer_d,
                    $question->answer_e
                ]
            ],
            'sections' => Section::all()
        ]);
    }

    public function update(Request $request, Question $question)
    {
        $validated = $request->validate([
            'text' => 'required|string',
            'section' => 'required|integer',
            'options.*' => 'required|string',
            'correctAnswer' => 'required|integer'
        ]);

            $question->text = $validated['text'] ?? $question->text;
            $question->section_id = $validated['section'] ?? $question->section_id;
            $question->correct_answer = $validated['correctAnswer'] ?? $question->correct_answer;
            $question->answer_a = $validated['options'][0] ?? $question->answer_a;
            $question->answer_b = $validated['options'][1] ?? $question->answer_b;
            $question->answer_c = $validated['options'][2] ?? $question->answer_c;
            $question->answer_d = $validated['options'][3] ?? $question->answer_d;
            $question->answer_e = $validated['options'][4] ?? $question->answer_e;

            $question->save();


        return redirect()->route('question.index');
    }

    public function delete(Question $question)
    {
        $question->delete();
        return redirect()->route('question.index');
    }
}
