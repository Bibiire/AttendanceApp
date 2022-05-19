<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Cih extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guard = 'cih';
    protected $fillable = [
        'name',
        'username',
        'email',
        'center',
        'password',
        'status',
        'phone',
        'address'
    ];
    public function center()
    {
        return $this->belongsTo(Center::class);
    }
    public function attendance()
    {
        return $this->hasMany(Attendance::class);
    }
    public function member()
    {
        return $this->hasMany(Member::class);
    }
    public function newJoiner()
    {
        return $this->hasMany(NewJoiner::class);
    }

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
}

