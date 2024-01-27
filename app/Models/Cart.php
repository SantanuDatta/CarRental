<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Cart extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_id',
        'ip_address',
        'car_id',
        'order_id',
        'rent_price',
        'car_quantity',
        'pick_up',
        'drop_off',
        'pick_date',
        'pick_time',
        'return_date',
        'return_time',
        'days',
        'additional_driver',
        'gps',
        'bicycle_rack',
        'music',
        'collision_damage_waiver',
        'theft_protection',
        'rental_contact_fee',
        'personal_first_aid_service',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function car()
    {
        return $this->belongsTo(Car::class);
    }

    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    public static function totalCarts()
    {
        if (Auth::check()) {
            $carts = Cart::where('user_id', Auth::user()->id)->where('order_id', null)->get();
        } else {
            $carts = Cart::where('ip_address', request()->ip())->where('order_id', null)->get();
        }

        return $carts;
    }

    public static function totalCars()
    {
        if (Auth::check()) {
            $carts = Cart::where('user_id', Auth::user()->id)->where('order_id', null)->get();
        } else {
            $carts = Cart::where('ip_address', request()->ip())->where('order_id', null)->get();
        }
        $totalCars = 0;
        foreach ($carts as $cart) {
            $totalCars += $cart->car_quantity;
        }

        return $totalCars;
    }
}
