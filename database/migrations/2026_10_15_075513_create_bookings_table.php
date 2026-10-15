<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
{
    Schema::create('bookings', function (Blueprint $table) {
        $table->id();
        $table->string('guest_name');
        $table->string('hotel_name');
        $table->string('room_type');
        $table->unsignedInteger('nights');
        $table->decimal('total_price', 10, 2);
        $table->unsignedInteger('guests');
        $table->timestamps();
    });
}
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
