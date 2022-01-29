<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function user() {
        return $this->belongsTo(User::class);

    }
    public function cargo() {
        return $this->belongsTo(Cargo::class);

    }
    public function products() {
        return $this->hasMany(Product::class);

    }
}

