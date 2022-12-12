<?php

namespace App\Models;

use App\Models\Utility;
use App\Models\UtilityUsage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Meter extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function utility()
    {
        return $this->belongsTo(Utility::class);
    }

    public function utilityUsages()
    {
        return $this->hasMany(UtilityUsage::class);
    }
}
