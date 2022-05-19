<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MonthlyFeedback extends Model
{
    use HasFactory;

    protected $fillable = [
        'relocate',
        'firstname',
        'lastname',
        'phone_number',
        'home_address',
        'area',
        'firstMenteeName',
        'firstMenteePhone',
        'firstMenteeOffice',
        'firstMenteemfm',
        'secondMenteeName',
        'secondMenteePhone',
        'secondMenteeOffice',
        'secondMenteemfm',
        'lackOfficer',
        'center',
        'officer',
        'officerChange',
        'whenWho',
        'remark',
        'zone_id'
    ];
}
