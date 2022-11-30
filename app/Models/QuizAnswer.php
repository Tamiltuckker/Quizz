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

     // Relationship start

     public function user()
     {
         return $this->belongsTo(User::class);
     }

     public function category()
     {
         return $this->belongsTo(Category::class);
     }

     public function quiz_template()
     {
         return $this->belongsTo(QuizTemplate::class);
     }

     public function quiz_question()
     {
         return $this->belongsTo(QuizQuestion::class);
     }
     
     public function quiz_option()
     {
         return $this->belongsTo(QuizOption::class);
     }
}
