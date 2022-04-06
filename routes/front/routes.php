<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\PagesController;

Route::get('home',[PagesController::class,'homePage']);
