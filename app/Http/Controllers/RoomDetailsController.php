<?php

namespace App\Http\Controllers;

session_start();

use Illuminate\Http\Request;
use App\Models\Rooms;
use Illuminate\Support\Facades\DB;

class RoomDetailsController extends Controller
{
    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        if ($request->input('trip-start') && $request->input('trip-end')) {
            $id = $request->input('room_id');
            $trip_start = $request->input('trip-start');
            $trip_end = $request->input('trip-end');

            $room = Rooms
                ::select('room.*', 'photo.URL', DB::raw("GROUP_CONCAT(a.amenities SEPARATOR ', ') AS all_amenities"))
                ->join('photo', 'room.id', '=', 'photo.room_id')
                ->join('amenities_has_room as ahr', 'room.id', '=', 'ahr.room_id')
                ->join('amenity as a', 'ahr.amenity_id', '=', 'a.id')
                ->where('room.id', '=', $id)
                ->whereNotExists(
                    function ($query) use ($trip_start, $trip_end) {
                        $query->select(DB::raw(1))
                            ->from('booking as b')
                            ->whereColumn('room.id', '=', 'b.room_id')
                            ->where(
                                function ($subquery) use ($trip_start, $trip_end) {
                                    $subquery->whereBetween('b.check_in', [$trip_start, $trip_end])
                                        ->orWhereBetween('b.check_out', [$trip_start, $trip_end]);
                                }
                            );
                    }
                )
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
        } else {
            $id = $request->input('room_id');
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
