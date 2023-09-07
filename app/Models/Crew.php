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

    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function users()
    {
        return $this->hasMany(User::class);
    }

    public function incidents()
    {
        return $this->belongsToMany(Incident::class);
    }

    public function hovercraft()
    {
        return $this->hasOne(Hovercraft::class);
    }
}
