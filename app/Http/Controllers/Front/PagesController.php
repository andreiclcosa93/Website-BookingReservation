<?php

namespace App\Http\Controllers\Front;

use App\Models\Room;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    //afisam pagina principala
    public function homePage()
    {
        $rooms=Room::select()->where('active',true)->inRandomOrder()->limit(4)->get();
        return view('front.home')
        ->with('rooms',$rooms);
        // return 'home page';
    }

//afisam pagina cu toate camerele
    public function roomsPage()
    {
        $rooms=Room::where('active',true)->orderBy('position')->get();
        return view('front.rooms')
        ->with('rooms',$rooms);
    }

    //afisam pagina cu detaliile unei camere
    public function roomDetail($id)
    {
        $room=Room::findOrfail($id);
        return view('front.room-details')
            ->with('room',$room);
    }
}
