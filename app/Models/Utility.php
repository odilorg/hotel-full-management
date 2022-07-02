<?php

namespace App\Models;

use App\Models\Meter;
use App\Models\UtilityUsage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Utility extends Model
{
    use HasFactory;
    public function meters() {
        return $this->hasMany(Meter::class);

    }
    public function utility_usages() {
        return $this->hasMany(UtilityUsage::class);

    }
}
