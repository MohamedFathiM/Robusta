<?php

use App\Http\Controllers\Api\Auth\{
    LoginController,
    RegisterController
};
use App\Http\Controllers\Api\Seat\{
    AvailableSeatController,
    BookSeatController
};
use App\Http\Controllers\Api\Trip\{
    ListController,
    StoreController
};
use Illuminate\Support\Facades\Route;


Route::post('register', RegisterController::class);
Route::post('login', LoginController::class);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('trips', ListController::class);
    Route::post('trips', StoreController::class);

    Route::get('empty_seats', AvailableSeatController::class);
    Route::post('book_seat', BookSeatController::class);
});
