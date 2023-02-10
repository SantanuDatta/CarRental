<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'inv_id',
        'user_id',
        'name',
        'email',
        'phone',
        'address_one',
        'address_two',
        'country',
        'division_id',
        'district_id',
        'post_code',
        'status',
        'add_info',
        'payment_method',
        'paid_amount',
        'amount',
        'currency',
        'transaction_id',
    ];
    public function division(){
        return $this->belongsTo(Division::class);
    }

    public function district(){
        return $this->belongsTo(District::class);
    }
    
    public function car(){
        return $this->belongsTo(Car::class);
    }
}
