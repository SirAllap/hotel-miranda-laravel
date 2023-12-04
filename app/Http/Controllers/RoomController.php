<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Rooms;

class RoomController extends Controller
{
    public function index()
    {
        $rooms = Rooms::all();
        return view('index', ['rooms' => $rooms]);
    }
    public function rooms()
    {
        $rooms = Rooms::all();
        // $rooms = Rooms
        //     ::join('photos', 'rooms.room_type_id', '=', 'room_types.id')
        return view('rooms', ['rooms' => $rooms]);
    }
}
