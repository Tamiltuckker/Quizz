<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class QuizQuestion extends Authenticatable
{
    use HasFactory;
     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'question','description'       
    ];
    
     // Relationship start     

     public function quizoptions()
     {
         return $this->belongsTo(QuizOption::class);
     }
      // relation
 
     public function image()
     {
         return $this->morphOne(Attachment::class, 'attachmentable');
     }
}
