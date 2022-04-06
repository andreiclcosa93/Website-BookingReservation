<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PagesController extends Controller
{
    public function homePage()
    {
        return view('front.home');
        // return 'home page';
    }
}
