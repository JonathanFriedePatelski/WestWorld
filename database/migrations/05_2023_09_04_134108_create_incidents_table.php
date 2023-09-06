<?php

use App\Enums\IncidentSeverity;
use App\Enums\IncidentType;
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
        Schema::create('incidents', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('point_of_interest_id')
                ->nullable();
            $table->foreign('point_of_interest_id')
                ->references('id')
                ->on('points_of_interest')
                ->nullOnDelete();
            $table->unsignedFloat('latitude');
            $table->unsignedFloat('longitude');
            $table->enum('type', IncidentType::values());
            $table->enum('severity', IncidentSeverity::values());
            $table->text('description')->nullable();
            $table->text('report')->nullable();
            $table->dateTime('occurred_at');

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
        Schema::dropIfExists('incidents');
    }
};
