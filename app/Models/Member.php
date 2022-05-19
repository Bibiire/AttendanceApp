<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $fillable = [
        'family_name',
        'other_name',
        'date_of_birth',
        'gender',
        'marital_status',
        'home_address',
        'phone_number',
        'center_id',
        'email',
        'age',
        'age_band',
        'stateOfOrigin',
        'position'
    ];

    public function cih()
    {
        return $this->belongsTo(Cih::class);
    }
}
