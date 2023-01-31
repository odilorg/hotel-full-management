<?php

namespace App\Models;

use App\Models\Shift;
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
}
