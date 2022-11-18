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
     'option',  'is_correct'      
    ];

    // Relationship start

    public function quizquestion()
    {
        return $this->hasMany(QuizQuestion::class);
    }
}
