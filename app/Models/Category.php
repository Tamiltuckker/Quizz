<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Support\Str;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'slug', 'active'];
    
    const ACTIVE    = '1';
    const INACTIVE  = '0';

   public static $status = [
        Self::ACTIVE =>'Active',
        Self::INACTIVE => 'Inactive'
    ];
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

}
