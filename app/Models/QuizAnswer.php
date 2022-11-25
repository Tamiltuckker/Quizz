<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuizAnswer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'category_id',  'quiz_template_id' ,'quiz_question_id', 'quiz_option_id','point'   
       ];
}
