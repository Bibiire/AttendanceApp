<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpecialRequest extends Model
{
    use HasFactory;
    protected $fillable = [
        'fname',
        'lname',
        'dob',
        'gender',
        'phoneNo',
        'maritalStatus',
        'address',
        'email',
        'center_id',
        'attendance',
        'prevApply',
        'finCounsel',
        'finSituation',
        'totalSum',
        'need',
        'pastorComment',
        'employmentStatus',
        'status',
        'RequestDetails'
    ];
    public function center()
    {
        return $this->belongsTo(Center::class);
    }
}
