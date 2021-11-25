<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFinantialReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('finantial_report', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('descrizione');
            $table->string('type');
            $table->integer('status')->nullable();
            $table->integer('modePayment')->nullable();
            $table->integer('value')->nullable(); 
            $table->string('currency');
            $table->string('expensedate');
            $table->string('duedate');
            $table->string('user');
            $table->string('path');
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
        Schema::dropIfExists('finantial_report');
    }
}
