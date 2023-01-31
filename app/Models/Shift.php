<?php

namespace App\Models;

use App\Models\User;
use App\Models\Hotel;
use App\Models\ShiftPayment;
use Illuminate\Database\Eloquent\Model;
use App\Http\Controllers\ShiftController;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Shift extends Model
{
    use HasFactory;
    protected $guarded = [];

    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function hotel()
    {
        return $this->belongsTo(Hotel::class);
    }
    public function shift_payments()
    {
        return $this->hasMany(ShiftPayment::class);
    }


}
