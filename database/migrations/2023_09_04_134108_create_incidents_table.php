<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncidentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incidents', function (Blueprint $table) {
            $table->id();
            $table->string('incident_id')->unique();
            $table->timestamp('timestamp');
            $table->double('latitude', 15, 10);
            $table->double('longitude', 15, 10);
            $table->enum('type', ['Host Destroyed', 'Decor destroyed', 'Narrative ended', 'Malfunction', 'Terrain destroyed', ]);
            $table->enum('severity', ['Critical', 'High', 'Medium', 'Low']);
            $table->string('point_of_interest');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incidents');
    }
}
