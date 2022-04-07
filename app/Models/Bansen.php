<?php

namespace App\Models;

use App\Events\BansenIncremented;
use App\Jobs\SendSpamMailJob;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;
use RuntimeException;

/**
 * App\Models\Bansen
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $user_id
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Bansen newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Bansen newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Bansen query()
 * @method static \Illuminate\Database\Eloquent\Builder|Bansen whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bansen whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bansen whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Bansen whereUserId($value)
 * @mixin \Eloquent
 */
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

        foreach(range(1, 2) as $i) {
            SendSpamMailJob::dispatch("latest bansen id is " . $bansen->id);
        }

        return $bansen;
    }

    public function user()
    {
        $b = new Bansen();
        $b->user->bansens[0]->user->name;
        return $this->belongsTo(User::class);
    }
}
