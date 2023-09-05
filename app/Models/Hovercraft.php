<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hovercraft extends Model
{
    use HasFactory;

    protected $fillable = [
        'fuel_level',
        'wear_level',
        'age',
    ];

    public function crew()
    {
        return $this->hasOne(Crew::class)->latestOfMany();
    }
}
