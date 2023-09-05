<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'title',
        'latitude',
        'longitude',
        'description',
        'type',
        'narrative_level',
    ];

    public function incidents()
    {
        return $this->hasMany(Incident::class, 'point_of_interest', 'title');
    }

    
}
