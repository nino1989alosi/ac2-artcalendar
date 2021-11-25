<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBusinessBlocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('business_blocks', function (Blueprint $table) {
            $table->id();
            $table->string('website')->nullable();
            $table->string('fiscal_code')->nullable();
            $table->string('vat_number')->nullable();
            $table->string('business_registration')->nullable();
            $table->string('business_phone')->nullable();
            $table->string('business_fax')->nullable();
            $table->string('entity');
            $table->integer('entity_id');
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
        Schema::dropIfExists('business_blocks');
    }
}
