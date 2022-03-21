<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bansen extends Model
{
    use HasFactory;

    public static function getLatestOne(): ?Bansen
    {
        $bansen = static::query()->orderBy('id', 'desc')->first();

        if(!($bansen instanceof Bansen)){
            return null;
        }

        return $bansen;
    }
}
