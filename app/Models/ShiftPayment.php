<?php

namespace App\Models;

use App\Models\Room;
use App\Models\Shift;
use App\Models\PaymentType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ShiftPayment extends Model
{
    use HasFactory;
    protected $guarded = [];
    
    public function shift()
    {
        return $this->belongsTo(Shift::class);
    }
    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function payment_type()
    {
        return $this->belongsTo(PaymentType::class);
    }
}
