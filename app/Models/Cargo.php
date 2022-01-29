<?php

namespace App\Models;


use Illuminate\Support\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Cargo extends Model
{
    use HasFactory;
    
    protected $guarded = [];
    public function user() {
        return $this->belongsTo(User::class);

    }
    public function products() {
        return $this->hasMany(Product::class);
    }
    public function inventories() {
        return $this->hasMany(Inventory::class);
    }
    // public function setCargoArrivalDateAttribute($value)
    // {
    //     $this->attributes['cargo_arrival_date'] = Carbon::createFromFormat('d/m/Y', $value)->format('Y-m-d');
    // }
//     public function getCargoArrivalDateAttribute($value)
//  {
//      return Carbon::parse($value)->format('d/m/Y');
//  }
}
