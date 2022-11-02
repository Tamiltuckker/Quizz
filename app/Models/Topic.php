<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Casts\Attribute;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class Topic extends Authenticatable

{
    use HasFactory;

    protected $fillable = ['category_id', 'name', 'slug', 'active'];
    
    const ACTIVE    = '1';
    const INACTIVE  = '0';

    public static $status = [
        Self::ACTIVE   =>'Active',
        Self::INACTIVE => 'Inactive'
    ];

    // Accessors and Mutators 
    
    protected function Slug(): Attribute
    {
        return Attribute::make(           
            set: fn ($value) => Str::slug($value),
        );
    }
    protected function Name(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => ucfirst($value),
            set: fn ($value) => strtolower($value),
        );
    }
    
    // Relationship start

    public function categories()
    {
        return $this->hasMany(Category::class);
    }
     // relation

    public function image()
    {
        return $this->morphOne(Attachment::class, 'attachmentable');
    }
}
