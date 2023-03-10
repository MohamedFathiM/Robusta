<?php

namespace App\Http\Requests\Api\Seat;

use Illuminate\Foundation\Http\FormRequest;

class BookingRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'seat_id' => 'required|exists:seats,id',
            'station_id' => 'required|exists:stations,id|unique:user_bookings,station_id,Null,id,seat_id,' . $this->seat_id,
            'user_id' => 'required|exists:users,id',
        ];
    }
}
