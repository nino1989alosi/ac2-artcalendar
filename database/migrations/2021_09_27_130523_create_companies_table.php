<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('legal_name');
            $table->string('nickname')->nullable();
            $table->text('description')->nullable();                        
            $table->boolean('is_public')->default(0);
            $table->string('logo')->nullable();
            
            $table->integer('legitimate_interest')->default(0);
            $table->integer('privacy_policy')->default(0);
            $table->integer('consent_to_communicate')->default(0);
            $table->integer('consent_to_process_data')->default(0);
            $table->integer('status');
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
        Schema::dropIfExists('companies');
    }
}
