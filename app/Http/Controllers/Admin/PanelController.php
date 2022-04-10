<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PanelController extends Controller
{
    //afisam vederea principala a panoului de administrare
    public function showPanel()
    {
        return view('admin.dashboard');
    }
}
