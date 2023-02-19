<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Maize\Markable\Markable;
use Maize\Markable\Models\Like;

class Shalawat extends Model
{
    use HasFactory;
    use Markable;

    public function muhud()
    {
        return $this->belongsTo(Muhud::class);
    }

    public function audio()
    {
        return $this->hasMany(Audio::class);
    }

    protected static $marks = [
        Like::class,
    ];
}
