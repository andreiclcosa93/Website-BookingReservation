<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    // protected $table="rooms";

    public function photoUrl()
    {
        return '/images/rooms/' . $this->photo;
    }

    public function photoPath()
    {
        return 'images/rooms/'. $this->photo;
    }

    //relatia one to many photos -- many photos
    public function photos()
    {
        return $this->hasMany(Photo::class,'room_id','id');
    }
    public function photosPublic()
    {
        return $this->hasMany(Photo::class,'room_id','id')->where('visible',true)->orderBy('order');
    }
}
