<?php

namespace App\Listeners;

use App\Models\UserResult;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Auth;

class ScoreQuiz
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(object $event): void
    {
        $quiz_question = $event->quiz->question;
        $test_answers = $event->data;
        $quiz_answer = [];
        $score = 0;
        foreach ($quiz_question as $index => $question) {
            $quiz_answer[$question->id] = match ($question->correct_answer){
                '1' => 'a',
                '2' => 'b',
                '3' => 'c',
                '4' => 'd',
                '5' => 'e'
            };
        }

        foreach ($test_answers as $index => $test_answer) {
            if ($quiz_answer[$index] == $test_answer){
                $score++;
            }
        }

        UserResult::create([
            'user_id' => Auth::user()->id,
            'quiz_id' => $event->quiz->id,
            'score' => $score,
            'question_answered' => count($test_answers)
        ]);

    }
}
