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
        'quiz_template_id','question','description'       
    ];
    
     // Relationship start     

     public function quiz_template()
    {
        return $this->belongsTo(QuizTemplate::class);
    }

    public function quiz_options()
    {
        return $this->hasMany(QuizOption::class);
    }
      // relation
 
    public function image()
    {
        return $this->morphOne(Attachment::class, 'attachmentable');
    }
}
