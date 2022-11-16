<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Str;

class QuizTemplate extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    protected function Slug(): Attribute
    {
        return Attribute::make(           
            set: fn ($value) => Str::slug($value),
        );
    }

}
