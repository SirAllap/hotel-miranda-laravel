<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Room;
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
            ->join('room as r', 'orders.room_id', '=', 'r.id')
            ->select('r.room_number', 'orders.*')
            ->get();

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
        $availableRooms = Room::all();
        return view('room-service', ['availableRooms' => $availableRooms]);
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
    public function update(Request $request)
    {
        $id = $request->input('order_id');
        $order = Order::find($id);
        $order->update($request->all());
        return redirect('room-service/orders');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        $id = $request->input('order_id');
        Order::destroy($id);
        return redirect('room-service/orders');
    }
}
