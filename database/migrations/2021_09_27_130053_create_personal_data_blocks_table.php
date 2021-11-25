<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePersonalDataBlocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_data_blocks', function (Blueprint $table) {
            $table->id();
            $table->string('place_of_birth')->nullable();
            $table->string('birthday')->nullable();
            $table->string('driver_license')->nullable();
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->string('bust_size')->nullable();
            $table->string('waist_size')->nullable();
            $table->string('shoes_size')->nullable();
            $table->string('id_card_type')->nullable();
            $table->string('id_card_number')->nullable();
            $table->string('id_card_released_by')->nullable();
            $table->string('id_card_released_on')->nullable();
            $table->string('facebook_profile')->nullable();
            $table->string('twitter_profile')->nullable();
            $table->string('instagram_profile')->nullable();
            $table->string('linkedin_profile')->nullable();
            $table->string('tiktok_profile')->nullable();
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
        Schema::dropIfExists('personal_data_blocks');
    }
}
