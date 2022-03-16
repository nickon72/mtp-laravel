<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeliveriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deliveries', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('materials_id');
            $table->date('date');
            $table->integer('company_id');
            $table->integer('materials_unit');
            $table->integer('contract_id')->nullable();
            $table->string('ttn')->nullable();
            $table->string('vn')->nullable();
            $table->string('invoice')->nullable();
            $table->integer('filia_id');
            $table->decimal('price')->nullable();
            $table->string('unit')->nullable();
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
        Schema::dropIfExists('deliveries');
    }
}
