<?php

namespace App\Models;

use App\Support\Traits\Timestamp;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Trip extends Model
{
    use HasFactory, Timestamp;

    protected $guarded = [];

    #region Scopes
    public function scopeFilter(Builder $query, $request): Builder
    {
        return $query->where('source', 'like', "%$request->search%")
            ->orWhere('destination', 'like', "%$request->search%");
    }
    #endregion Scopes

    #region Relationship
    public function stations(): HasMany
    {
        return $this->hasMany(Station::class);
    }

    public function bus()
    {
        return $this->hasOne(Bus::class, 'trip_id');
    }
    #endregion Relationship
}
