<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use PDO;

class Car extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'brand_id',
        'name',
        'slug',
        'description',
        'rent',
        'image',
        'features',
        'status',
    ];

    public function brand(){
        return $this->belongsTo(Brand::class, 'brand_id');
    }

    public function extras(){
        return $this->hasMany(Extra::class);
    }

    public function protections(){
        return $this->hasMany(Protection::class);
    }

    public function orders(){
        return $this->hasMany(Order::class);
    }

    public function carts(){
        return $this->hasMany(Cart::class);
    }
}
