<?php

namespace Tests\Vehicle;

use Tests\TestCase;
use App\Models\Vehicle;

class VehicleTest extends TestCase
{
    public function test_can_create_vehicle()
    {
        $data = [
            'year' => '2022',
            'color' => 'Red',
            'price' => 20000,
        ];

        $vehicle = Vehicle::create($data);

        $this->assertInstanceOf(Vehicle::class, $vehicle);
        $this->assertEquals($data['year'], $vehicle->year);
        $this->assertEquals($data['color'], $vehicle->color);
        $this->assertEquals($data['price'], $vehicle->price);
    }
}
