<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name');
            $table->string('nickname')->nullable();
            $table->text('description')->nullable();
            $table->integer('status');
            $table->json('type')->nullable();
            $table->json('tag')->nullable();
            $table->json('group')->nullable();
            $table->string('personal_phone')->nullable();
            $table->json('company')->nullable();
            $table->integer('legitimate_interest')->default(0);
            $table->integer('privacy_policy')->default(0);
            $table->integer('consent_to_communicate')->default(0);
            $table->integer('consent_to_process_data')->default(0);
            $table->integer('workspace_id');
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
        Schema::dropIfExists('contacts');
    }
}
