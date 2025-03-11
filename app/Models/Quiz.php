<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Quiz extends Model
{
    use HasFactory;
    protected $fillable = ['name','description', 'question_count'];

    public function question()
    {
        return $this->belongsToMany(Question::class, 'quiz_questions');
    }

    public function user_result()
    {
        return $this->hasOne(UserResult::class);
    }
}
