<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    //relatia inversa one-to-many Room -- apartine unei camere
    public function room()
    {
        return $this->belongsTo(Photo::class,'room_id','id');
    }

    public function photoUrl()
    {
        return '/images/galery/' . $this->photo;
    }

    public function photoPath()
    {
        return 'images/galery/'. $this->photo;
    }
}
