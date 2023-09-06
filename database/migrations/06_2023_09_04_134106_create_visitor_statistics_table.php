<?php

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
        Schema::create('visitor_statistics', function (Blueprint $table) {
            $table->id();
            $table->timestamp('date');
            $table->integer('total_visitors');
            $table->integer('male_visitors');
            $table->integer('female_visitors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('visitor_statistics');
    }
};
