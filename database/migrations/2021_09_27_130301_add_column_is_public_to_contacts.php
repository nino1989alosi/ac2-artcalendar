<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnIsPublicToContacts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->integer('workspace_id')->unsigned()->index()->foreign()->references("id")->on("workspaces")->onDelete("cascade")->nullable()->change();
            $table->boolean('is_public')->default(0);
            $table->string('avatar')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('contacts', function (Blueprint $table) {
            $table->dropIfExists('user_id');
            $table->dropIfExists('is_public');
            $table->dropIfExists('avatar');
        });
    }
}
