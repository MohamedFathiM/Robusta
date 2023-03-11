<?php

namespace App\Http\Controllers\Api\Seat;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Seat\BookingRequest;
use App\Http\Resources\Api\Seat\SeatResource;
use App\Models\Seat;
use App\Models\UserBooking;
use App\Support\Traits\ApiResponse;

class BookSeatController extends Controller
{
    use ApiResponse;

    public function __invoke(BookingRequest $request)
    {
        if (
            UserBooking::where([
                'seat_id' => $request->seat_id,
                'station_id' => $request->station_id,
                'user_id' => $request->user_id
            ])->exists()
            ||
            Seat::where([
                'id' => $request->seat_id,
                'is_booking' => true
            ])->exists()
        ) {
            return $this->errorResponse(message: 'This seat is not available');
        }

        $userBooking = UserBooking::create($request->validated());
        Seat::find($request->seat_id)->update(['is_booking' => true]);

        return $this->successResponse(SeatResource::make($userBooking->seat), message: 'Congrate !');
    }
}
