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
        Schema::create('photos', function (Blueprint $table) {
            $table->id();

            //cheia straina pentru rooms
            $table->foreignId('room_id')->references('id')->on('rooms')->onDelete('cascade');

            $table->string('photo')->unique();
            $table->string('info')->nullable();
            $table->boolean('visible')->default(true);
            $table->integer('order')->default(10);

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
        Schema::dropIfExists('photos');
    }
};
