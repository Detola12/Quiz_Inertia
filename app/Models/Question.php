<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Question extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function section() : BelongsTo
    {
        return $this->belongsTo(Section::class);
    }

    public function quiz()
    {
        return $this->belongsToMany(Quiz::class, 'quiz_questions');
    }
}
