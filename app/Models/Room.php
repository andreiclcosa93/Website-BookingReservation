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
    public function publicPhotos()
    {
        return $this->hasMany(Photo::class,'room_id','id')
            ->where('visible',true)
            ->orderBy('order')
            ->get();
    }

    //relatia many-to-many cu facilitatile
    public function facilities()
    {
        return $this->belongsToMany(Facility::class,'facility_room','room_id','facility_id');
    }
    //relatia many-to-many cu facilitatile
    public function publicFacilities()
    {
        return $this->belongsToMany(Facility::class,'facility_room','room_id','facility_id')
            ->where('visible',1)
            ->orderBy('order')
            ->get();
    }

    //relatia one-to-many cu rezervarile
    public function reservations()
    {
        return $this->hasMany(Reservation::class,'room_id')

        ;
    }
}
