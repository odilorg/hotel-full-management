<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inkassa extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function inkassas()
    {
        return $this->hasMany(Inkassa::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
