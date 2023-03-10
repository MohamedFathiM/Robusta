<?php

namespace App\Http\Resources\Api\Seat;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SeatResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'code' => $this->code,
            'trip' => $this->bus->trip->source . '-' . $this->bus->trip->destination,
            'bus_code' => $this->bus->code,
            'created_at' => $this->created_at_date_time
        ];
    }
}
