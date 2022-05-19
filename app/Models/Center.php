<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Center extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'location',
    ];

    public function zone()
    {
        return $this->belongsTo(Zone::class);
    }
    public function attendance()
    {
        return $this->hasMany(Attendance::class);
    }
    public function member()
    {
        return $this->hasMany(Member::class);
    }
    public function specialRequest()
    {
        return $this->hasMany(SpecialRequest::class);
    }
    public function cih()
    {
        return $this->hasMany(Cih::class);
    }
}
