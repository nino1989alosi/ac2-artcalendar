<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('descrizione');
            $table->string('date');
            $table->string('startH');
            $table->string('endH');
            $table->integer('stato')->nullable(); 
            $table->integer('eventType')->nullable(); 
            $table->string('locationPhisical');
            $table->integer('platform')->nullable(); 
            $table->string('locationVirtual');
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
        Schema::dropIfExists('event');
    }
}
