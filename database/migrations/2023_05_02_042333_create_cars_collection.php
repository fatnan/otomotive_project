<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Jenssegers\Mongodb\Schema\Blueprint as MongoBlueprint;

class CreateCarsCollection extends Migration
{
    public function up()
    {
        Schema::connection('mongodb')->create('cars', function (MongoBlueprint $collection) {
            $collection->string('machine');
            $collection->string('type');
            $collection->integer('passenger_capacity');

            $collection->embedded('vehicle', 'App\Models\Vehicle');

            $collection->timestamps();
        });
    }

    public function down()
    {
        Schema::connection('mongodb')->dropIfExists('cars');
    }
}
