<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Jenssegers\Mongodb\Schema\Blueprint as MongoBlueprint;

class CreateMotorcyclesCollection extends Migration
{
    public function up()
    {
        Schema::connection('mongodb')->create('motorcycles', function (MongoBlueprint $collection) {
            $collection->string('machine');
            $collection->string('transmission_type');
            $collection->string('suspension_type');

            $collection->embedded('vehicle', 'App\Models\Vehicle');

            $collection->timestamps();
        });
    }

    public function down()
    {
        Schema::connection('mongodb')->dropIfExists('motorcycles');
    }
}
