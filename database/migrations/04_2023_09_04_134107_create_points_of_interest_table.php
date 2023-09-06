<?php

use App\Enums\NarrativeLevel;
use App\Enums\POIType;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('points_of_interest', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->unsignedFloat('latitude');
            $table->unsignedFloat('longitude');
            $table->text('description')->nullable();
            $table->enum('type', POIType::values());
            $table->enum('narrative_level', NarrativeLevel::values());

            $table->unique(['latitude', 'longitude']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('points_of_interest');
    }
};
