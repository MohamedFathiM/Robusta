<?php

use App\Models\Seat;
use App\Models\Station;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('user_bookings', function (Blueprint $table) {
            $table->foreignIdFor(Seat::class);
            $table->foreignIdFor(Station::class);
            $table->foreignIdFor(User::class);

            $table->unique(['seat_id', 'station_id']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('user_bookings');
    }
};
