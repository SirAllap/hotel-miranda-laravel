<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Room;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $id = Auth::id();
        $orders = Order::where('user_id', $id)
            ->join('guests as g', 'orders.user_id', '=', 'g.id')
            ->select('g.room_number', 'orders.*')
            ->get();

        // $orders = Order::where('user_id', $id)
        //     ->with('guests')
        //     ->get();

        return view('orders', ['orders' => $orders]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'room_id' => 'required|integer',
            'type' => 'required|string',
            'description' => 'required|string',
            'user_id' => 'required|string|integer',
        ]);
        Order::create($request->all());
        return redirect('room-service/orders');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $id = Auth::id();
        $user = User::find($id);
        $room_number = $user->room_number;
        $room = Room::where('room_number', $room_number)->first();
        return view('room-service', ['user' => $user, 'room' => $room]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $order = Order::find($id)->update($request->all());
        return redirect('room-service/orders');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Order::destroy($id);
        return redirect('room-service/orders');
    }
}
