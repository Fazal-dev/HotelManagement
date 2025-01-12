<?php

namespace App\Http\Controllers;

use App\Models\Hotel;
use Illuminate\Http\Request;

class HotelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $hotels = Hotel::all();

        return view("hotel.index", ["hotels" => $hotels]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Hotel.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'image' => 'required|max:255',
            'description' => 'required',
            'status' => 'required',
        ]);

        $imageName = time() . '.' . $request->image->extension();

        $request->image->move(public_path('images'), $imageName);

        $validated['image'] = 'images/' . $imageName;

        Hotel::create($validated);

        return redirect('/hotel')->with('status', 'Hotel created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Hotel $hotel)
    {
        return view('Hotel.show', ['hotel' => $hotel]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Hotel $hotel)
    {
        return view('Hotel.edit', ['hotel' => $hotel]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Hotel $hotel)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'image' => 'required|max:255',
            'description' => 'required',
            'status' => 'required',
        ]);

        $hotel->update($validated);

        return redirect('/hotel')->with('status', 'Hotel Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Hotel $hotel)
    {

        $hotel->rooms()->delete();

        $hotel->delete();

        return redirect('/hotel')->with('status', 'Hotel deleted successfully');
    }

    /**
     * Display the rooms related to hotel.
     */
    public function showRooms(Hotel $hotel)
    {
        $rooms = $hotel->rooms;

        return view('Hotel.rooms', ['rooms' => $rooms]);
    }
}
