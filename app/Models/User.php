<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $guard = 'user';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'image',
        'gender',
        'department',
        'level'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function inquiries()
    {
        return $this->hasMany('App\Models\Inquiry');
    }

    public function replies()
    {
        return $this->hasMany('App\Models\Reply');
    }

    public function notifications()
    {
        return $this->hasMany('App\Models\Notification');
    }

    public function unreadNotification() {
        return $this->notifications()->whereNull('read_at')->get();
    }

    public function latestNotification() {
        return $this->notifications()->latest();
    }
}
