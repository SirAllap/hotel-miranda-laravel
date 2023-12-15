<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Room;


class RoomController extends Controller
{
    public function show_all()
    {
        session()->flush();
        $rooms = Room::where('status', true)
            ->with('photos')
            ->inRandomOrder()
            ->limit(10)
            ->get();

        $rooms = Room::apply_discount_multiple_rooms($rooms);

        return view('index', ['rooms' => $rooms]);
    }
    public function show_rooms_by_date(Request $request)
    {
        if ($request->input('trip-start') && $request->input('trip-end')) {
            $start = $request->input('trip-start');
            session(['start' => $start]);
            $end = $request->input('trip-end');
            session(['end' => $end]);

            $rooms = Room::all_rooms_availability($start, $end);
        } else {
            $rooms = Room
                ::join('photo', 'room.id', '=', 'photo.room_id')
                ->select('room.*', 'photo.URL')
                ->where('room.status', true)
                ->get();
        }

        $rooms = Room::apply_discount_multiple_rooms($rooms);

        return view('rooms', ['rooms' => $rooms]);
    }
    public function show_one($id, Request $request)
    {
        if ($request->input('trip-start') && $request->input('trip-end')) {;
            $trip_start = $request->input('trip-start');
            $trip_end = $request->input('trip-end');

            $room = Room::single_room_availability($id, $trip_start, $trip_end);

            $rooms = Room
                ::join('photo', 'room.id', '=', 'photo.room_id')
                ->select('room.*', 'photo.URL')
                ->where('room.status', true)
                ->where('room.discount', 0)
                ->inRandomOrder()
                ->limit(10)
                ->get();

            if (isset($room['discount'])) {
                $room['priceWithDiscount'] = intval($room['price'] - ($room['price'] * ($room['discount'] / 100)));
            }
            return view('room-details', ['room' => $room, 'rooms' => $rooms, 'start' => $trip_start, 'end' => $trip_end]);
        } else {
            session(['id' => $id]);
            session('start') ? $trip_start = session('start') : $trip_start = null;
            session('end') ? $trip_end = session('end') : $trip_end = null;

            $room = Room
                ::select('room.*', 'photo.URL', DB::raw("GROUP_CONCAT(a.amenities SEPARATOR ', ') AS all_amenities"))
                ->join('photo', 'room.id', '=', 'photo.room_id')
                ->join('amenities_has_room as ahr', 'room.id', '=', 'ahr.room_id')
                ->join('amenity as a', 'ahr.amenity_id', '=', 'a.id')
                ->where('room.id', $id)
                ->groupBy('room.id', 'photo.URL')
                ->first();

            $rooms = Room
                ::join('photo', 'room.id', '=', 'photo.room_id')
                ->select('room.*', 'photo.URL')
                ->where('room.status', true)
                ->where('room.discount', 0)
                ->inRandomOrder()
                ->limit(10)
                ->get();

            if (isset($room['discount'])) {
                $room = Room::apply_discount_single_room($room);
            }

            return view('room-details', ['room' => $room, 'rooms' => $rooms, 'start' => $trip_start, 'end' => $trip_end]);
        }
    }
    public function show_rooms_with_offer()
    {
        $roomsWithDiscounts = Room
            ::join('photo', 'room.id', '=', 'photo.room_id')
            ->select('room.*', 'photo.URL')
            ->where('room.status', true)
            ->where('room.discount', '>', 0)
            ->inRandomOrder()
            ->limit(5)
            ->get();

        $roomsWithoutDiscounts = Room
            ::join('photo', 'room.id', '=', 'photo.room_id')
            ->select('room.*', 'photo.URL')
            ->where('room.status', true)
            ->where('room.discount', 0)
            ->inRandomOrder()
            ->get();

        $roomsWithDiscounts = Room::apply_discount_multiple_rooms($roomsWithDiscounts);

        return view('offers', ['roomsWithDiscounts' => $roomsWithDiscounts, 'roomsWithoutDiscounts' => $roomsWithoutDiscounts]);
    }
}
