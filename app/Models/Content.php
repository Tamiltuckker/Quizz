<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Str;

class Content extends Model
{
    use HasFactory;
    
    protected $fillable = ['slug','title','description','active'];
    
    const ACTIVE    = '1';
    const INACTIVE  = '0';

    public static $status = [
        Self::ACTIVE   =>'Active',
        Self::INACTIVE => 'Inactive'
    ];

    protected function Slug(): Attribute
    {
        return Attribute::make(           
            set: fn ($value) => Str::slug($value),
        );
    }
}
