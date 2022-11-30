<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles;

    const ACTIVE    = '1';
    const INACTIVE  = '0';

    public static $status = [
        Self::ACTIVE   => 'Active',
        Self::INACTIVE => 'Inactive'
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'active',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    // relation

    public function image()
    {
        return $this->morphOne(Attachment::class, 'attachmentable');
    }

    public function scopeActive($query ,$value = 1)
    {
        return $query->where('active', $value);
    }

    public function quiz_answer()
    {
        return $this->hasOne(QuizAnswer::class);
    }
    
}
