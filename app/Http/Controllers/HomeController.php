<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Room;
use App\Models\Booking;
use Carbon\Carbon;

class HomeController extends Controller
{

    public function room_details($id)
    {
        $room = Room::findOrFail($id);

        return view('home.room_details', compact('room'));
    }



    public function book_room(Request $request)
    {
        $request->validate([
            'room_id'    => 'required',
            'name'       => 'required',
            'email'      => 'required|email',
            'phone'      => 'required',
            'start_date' => 'required|date|after_or_equal:today',
            'end_date'   => 'required|date|after:start_date',
        ]);

        // Check if the room is already booked for the selected dates
        $booking = Booking::where('room_id', $request->room_id)
            ->where('start_date', '<', $request->end_date)
            ->where('end_date', '>', $request->start_date)
            ->first();

        if ($booking) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'This room is already booked for the selected dates.');
        }
        Booking::create([
            'room_id'    => $request->room_id,
            'name'       => $request->name,
            'email'      => $request->email,
            'phone'      => $request->phone,
            'start_date' => $request->start_date,
            'end_date'   => $request->end_date,
        ]);

        return redirect()->back()->with('success', 'Room booked successfully.');
    }
}
