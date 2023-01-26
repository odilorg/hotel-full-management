<?php

namespace App\Models;

use App\Models\Room;
use App\Models\User;
use App\Models\Shift;
use App\Models\Beds24booking;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Hotel extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
    public function beds24bookings()
    {
        return $this->hasManyThrough(Beds24booking::class, Room::class);
    }

     
    public function shifts()
    {
        return $this->hasMany(Shift::class);
    }

      
    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
