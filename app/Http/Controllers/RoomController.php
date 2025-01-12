<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = Room::all();

        return view("room.index", ["rooms" => $rooms]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $hotels = Hotel::all();

        return view('Room.create', ['hotels' => $hotels]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'description' => 'required',
            'status' => 'required',
            'qty' => 'required',
            'hotel_id' => 'required|exists:hotels,id',
        ]);

        $imageName = time() . '.' . $request->image->extension();

        $request->image->move(public_path('images'), $imageName);

        $validated['image'] = 'images/' . $imageName;

        Room::create($validated);

        return redirect('/hotel')->with('status', 'Room created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Room $room)
    {
        $hotels = Hotel::all();

        return view('Room.show', ['room' => $room, 'hotels' => $hotels]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Room $room)
    {
        $hotels = Hotel::all();

        return view('Room.edit', ['room' => $room, 'hotels' => $hotels]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Room $room)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'image' => 'required|max:255',
            'description' => 'required',
            'status' => 'required',
            'hotel_id' => 'required',
            'qty' => 'required',
        ]);

        $room->update($validated);

        return redirect('/hotel')->with('status', 'room Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Room $room)
    {
        $room->delete();

        return redirect('/hotel')->with('status', 'room deleted successfully');
    }

    public function bookRoom(Request $request, Room $room)
    {
        $qty = $request->qty;

        $quantity = (int)$qty;

        if ($quantity == 0) {
            return redirect('/hotel')->with('status', 'please select Quantity');
        }

        $room->qty -= $quantity;

        $room->save();

        return redirect('/hotel')->with('status', 'Room booked successfully');
    }
}
