<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Restaurant extends Model
{
    use HasFactory;
    public function tourgroup() {
        return $this->belongsTo(Tourgroup::class);
    }
    protected $guarded = [];
    public function setBookDateTimeAttribute($value){
        $this->attributes['book_date_time'] = Carbon::parse($value)->format('Y-m-d\TH:i');
    }
}
