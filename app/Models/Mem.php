<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mem extends Model
{
    use HasFactory;
    protected $fillable = [
        'family_name',
        'email',
        'center_id',
        'password',
    ];
}
