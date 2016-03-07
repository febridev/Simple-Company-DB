<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserIndustriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_industries', function (Blueprint $table) {
            $table->increments('UserIndustryId');
            $table->integer('UserID');
            $table->integer('IndustryID');
            $table->integer('TypeOperationID');
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
        Schema::drop('user_industries');
    }
}
