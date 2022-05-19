<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;

    protected $fillable = [
        'activity',
        'femaleAdult',
        'maleAdult',
        'femaleYouth',
        'maleYouth',
        'femaleTeen',
        'maleTeen',
        'femaleChild',
        'maleChild',
        'visit',
        'covid',
        'covidReason',
        'stateOfFlock',
        'finalRemark',
        'totalMale',
        'totalFemale',
        'totalAttendance',
        'startTime',
        'endTime',
        'center_id'
    ];

    
}
