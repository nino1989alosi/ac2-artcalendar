<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRoleToWorkspaceInvitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('workspace_invites', function (Blueprint $table) {
            Schema::table('workspace_invites', function($table) {
                $table->string('role');
            });
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('workspace_invites', function (Blueprint $table) {
            Schema::table('workspace_invites', function($table) {
                $table->dropColumn('role');
            });
        });
    }
}
