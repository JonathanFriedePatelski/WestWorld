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
        'description',
        'type',
        'severity',
        'occurred_at',
    ];

    protected $dates = [
        'timestamp',
    ];

    public function pointOfInterest()
    {
        return $this->belongsTo(PointOfInterest::class, 'point_of_interest_id');
    }

    public function crews()
    {
        return $this->belongsToMany(Crew::class);
    }

    public function getIncidentTypeAttribute()
    {
        return $this->type;
    }
}
