<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTeamLeadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('team_leads', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('member_id')->unsigned()->nullable();
            $table->integer('teamlead_id')->unsigned()->nullable();
            $table->integer('department_id')->unsigned()->nullable();
            $table->timestamps();
            $table->foreign('member_id')->references('id')->on('users')->onDelete('no action')->onUpdate('no action');
            $table->foreign('teamlead_id')->references('id')->on('users')->onDelete('no action')->onUpdate('no action');
            $table->foreign('department_id')->references('id')->on('department')->onDelete('no action')->onUpdate('no action');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('team_leads');
    }
}
