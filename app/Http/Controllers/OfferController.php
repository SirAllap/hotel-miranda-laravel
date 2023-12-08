<?php

namespace App\Http\Controllers;

use App\Models\Room;

class OfferController extends Controller
{
    public function offers()
    {
        $roomsWithDiscounts = Room
            ::join('photo', 'room.id', '=', 'photo.room_id')
            ->select('room.*', 'photo.URL')
            ->where('room.status', '=', true)
            ->where('room.discount', '>', 0)
            ->inRandomOrder()
            ->limit(5)
            ->get();

        $roomsWithoutDiscounts = Room
            ::join('photo', 'room.id', '=', 'photo.room_id')
            ->select('room.*', 'photo.URL')
            ->where('room.status', '=', true)
            ->where('room.discount', '=', 0)
            ->inRandomOrder()
            ->get();

        foreach ($roomsWithDiscounts as &$room) {
            $room['priceWithDiscount'] = intval($room['price'] - ($room['price'] * ($room['discount'] / 100)));
        }

        return view('offers', ['roomsWithDiscounts' => $roomsWithDiscounts, 'roomsWithoutDiscounts' => $roomsWithoutDiscounts]);
    }
}
