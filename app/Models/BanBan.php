<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\BanBan
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property string|null $poem
 * @method static \Illuminate\Database\Eloquent\Builder|BanBan newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BanBan newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|BanBan query()
 * @method static \Illuminate\Database\Eloquent\Builder|BanBan whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BanBan whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BanBan wherePoem($value)
 * @method static \Illuminate\Database\Eloquent\Builder|BanBan whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class BanBan extends Model
{
    public function generatePoem()
    {
        $this->poem = time();
    }
}
