<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->increments('id');
            $table->enum('type', array('tender','direct'));
            $table->integer('number');
            $table->date('date');
            $table->date('expiration');
            $table->integer('company_id');
            $table->integer('materials_id');
            $table->string('unit')->nullable();
            $table->decimal('price')->nullable();
            $table->decimal('quantity_full')->nullable();
            $table->integer('materials_child_id')->nullable();
            $table->string('sertificat')->nullable();
            $table->string('pasport')->nullable();
            $table->string('contract')->nullable();
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
        Schema::dropIfExists('contracts');
    }
}
