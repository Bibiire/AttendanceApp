<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Zone extends Model
{
    use HasFactory;
    protected $fillable = [
        'name'
    ];
    public function center()
    {
        return $this->hasMany(Center::class);
    }
    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
