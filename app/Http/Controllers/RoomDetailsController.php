<?php

namespace App\Http\Controllers;

session_start();

use Illuminate\Http\Request;
use App\Models\Rooms;
use App\Models\Booking;
use Illuminate\Support\Facades\DB;

class BookingController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'phone' => 'required|string',
            'email' => 'required|string|email',
            'trip-start' => 'required|string',
            'trip-end' => 'required|string',
            'special-request' => 'required|string',
        ]);

        $guest_name = $request->input('name');
        $phone_number = $request->input('phone');
        $email = $request->input('email');
        $check_in = $request->input('trip-start');
        $check_out = $request->input('trip-end');
        $special_request = $request->input('special-request');
        $id = $_SESSION['id'];

        Booking::create([
            'guest' => $guest_name,
            'phone_number' => $phone_number,
            'email' => $email,
            'check_in' => $check_in,
            'check_out' => $check_out,
            'special_request' => $special_request,
            'room_id' => $id,
        ]);

        $confirmation = 'Thank you for your request. We have received it correctly. Someone from our Team will get back to you very soon.';
        $error = false;
        return redirect('/')
            ->with(['confirmation' => $confirmation, 'error' => $error]);
    }
    /**
     * Display the specified resource.
     */
    public function show($id, Request $request)
    {
        if ($request->input('trip-start') && $request->input('trip-end')) {;
            $trip_start = $request->input('trip-start');
            $trip_end = $request->input('trip-end');

            $room = Rooms::single_room_availability($id, $trip_start, $trip_end);

            $rooms = Rooms
                ::join('photo', 'room.id', '=', 'photo.room_id')
                ->select('room.*', 'photo.URL')
                ->where('room.status', '=', true)
                ->where('room.discount', 0)
                ->inRandomOrder()
                ->limit(10)
                ->get();

            if (isset($room['discount'])) {
                $room['priceWithDiscount'] = intval($room['price'] - ($room['price'] * ($room['discount'] / 100)));
            }
            return view('room-details', ['room' => $room, 'rooms' => $rooms, 'start' => $trip_start, 'end' => $trip_end]);
        } else {
            $_SESSION['id'] = $id;
            isset($_SESSION['start']) ? $trip_start = $_SESSION['start'] : $trip_start = null;
            isset($_SESSION['end']) ? $trip_end = $_SESSION['end'] : $trip_end = null;

            $room = Rooms
                ::select('room.*', 'photo.URL', DB::raw("GROUP_CONCAT(a.amenities SEPARATOR ', ') AS all_amenities"))
                ->join('photo', 'room.id', '=', 'photo.room_id')
                ->join('amenities_has_room as ahr', 'room.id', '=', 'ahr.room_id')
                ->join('amenity as a', 'ahr.amenity_id', '=', 'a.id')
                ->where('room.id', '=', $id)
                ->groupBy('room.id', 'photo.URL')
                ->first();

            $rooms = Rooms
                ::join('photo', 'room.id', '=', 'photo.room_id')
                ->select('room.*', 'photo.URL')
                ->where('room.status', '=', true)
                ->where('room.discount', 0)
                ->inRandomOrder()
                ->limit(10)
                ->get();

            if (isset($room['discount'])) {
                $room['priceWithDiscount'] = intval($room['price'] - ($room['price'] * ($room['discount'] / 100)));
            }
            return view('room-details', ['room' => $room, 'rooms' => $rooms, 'start' => $trip_start, 'end' => $trip_end]);
        }
    }
}
