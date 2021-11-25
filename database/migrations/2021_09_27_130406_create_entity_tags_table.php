<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntityTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entity_tags', function (Blueprint $table) {
            $table->id();
            $table->foreignId('meta_tags_id');
            $table->foreignId('entity_id');
            $table->string('entity');
            $table->unique(['meta_tags_id','entity_id', 'entity']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('entity_tags');
    }
}
