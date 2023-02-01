<?php

namespace App\Models;

use App\Models\Hotel;
use App\Models\Reservation;
use App\Models\ShiftPayment;
use App\Models\Beds24booking;
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
    public function shift_payments()
    {
        return $this->hasMany(ShiftPayment::class);
    }



    protected $guarded = [];
    
}
