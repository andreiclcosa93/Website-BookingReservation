<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $casts = [
        'checkin_at' => 'datetime',
        'checkout_at' => 'datetime',
        'confirmed_at' => 'datetime',
    ];

    //implementam relatia inversa one-to-many catre camera
    public function room()
    {
        return $this->belongsTo(Room::class,'room_id');
    }

    //implementam relatia inversa one-to-many catre utilizator
    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }
}
