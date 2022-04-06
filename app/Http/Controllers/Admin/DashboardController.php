<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //afisam pagina principala din Dashboar
    public function showDashboard()
    {
        return view('admin.dashboard');

    }
}
