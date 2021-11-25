<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorkspaceInvitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('workspace_invites', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('workspace_id');
            $table->string('invited_by');
            $table->string('invite_to');
            $table->string('invite_url');
            $table->boolean('status');
            $table->longText('invite_key');
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
        Schema::dropIfExists('workspace_invites');
    }
}
