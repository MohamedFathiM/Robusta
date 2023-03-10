<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Station extends Model
{
    use HasFactory;

    protected $guarded = [];

    #region Relationship
    public function trip(): BelongsTo
    {
        return $this->belongsTo(Trip::class);
    }

    public function userBooking(): HasOne
    {
        return $this->hasOne(UserBooking::class, 'station_id');
    }
    #endregion Relationship

    #region Custom
    public static function pairs(array $arr)
    {
        $arrayCount = count($arr);

        for ($i = 0; $i < $arrayCount; $i++) {
            for ($j = 0; $j < $arrayCount; $j++) {
                if ($i == $j) continue;
                $newArr[] = [$arr[$i], $arr[$j]];
            }
        }

        return $newArr;
    }
    #endregion Custom
}
