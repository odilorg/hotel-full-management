<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];
    public function user() {
        return $this->belongsTo(User::class);

    }
    public function cargo() {
        return $this->belongsTo(Cargo::class);

    }
    public function inventory() {
        return $this->belongsTo(Inventory::class);

    }
}
