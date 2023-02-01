<?php

namespace App\Models;

use App\Models\ShiftPayment;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PaymentType extends Model
{
    use HasFactory;
    public function expense()
    {
        return $this->belongsTo(Expense::class);
    }

    public function shift_payments()
    {
        return $this->hasMany(ShiftPayment::class);
    }
}
