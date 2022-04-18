<?php

namespace App\Models;

use App\Events\BansenIncremented;
use App\Jobs\SendSpamMailJob;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use RuntimeException;

/**
 * App\Models\Bansen
 *
 * @property int $id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property int $user_id
 * @property-read User|null $user
 * @method static Builder|Bansen newModelQuery()
 * @method static Builder|Bansen newQuery()
 * @method static Builder|Bansen query()
 * @method static Builder|Bansen whereCreatedAt($value)
 * @method static Builder|Bansen whereId($value)
 * @method static Builder|Bansen whereUpdatedAt($value)
 * @method static Builder|Bansen whereUserId($value)
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

    public function user(): ?User
    {
        $row = $this->belongsTo(User::class)->first();
        assert($row instanceof User);
        return $row;
    }
}
