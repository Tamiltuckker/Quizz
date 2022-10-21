<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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

}
