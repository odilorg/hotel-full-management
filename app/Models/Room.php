<?php

namespace App\Models;

use App\Models\Reservation;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Room extends Model
{
    use HasFactory;

    public function reservation()
    {
        return $this->hasOne(Reservation::class);
    }

    
    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
    public function beds24bookings()
    {
        return $this->hasMany(Beds24booking::class);
    }
    protected $guarded = [];
    
}
