<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incident extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'incident_id',
        'point_of_interest_id',
        'latitude',
        'longitude',
        'type',
        'severity',
        'occurred_at',
    ];

    protected $dates = [
        'timestamp',
    ];

    public function location()
    {
        return $this->belongsTo(Location::class, 'point_of_interest', 'title');
    }

    public function getIncidentTypeAttribute()
    {
        return $this->type;
    }
}
