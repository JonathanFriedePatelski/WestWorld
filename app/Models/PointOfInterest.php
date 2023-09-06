<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PointOfInterest extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $table = 'points_of_interest';

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
        return $this->hasMany(Incident::class);
    }
}
