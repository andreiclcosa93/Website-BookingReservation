<?php

namespace App\Http\Controllers\Front;

use App\Models\Room;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PagesController extends Controller
{
    public function homePage()
    {
        return view('front.home');
        // return 'home page';
    }


    public function roomsPage()
    {
        $rooms=Room::where('active',true)->orderBy('position')->get();
        return view('front.rooms')
        ->with('rooms',$rooms);
    }
}
