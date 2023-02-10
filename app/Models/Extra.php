<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Extra extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'car_id',
        'additional_driver',
        'gps',
        'bicycle_rack',
        'music',
    ];

    public function car(){
        return $this->belongsTo(Car::class);
    }
}
