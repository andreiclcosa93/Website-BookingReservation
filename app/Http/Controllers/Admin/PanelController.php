<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;


class PanelController extends Controller
{
    //afisam vederea principala a panoului de administrare
    public function showPanel()
    {
        return view('admin.dashboard');
    }

    //=====Rutele pentru utilizatori

    //ruta pentru afisarea tabelului cu utilizatori
    public function showUsers()
    {
        if(request('search'))
        {
            $search=request('search');
            $users=User::where('name','LIKE',"%$search%")
                    ->orWhere('email','LIKE',"%$search%")
                    ->orWhere('phone','LIKE',"%$search%")
                    ->orderBy('name')->paginate();

            return view('admin.users.list')
                    ->with('users',$users)
                    ->with('search',$search);

        } else
        {

            $users=User::orderBy('name')->paginate();
            return view('admin.users.list')
            ->with('users',$users);
        }


    }
}
