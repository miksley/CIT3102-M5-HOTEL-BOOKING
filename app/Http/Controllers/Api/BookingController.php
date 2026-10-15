<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Booking;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        $query = Booking::query();

        if ($request->filled('room_type')) {
            $query->where('room_type', $request->query('room_type'));
        }

        if ($request->filled('nights')) {
            $query->where('nights', $request->query('nights'));
        }

        return response()->json($query->get());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'guest_name' => 'required|string|max:255',
            'hotel_name' => 'required|string|max:255',
            'room_type' => 'required|string|max:100',
            'nights' => 'required|integer|min:1',
            'total_price' => 'required|numeric|min:0',
            'guests' => 'required|integer|min:1',
        ]);

        $booking = Booking::create($validated);

        return response()->json($booking, 201);
    }

    public function show(string $id)
    {
        $booking = Booking::findOrFail($id);

        return response()->json($booking);
    }

    public function update(Request $request, string $id)
    {
        $booking = Booking::findOrFail($id);

        $validated = $request->validate([
            'guest_name' => 'sometimes|required|string|max:255',
            'hotel_name' => 'sometimes|required|string|max:255',
            'room_type' => 'sometimes|required|string|max:100',
            'nights' => 'sometimes|required|integer|min:1',
            'total_price' => 'sometimes|required|numeric|min:0',
            'guests' => 'sometimes|required|integer|min:1',
        ]);

        $booking->update($validated);

        return response()->json($booking);
    }

    public function destroy($id)
    {
        $booking = Booking::findOrFail($id);
        $booking->delete();

        return response()->noContent();
    }

}
