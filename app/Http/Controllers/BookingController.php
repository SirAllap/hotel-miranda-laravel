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
}
