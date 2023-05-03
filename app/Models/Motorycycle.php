<?php
declare(strict_types=1);
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Motorycycle extends Model
{
    use HasFactory;

    protected $fillable = [
        'machine',
        'suspension_type',
        'transmission_type'
    ];

    public function vehicle()
    {
        return $this->morphOne(Vehicle::class, 'vehicleable');
    }
}
