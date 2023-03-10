<?php

namespace App\Http\Controllers\Api\Trip;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\Trip\TripRequest;
use App\Http\Resources\Api\Trip\TripResource;
use App\Models\Bus;
use App\Models\Seat;
use App\Models\Station;
use App\Models\Trip;
use App\Support\Traits\ApiResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;

class StoreController extends Controller
{
    use ApiResponse;

    public function __invoke(TripRequest $request)
    {
        DB::beginTransaction();
        $trip = Trip::create(Arr::except($request->validated(), ['stations']));
        $bus = $trip->bus()->create([
            'name' => 'Bus_' . uniqid(),
            'code' => generate_unique_code(Bus::class, 'code', 4, false, true, false)
        ]);
        $bus->seats()->createMany($this->getSeats($request));
        $trip->stations()->createMany($this->transformStations($request));

        DB::commit();

        return $this->successResponse(TripResource::make($trip), message: 'Success Created');
    }

    private function transformStations(Request $request): array
    {
        $allPossibleStation = Station::pairs(array_merge([$request->source], $request->stations, [$request->destination]));

        foreach ($allPossibleStation as $station) {
            $stations[] = ['source' => $station[0], 'destination' => $station[1]];
        }

        return $stations;
    }

    private function getSeats(Request $request): array
    {
        for ($i = 0; $i <= 12; $i++) {
            $seats[] = ['code' => generate_unique_code(Seat::class, 'code', 6, false, true, false)];
        }

        return $seats;
    }
}
