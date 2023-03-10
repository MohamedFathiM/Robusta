<?php

namespace App\Http\Resources\Api\Trip;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TripResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'trip' => $this->source . '-' . $this->destination,
            'stations' => $this->stations ? StationResource::collection($this->stations) : [],
            'bus' => [
                'name' => $this->bus?->name,
                'code' => $this->bus?->code
            ],
            'created_at' => $this->created_at_date_time
        ];
    }
}
