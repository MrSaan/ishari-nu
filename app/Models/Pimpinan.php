<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pimpinan extends Model
{
    use HasFactory;

    public function audio()
    {
        return $this->hasMany(Audio::class);
    }
}
