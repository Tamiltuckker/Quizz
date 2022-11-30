<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class QuizOption extends Authenticatable
{
    use HasFactory;
     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
     'quiz_question_id', 'option',  'is_correct'      
    ];

    // Relationship start

    public function quiz_question()
    {
        return $this->belongsTo(QuizQuestion::class);
    }
 
    public function quiz_answers()
    {
        return $this->hasMany(QuizAnswer::class);
    }
}
