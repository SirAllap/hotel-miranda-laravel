<?php

namespace App\Http\Controllers;

session_start();

use Illuminate\Http\Request;
use App\Models\Rooms;
use Illuminate\Support\Facades\DB;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Rooms
            ::join('photo', 'room.id', '=', 'photo.room_id')
            ->select('room.*', 'photo.URL')
            ->get();
        return view('index', ['rooms' => $rooms]);
    }
    public function rooms()
    {
        if (isset($_GET["trip-start"]) && isset($_GET["trip-end"])) {

            $start = htmlspecialchars($_GET["trip-start"]);
            $_SESSION['start'] = $start;
            $end = htmlspecialchars($_GET["trip-end"]);
            $_SESSION['end'] = $end;

            $rooms = Rooms
                ::select('room.*', 'photo.URL')
                ->join('photo', 'room.id', '=', 'photo.room_id')
                ->where('room.status', true)
                ->where('room.discount', 0)
                ->whereNotExists(
                    function ($query) use ($start, $end) {
                        $query->select(DB::raw(1))
                            ->from('booking as b')
                            ->whereColumn('room.id', '=', 'b.room_id')
                            ->where(
                                function ($subquery) use ($start, $end) {
                                    $subquery->whereBetween('b.check_in', [$start, $end])
                                        ->orWhereBetween('b.check_out', [$start, $end]);
                                }
                            );
                    }
                )
                ->get();
        } else {
            $rooms = Rooms
                ::join('photo', 'room.id', '=', 'photo.room_id')
                ->select('room.*', 'photo.URL')
                ->where('room.status', '=', true)
                ->where('room.discount', '=', 0)
                ->get();
        }
        return view('rooms', ['rooms' => $rooms]);
    }
}
