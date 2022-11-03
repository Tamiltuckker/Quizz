<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
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
    
    public function topic()
    {
        return $this->belongsTo(Topic::class);
    }

     // relation

    public function image()
    {
        return $this->morphOne(Attachment::class, 'attachmentable');
    }
}
