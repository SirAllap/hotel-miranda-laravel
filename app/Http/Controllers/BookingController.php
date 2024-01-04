<?php

namespace App\Http\Controllers;

session_start();

use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'guest' => 'required|string',
            'phone_number' => 'required|string',
            'email' => 'required|string|email',
            'check_in' => 'required|string',
            'check_out' => 'required|string',
            'special_request' => 'required|string',
            'room_id' => 'required|integer',
        ]);

        Booking::create($request->all());

        $confirmation = ['Thank you for your request. We have received it correctly. Someone from our Team will get back to you very soon.'];
        $error = false;
        return redirect('/')->with(['confirmation' => $confirmation, 'error' => $error]);
    }
}
