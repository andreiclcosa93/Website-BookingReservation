<?php

namespace App\Http\Controllers\Admin;

use App\Models\Room;
use App\Models\Facility;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RoomFacilitiesController extends Controller
{
    // afisam vederea cu facilitati
    public function listFacilities($id)
    {
        $room = Room::findOrFail($id);
        $facilities=Facility::all()->sortBy('order');

        return view('admin.rooms.facilities')
            ->with('room',$room)
            ->with('facilities',$facilities);

    }

    //atasam facilitatile pentur o camera
    public function attachFacilities(Request $request,$id)
    {

    //    dd($request->facilities);
        $room = Room::findOrFail($id);
        $room->facilities()->sync($request->facilities);
        return back()->with('success','Facilitatile au fost atasate cmaerei');
    }
}
