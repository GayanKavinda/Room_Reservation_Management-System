<?php

/* app/Http/Controllers/RoomController.php */

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Search available rooms based on filters
     */
    public function search(Request $request)
    {
        // Validate input
        $validated = $request->validate([
            'date' => 'required|date',
            'location' => 'required|string',
            'participants' => 'required|integer',
            'roomType' => 'nullable|string',
        ]);

        // Build query
        $query = Room::with('location')
            ->whereHas('location', function ($q) use ($validated) {
                $q->where('name', $validated['location']);
            })
            ->where('capacity_min', '<=', $validated['participants'])
            ->where('capacity_max', '>=', $validated['participants']);

        if (!empty($validated['roomType'])) {
            $query->where('type', $validated['roomType']);
        }

        $rooms = $query->get();

        // Example: You could add date/time slot availability filtering here too

        return response()->json([
            'rooms' => $rooms,
            'availableTimeSlots' => [
                '09:00 AM',
                '10:00 AM',
                '11:00 AM',
                '12:00 PM',
                '01:00 PM',
                '02:00 PM',
                '03:00 PM',
                '04:00 PM',
            ]
        ]);
    }
}
