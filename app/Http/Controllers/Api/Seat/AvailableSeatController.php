<?php

namespace App\Http\Controllers\Api\Seat;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Seat\SeatResource;
use App\Models\Seat;
use App\Support\Traits\ApiResponse;
use Illuminate\Http\Request;

class AvailableSeatController extends Controller
{
    use ApiResponse;

    public function __invoke(Request $request)
    {
        $availableSeats = Seat::wheredoesnthave('userBooking')->paginate($request->per_page ?? 15);

        return $this->paginateResponse(SeatResource::collection($availableSeats), $availableSeats);
    }
}
