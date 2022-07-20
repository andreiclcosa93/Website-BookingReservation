<?php

namespace App\Http\Controllers\Front;

use App\Models\Room;
use App\Models\Messages;
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

    //afisam pagina de contact
    public function showContact()
    {
        return view('front.contact');
    }

    //afisam pagina about
    public function showAbout()
    {
        return view('front.about');
    }

    //afisam pagina blog
    public function showBlog()
    {
        return view('front.blog');
    }

    public function newMessage(Request $request)
    {
        //validam mesajul
        $request->validate(
            [
                'name'=>'required|max:50',
                'email'=>'required|max:70|email',
                'message'=>'required|max:500',
            ],
            [
                'name.required'=>'Trebuie sa introduceti un nume pentur a trimite un mesaj',
                'email.required'=>'Trebuie sa introduceti o adresa de email valida pentru a trimite un mesaj',
                'message.required'=>'Trebuie sa introduceti un mesaj',
            ]
            );

            $message= new Messages;
            $message->name=$request->name;
            $message->email=$request->email;
            $message->message=$request->message;

            $message->save();

            return redirect(route('home'))->with('success',"Mesajul Dvs a fost trimis. Va vom raspunde cat mai repede posibil");


    }
}
