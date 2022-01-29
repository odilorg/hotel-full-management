<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tourgroup extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function hotelreservations() {
        return $this->hasMany(Hotelreservation::class);

    }
    public function guides() {
        return $this->hasMany(Guide::class);

    }
    public function tickets() {
        return $this->hasMany(Ticket::class);

    }
    public function restaurants() {
        return $this->hasMany(Restaurant::class);

    }

    public function user() {
        return $this->belongsTo(User::class);

    }
    public function transports() {
        return $this->hasMany(Transport::class);

    }

    public function setTourgroupCiAttribute($value)
   {
       $this->attributes['tourgroup_ci'] = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
   }
   public function getTourgroupCiAttribute($value)
{
    return Carbon::parse($value)->format('d/m/Y');
}

public function setTourgroupCoAttribute($value)
{
    $this->attributes['tourgroup_co'] = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
}
public function getTourgroupCoAttribute($value)
{
 return Carbon::parse($value)->format('d/m/Y');
}


}
