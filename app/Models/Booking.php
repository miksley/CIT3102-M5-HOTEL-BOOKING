<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'guest_name',
        'hotel_name',
        'room_type',
        'nights',
        'total_price',
        'guests',
    ];

    protected function casts(): array
    {
        return [
            'nights' => 'integer',
            'total_price' => 'decimal:2',
            'guests' => 'integer',
        ];
    }
}
