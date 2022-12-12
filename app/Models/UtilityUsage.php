<?php

namespace App\Models;

use App\Models\Meter;
use App\Models\Utility;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UtilityUsage extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function meter()
    {
        return $this->belongsTo(Meter::class);
    }
}
