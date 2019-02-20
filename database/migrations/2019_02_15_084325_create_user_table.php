<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function($table) {
            $table->string('team_lead')->nullable()->after('phone');
            $table->integer('department_id')->nullable()->after('phone');
            $table->integer('designation_id')->nullable()->after('phone');

        });
    }

    
}
