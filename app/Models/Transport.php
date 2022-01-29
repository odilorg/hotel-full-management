<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transport extends Model
{
    use HasFactory;

    public function itinarary() {
        return $this->hasMany(Itinarary::class);
    }

    public function tourgroup() {
        return $this->belongsTo(Tourgroup::class);
    }
    protected $guarded = [];

    public function setPickupOrDropoffDateTimeAttribute($value){
       $this->attributes['pickup_or_dropoff_date_time'] = Carbon::parse($value)->format('Y-m-d\TH:i');
   }
   
   

}
