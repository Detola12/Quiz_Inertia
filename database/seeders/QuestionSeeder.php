<?php

namespace Database\Seeders;

use App\Models\Question;
use App\Models\Section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class QuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $questions = config('resources.questions');
        foreach ($questions as $question) {
            $section = Section::where('name', $question['section'])->first();
            if ($section) {
                Question::insertOrIgnore([
                    'text' => $question['question'],
                    'section_id' => $section->id,
                    'answer_a' => $question['answers'][0],
                    'answer_b' => $question['answers'][1],
                    'answer_c' => $question['answers'][2],
                    'answer_d' => $question['answers'][3],
                    'correct_answer' => array_search($question['correctAnswer'], $question['answers']) + 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        $this->command->info('Questions table seeded!');
    }
}
