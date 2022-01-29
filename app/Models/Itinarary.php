<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\AsCollection;
use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Itinarary extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function transport() {
        return $this->belongsTo(Transport::class);

    }
    protected $casts= [
        'pickup_or_dropoff_or_marshrut' => 'array',
        'pickup_or_dropoff_date_time' => 'array',
        'pickup_or_dropoff_from' => 'array',
        'pickup_or_dropoff_to' => 'array',
        'driver_name' => 'array',
        'driver_tel' => 'array',
    ];


}
