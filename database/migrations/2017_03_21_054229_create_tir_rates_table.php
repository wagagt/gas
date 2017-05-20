<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTirRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tir_rates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->string('currency', 50);
            $table->string('symbol',8);  // Simbolo de moneda por ej USD$, QTZ, MX$
            $table->enum('status_property', ['new', 'old'])->default('new'); // Estado de la propiedad, equipo o bien

            $table->integer('company_id')->unsigned();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
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
        Schema::drop('tir_rates');
    }
}
