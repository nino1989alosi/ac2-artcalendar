<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmailBlocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('email_blocks', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('type');
            $table->integer('is_primary')->default(0);
            $table->integer('opted_out')->default(0);
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
        Schema::dropIfExists('email_blocks');
    }
}
