<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Ticket extends Model
{
    use HasFactory;
    public function tourgroup() {
        return $this->belongsTo(Tourgroup::class);
    }
    protected $guarded = [];
    public function setTicketDateAttribute($value){
        $this->attributes['ticket_date'] = Carbon::parse($value)->format('Y-m-d\TH:i');
    }
}
