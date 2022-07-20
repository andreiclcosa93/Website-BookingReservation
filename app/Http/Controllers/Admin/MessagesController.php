<?php

namespace App\Http\Controllers\Admin;

use App\Models\Messages;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MessagesController extends Controller
{
    //afisam lista cu mesaje
    public function listMessages()
    {
        $messages=Messages::orderByDesc('created_at')->paginate(15);

        return view('admin.messages.list')->with('messages',$messages);
    }

    public function deleteMessage($id)
    {
        $message=Messages::findOrFail($id)->delete();

        if($message)
        {
            return back()->with('success','Messajul a fost sters din baza de date');
        }
    }
}
