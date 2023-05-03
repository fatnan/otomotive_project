<?php
declare(strict_types=1);
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $fillable = [
        'machine',
        'passenger_capacity',
        'type'
    ];

    public function vehicle()
    {
        return $this->morphOne(Vehicle::class, 'vehicleable');
    }
}
