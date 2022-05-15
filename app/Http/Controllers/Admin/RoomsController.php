<?php

namespace App\Http\Controllers\Admin;

use App\Models\Room;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use App\Http\Requests\RoomAddRequest;

class RoomsController extends Controller
{
    //
    public function showRooms()
    {
        $room= Room::where('id',4)->first();
        // dd($room->reservations->count());
        $rooms= Room::all()->sortBy('position');

        return view('admin.rooms.list')
        ->with('rooms', $rooms);
    }

    //afisam formularul pentru adaugarea unei camere
    public function addRooms()
    {
            return view('admin.rooms.add');
    }

    public function createRooms(RoomAddRequest $request)
    {
        $room =new Room;

        $room->name=$request->name;
        $room->number=$request->number;
        $room->price=$request->price;
        $room->position=$request->position;
        $room->description=$request->description;

        if($request->active==1)
        {
            $room->active = true;
        } else
        {
            $room->active=false;
        }


        if ($request->hasFile('photo'))
        {
            //salvam poza pe hard disk
            $extension = $request->file('photo')->getClientOriginalExtension();
            $name='room_' . time() . '.' . $extension;

            $request->file('photo')->move('images/rooms',$name);

            $room->photo=$name;


        }

        $room->save();

        return redirect(route('admin.rooms.list'))->with('success', 'Camera a fost adaugata in baza de date');
    }

    //functia pentru afisarea formularului de editare
    public function editRooms($id)
    {
        $room=Room::findOrFail($id);

        return view('admin.rooms.edit')
        ->with('room',$room);


    }

    // functia pentru updatarea unei camere
    public function updateRooms(RoomAddRequest $request, $id)
    {
        $room=Room::findOrFail($id);

        $room->name=$request->name;
        $room->number=$request->number;
        $room->price=$request->price;
        $room->position=$request->position;
        $room->description=$request->description;

        if($request->active==1)
        {
            $room->active = true;
        } else
        {
            $room->active=false;
        }

        if ($request->hasFile('photo'))
        {
            //verificam daca room  are o imagine setata
            if(!($room->photo=='room.jpg'))
            {
                if(File::exists($room->photoPath()))
                {
                    File::delete($room->photoPath());
                }
            }


            //salvam poza pe hard disk
            $extension = $request->file('photo')->getClientOriginalExtension();
            $name='room_' . time() . '.' . $extension;

            $request->file('photo')->move('images/rooms',$name);

            $room->photo=$name;


        }

        $room->save();

        return redirect(route('admin.rooms.list'))->with('success', 'Datele camerei au fost actualizate');


    }

    public function deleteRooms($id)
    {
        $room=Room::findOrfail($id);
        $room->facilities()->detach();
        $room->delete();
        return redirect(route('admin.rooms.list'))->with('success', 'Camera a fost stearsa definitiv din baza de date');

    }
}
