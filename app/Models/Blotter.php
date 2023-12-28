<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blotter extends Model
{
    use HasFactory;

    protected $fillable = [
        'complainant',
        'defendant',
        'incident_description',
        'date_occured',
        'status',
        'schedule',
        'remarks',
        'officer_involved',
    ];

    public function officerInvolved()
    {
        return $this->belongsTo(Official::class, 'officer_involved');
    }
}
