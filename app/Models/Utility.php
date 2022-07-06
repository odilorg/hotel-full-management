<?php

namespace App\Models;

use App\Models\Meter;
use App\Models\UtilityUsage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Utility extends Model
{
    use HasFactory;
    public function utilityUsages()
    {
        return $this->hasManyThrough(UtilityUsage::class, Meter::class);
    }

    public function meters()
    {
        return $this->hasMany(Meter::class);
    }

    
}
