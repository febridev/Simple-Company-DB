<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIndustryTypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('industry_types', function (Blueprint $table) {
            $table->increments('IndustryId');
            $table->string('IndustryName')->unique();
            $table->string('IndustryDescription')->nullable();
            $table->integer('LastUserUpdateID');
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
        Schema::drop('industry_types');
    }
}
