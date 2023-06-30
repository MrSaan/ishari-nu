<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rowi extends Model
{
    use HasFactory;

    public function muhud()
    {
        return $this->belongsTo(Muhud::class);
    }

    public function rowiAudio()
    {
        return $this->hasMany(RowiAudio::class);
    }
}
