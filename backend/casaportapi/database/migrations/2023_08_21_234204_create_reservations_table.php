<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReservationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->id();
            $table->boolean('accepter');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('terrain_id'); // Foreign key column
       
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('terrain_id')->references('id')->on('terrains')->onDelete('cascade'); // Foreign key relationship to terrains table
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('reservations');
    }
}
