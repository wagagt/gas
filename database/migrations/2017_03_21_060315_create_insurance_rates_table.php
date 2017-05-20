<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInsuranceRatesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insurance_rates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('description',100);
            $table->decimal('weekly_rate', 15,2)->nullable();                // semanal
            $table->decimal('monthly_rate', 15,2)->nullable();             // Mensual
            $table->decimal('quarterly_rate', 15,2)->nullable();           // Trimestral
            $table->decimal('biannual_rate', 15,2)->nullable();            // Semestral
            $table->decimal('annual_rate', 15,2)->nullable();              // Anual
            $table->integer('property_equipment_id')->unsigned();    // Propiedad Bienes & equipos
            $table->integer('range_value_id')->unsigned();                // Rango de tasas
            $table->integer('company_id')->unsigned();


            $table->foreign('property_equipment_id')->references('id')->on('property_equipments')->onDelete('cascade');
            $table->foreign('range_value_id')->references('id')->on('range_value_rates')->onDelete('cascade');
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
        Schema::drop('insurance_rates');
    }
}
