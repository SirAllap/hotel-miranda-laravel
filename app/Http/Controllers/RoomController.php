<?php

namespace App\Http\Controllers;

session_start();

use Illuminate\Http\Request;
use App\Models\Room;


class RoomController extends Controller
{
    public function index()
    {
        $rooms = Room
            ::join('photo', 'room.id', '=', 'photo.room_id')
            ->select('room.*', 'photo.URL')
            ->where('room.status', '=', true)
            ->where('room.discount', 0)
            ->inRandomOrder()
            ->limit(10)
            ->get();
        session_destroy();
        return view('index', ['rooms' => $rooms]);
    }
    public function rooms(Request $request)
    {
        if ($request->input('trip-start') && $request->input('trip-end')) {
            $start = $request->input('trip-start');
            $_SESSION['start'] = $start;
            $end = $request->input('trip-end');
            $_SESSION['end'] = $end;
            $rooms = Room::all_rooms_availability($start, $end);
        } else {
            $rooms = Room
                ::join('photo', 'room.id', '=', 'photo.room_id')
                ->select('room.*', 'photo.URL')
                ->where('room.status', '=', true)
                ->where('room.discount', '=', 0)
                ->get();
        }
        return view('rooms', ['rooms' => $rooms]);
    }
}
