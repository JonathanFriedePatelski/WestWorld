<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Incident extends Model
{
    use HasFactory;

    protected $fillable = [
        'incident_id',
        'timestamp',
        'latitude',
        'longitude',
        'type',
        'severity',
        'point_of_interest',
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
