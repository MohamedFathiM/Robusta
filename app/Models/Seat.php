<?php

namespace App\Models;

use App\Support\Traits\Timestamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Seat extends Model
{
    use HasFactory, Timestamp;

    protected $guarded = [];

    #region Relationship
    public function userBooking(): HasOne
    {
        return $this->hasOne(UserBooking::class, 'seat_id');
    }

    public function bus(): BelongsTo
    {
        return $this->belongsTo(Bus::class, 'bus_id');
    }
    #endregion Relationship
}
