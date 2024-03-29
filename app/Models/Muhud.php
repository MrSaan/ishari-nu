<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Muhud extends Model
{
    use HasFactory;

    public function shalawat()
    {
        return $this->hasMany(Shalawat::class);
    }

    public function rowi()
    {
        return $this->hasMany(Rowi::class);
    }
}
