<?php
declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model;

class Vehicle extends Model
{
    use HasFactory;
    protected $fillable = [
        'year',
        'color',
        'price'
    ];

    public function vehicleable()
    {
        return $this->morphTo();
    }

    public function car()
    {
        return $this->hasOne(Car::class);
    }

    public function motorcycle()
    {
        return $this->hasOne(Motorcycle::class);
    }
}
