<?php

namespace App\Models;

use App\Models\Utility;
use App\Models\UtilityUsage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Meter extends Model
{
    use HasFactory;
    public function utility() {
        return $this->belongsTo(Utility::class);
    }
   

   
}
