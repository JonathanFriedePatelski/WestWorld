<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Crew extends Model
{
    use HasFactory;

    protected $fillable = [
        'call_sign',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function crewIncident()
    {
        return $this->hasMany(Incident::class);
    }

    public function hovercraft()
    {
        return $this->hasOne(Hovercraft::class)->latestOfMany();
    }
}
