<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Protection extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'car_id',
        'collision_damage_waiver',
        'theft_protection',
        'rental_contact_fee',
        'personal_first_aid_service',
    ];

    public function car(){
        return $this->belongsTo(Car::class);
    }
}
