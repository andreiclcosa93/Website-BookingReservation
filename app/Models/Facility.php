<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    use HasFactory;


    //relatia manty-to-many cu Room
    public function rooms()
    {
        return $this->belongsToMany(Room::class,'facility_room','facility_id','room_id');
    }
}
