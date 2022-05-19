<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuditTrailDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'auditTrailLinkId',
        'fieldName',
        'oldValue',
        'newValue',
        'linkId',
    ];
}
