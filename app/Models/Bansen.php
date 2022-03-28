<?php

namespace App\Models;

use App\Events\BansenIncremented;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use RuntimeException;

class Bansen extends Model
{
    use HasFactory;

    public static function getLatestOne(): ?Bansen
    {
        $bansen = static::query()->orderBy('id', 'desc')->first();

        if (!($bansen instanceof Bansen)) {
            return null;
        }

        return $bansen;
    }

    public static function insertOne(): Bansen
    {
        $bansen = new Bansen();
        if (false === $bansen->save()) {
            throw new RuntimeException("Bansen::insertOne failed.");
        }

        Cache::put('last_update_at', time(), 10);

        BansenIncremented::dispatch($bansen->id);

        return $bansen;
    }
}
