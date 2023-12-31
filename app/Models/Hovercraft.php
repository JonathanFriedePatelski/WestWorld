<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hovercraft extends Model
{
    use HasFactory;

    protected $fillable = [
        'crew_id',
        'fuel_level',
        'wear_level',
        'age',
    ];

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function crew()
    {
        return $this->belongsTo(Crew::class);
    }
}
