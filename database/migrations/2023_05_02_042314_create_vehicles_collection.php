<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Jenssegers\Mongodb\Schema\Blueprint as MongoBlueprint;

class CreateVehiclesCollection extends Migration
{
    public function up()
    {
        Schema::connection('mongodb')->create('vehicles', function (MongoBlueprint $collection) {
            $collection->index('year');
            $collection->string('color');
            $collection->decimal('price', 10, 2);

            $collection->timestamps();
        });
    }

    public function down()
    {
        Schema::connection('mongodb')->dropIfExists('vehicles');
    }
}
