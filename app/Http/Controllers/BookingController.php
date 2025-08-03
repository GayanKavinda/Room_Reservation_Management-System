<?php
// app/Http/Controllers/BookingController.php
namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'room_id' => 'required|exists:rooms,id',
            'date' => 'required|date',
            'time_slot' => 'required|string',
            'participants' => 'required|integer',
        ]);

        $exists = Booking::where('room_id', $validated['room_id'])
            ->where('date', $validated['date'])
            ->where('time_slot', $validated['time_slot'])
            ->exists();

        if ($exists) {
            return response()->json(['message' => 'This time slot is already booked.'], 409);
        }

        $booking = Booking::create([
            'user_id' => Auth::id(),
            'room_id' => $validated['room_id'],
            'date' => $validated['date'],
            'time_slot' => $validated['time_slot'],
            'participants' => $validated['participants'],
        ]);

        return response()->json([
            'message' => 'Booking successful!',
            'booking' => $booking,
        ], 201);
    }
}