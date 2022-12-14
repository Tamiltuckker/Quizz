<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\User as Authenticatable;
class Category extends Authenticatable
{
    use HasFactory;
    protected $fillable = [
        'name', 'slug', 'active'];
    
    const ACTIVE    = '1';
    const INACTIVE  = '0';

    public static $status = [
        Self::ACTIVE   =>'Active',
        Self::INACTIVE => 'Inactive'
    ];
    
    // Accessors and Mutators

    protected function Name(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ucfirst($value),
            set: fn ($value) => strtolower($value),
        );
    }
    protected function Slug(): Attribute
    {
        return Attribute::make(           
            set: fn ($value) => Str::slug($value),
        );
    }

    // Relationship start
    
    public function quiz_templates()
    {
        return $this->hasMany(QuizTemplate::class);
    }
    
    public function image()
    {
        return $this->morphOne(Attachment::class, 'attachmentable');
    }

    public function quiz_questions()
    {
        return $this->hasManyThrough(
            QuizQuestion::class,
            QuizTemplate::class,
            'category_id', // Foreign key on quiz_template table...
            'quiz_template_id', // Foreign key on quiz_template table...
            'id', // Local key on categories table...
            'id' // Local key on quiz_template table...
        );
   }
   
   public function quiz_answer()
   {
       return $this->hasOne(QuizAnswer::class);
   }
}
