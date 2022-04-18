<?php

namespace App\Service;

use App\Models\Bansen;

class BansenService
{
    public static function getById(int $id): ?Bansen
    {
        return Bansen::query()->where('id', $id)->first();
    }
}
