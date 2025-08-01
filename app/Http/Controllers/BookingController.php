<?php

/* app/Http/Controllers/BookingController.php */

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    /**
     * Store a new booking.
     */
    public function store(Request $request)
    {
        // Validate input
        $validated = $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'date' => 'required|date',
            'time_slot' => 'required|string',
            'participants' => 'required|integer',
        ]);

        // Optional: Check if slot already booked
        $exists = Booking::where('room_id', $validated['room_id'])
            ->where('date', $validated['date'])
            ->where('time_slot', $validated['time_slot'])
            ->exists();

        if ($exists) {
            return response()->json(['message' => 'This time slot is already booked.'], 409);
        }

        // Create booking
        $booking = Booking::create($validated);

        return response()->json([
            'message' => 'Booking successful!',
            'booking' => $booking,
        ], 201);
    }
}
