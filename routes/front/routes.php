<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Front\PagesController;

Route::get('/',[PagesController::class,'homePage'])->name('home');

Route::get('rooms' ,[PagesController::class,'roomsPage'])->name('rooms');
