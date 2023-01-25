<?php

namespace App\Models;

use App\Models\Shift;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function tourgroups()
    {
        return $this->hasMany(Tourgroup::class);
    }
    public function shifts()
    {
        return $this->hasMany(Shift::class);
    }


    public function reports()
    {
        return $this->hasMany(Report::class);
    }

    
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function inventories()
    {
        return $this->hasMany(Inventory::class);
    }
    public function cargos()
    {
        return $this->hasMany(Cargo::class);
    }
    public function hotelreservations()
    {
        //return $this->hasManyThrough(Hotelreservation::class, through: Tourgroup::class);
        return $this->hasManyThrough(Hotelreservation::class, Tourgroup::class);
    }
}
