<?php

namespace App\Models;

use App\Models\Utility;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UtilityUsage extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function utility() {
        return $this->belongsTo(Utility::class);
    }
}
