<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RowiAudio extends Model
{
    use HasFactory;

    public function pimpinan()
    {
        return $this->belongsTo(Pimpinan::class);
    }

    public function rowi()
    {
        return $this->belongsTo(Rowi::class);
    }
}
