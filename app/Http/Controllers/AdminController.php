<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

use App\Models\Room;

class AdminController extends Controller
{
    // public function index()
    // {
    //     // If user is not logged in
    //     if (!Auth::check()) {
    //         return view('home.index');
    //     }

    //     // If logged in as admin
    //     if (Auth::user()->usertype === 'admin') {
    //         return view('admin.index');
    //     }

    //     // If logged in as normal user
    //     return redirect()->route('dashboard');
    // }


public function index()
{
    // Get all rooms
    $rooms = Room::latest()->get();

    // If user is not logged in
    if (!Auth::check()) {
        return view('home.index', compact('rooms'));
    }

    // If logged in as admin
    if (Auth::user()->usertype === 'admin') {
        return view('admin.index');


    //     $rooms = Room::all();
    // return view('admin.view_room', compact('rooms'));

    }

    // If logged in as normal user
    return view('home.index', compact('rooms'));
}




    public function create_room()
    {
        return view('admin.create_room');
    }

 public function add_room(Request $request)
{
    $request->validate([
        'room_title' => 'required',
        'price' => 'required',
        'room_type' => 'required',
        'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $data = new Room();

    $data->room_title = $request->room_title;
    $data->description = $request->description;
    $data->price = $request->price;
    $data->wifi = $request->wifi;
    $data->room_type = $request->room_type;

    if ($request->hasFile('image')) {
        $image = $request->file('image');
        $imagename = time().'.'.$image->getClientOriginalExtension();
        $image->move(public_path('room'), $imagename);
        $data->image = $imagename;
    }

    $data->save();

    return redirect()->back()->with('success', 'Room created successfully.');
}

  public function view_room()
{
    $rooms = Room::all();

    return view('admin.view_room', compact('rooms'));
}

public function room_edit($id)
{
    $room = Room::findOrFail($id);

    return view('admin.room_edit', compact('room'));
}

public function room_update(Request $request, $id)
{
    $room = Room::findOrFail($id);

    $room->room_title = $request->room_title;
    $room->description = $request->description;
    $room->price = $request->price;
    $room->wifi = $request->wifi;
    $room->room_type = $request->room_type;

    if ($request->hasFile('image')) {

        $image = $request->image;

        $filename = time().'.'.$image->getClientOriginalExtension();

        $image->move(public_path('room'), $filename);

        $room->image = $filename;
    }

    $room->save();
return redirect('/view_room')
        ->with('success', 'Room updated successfully!');

}

public function room_delete($id)
{
    $room = Room::findOrFail($id);

    // Delete image if it exists
    if ($room->image && file_exists(public_path('room/' . $room->image))) {
        unlink(public_path('room/' . $room->image));
    }

    $room->delete();
return redirect('/view_room')
        ->with('success', 'Room delete successfully!');
}

}
