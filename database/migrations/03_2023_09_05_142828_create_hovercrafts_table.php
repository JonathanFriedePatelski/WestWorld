<?php

use App\Enums\WearLevel;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('hovercrafts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('crew_id')->constrained();
            $table->unsignedFloat('fuel_level');
            $table->enum('wear_level', WearLevel::values());
            $table->unsignedMediumInteger('age');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hovercrafts');
    }
};
