<?php

use Illuminate\Support\Facades\Schema;
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
            $table->increments('id');
            $table->string('title');
            $table->string('slug');
            $table->integer('edrpou')->nullable();
            $table->integer('address_index')->nullable();
            $table->string('address_sity')->nullable();
            $table->string('address_street')->nullable();
            $table->integer('bank_account')->nullable();
            $table->integer('bank_mfo')->nullable();
            $table->string('phone')->nullable();
            $table->string('email')->nullable();
            $table->string('director_name');
            $table->string('director_phone');
            $table->text('note')->nullable();
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
        Schema::dropIfExists('companys');
    }
}
