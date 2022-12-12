<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Lab404\Impersonate\Models\Impersonate;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Carbon\Carbon;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens, HasFactory, Notifiable, HasRoles, Impersonate;

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
        'facebook_id'
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

    protected function createdAt(): Attribute
    {
        return new Attribute(
            get: fn ($value) =>  Carbon::parse($value)->format('M'),
        );
    }

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
