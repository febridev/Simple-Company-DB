<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('CompanyId');
            $table->integer('IndustryID');
            $table->string('CompanyName')->unique();
            $table->string('CompanyAddress')->nullable();
            $table->string('CompanyWebsite')->nullable();
            $table->string('CompanyPhoneNumber')->nullable();
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
        Schema::drop('companies');
    }
}
