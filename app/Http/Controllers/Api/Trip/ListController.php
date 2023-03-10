<?php

namespace App\Http\Controllers\Api\Trip;

use App\Http\Controllers\Controller;
use App\Http\Resources\Api\Trip\TripResource;
use App\Models\Trip;
use App\Support\Traits\ApiResponse;
use Illuminate\Http\Request;

class ListController extends Controller
{
    use ApiResponse;

    public function __invoke(Request $request)
    {
        $trips = Trip::query()->filter($request)->paginate($request->per_page ?? 15);

        return $this->paginateResponse(TripResource::collection($trips), $trips);
    }
}
