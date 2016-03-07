<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePICsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pics', function (Blueprint $table) {
            $table->increments('PICID');
            $table->integer('CompanyID');
            $table->string('PICName');
            $table->string('PICPosition')->nullable();
            $table->string('PICOfficeAddress')->nullable();
            $table->string('PICOfficeNumber')->nullable();
            $table->string('PICPhoneNumber')->nullable();
            $table->string('PICFax')->nullable();
            $table->string('PICEmail')->nullable();
            $table->string('LastUpdateUserID');
            $table->integer('isActive')->default('1');
            $table->softDeletes();
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
        Schema::drop('pics');
    }
}
