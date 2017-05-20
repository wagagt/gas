<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateQuotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('customer_name');
            $table->string('email');
            $table->string('customer_phone', 20);
            $table->string('customer_mobile', 20);
            $table->integer('company_id')->unsigned();
            $table->integer('property_equipment_id')->unsigned();
            $table->decimal('price_value', 15,2)->unsigned();
            $table->decimal('initial_fee', 15,2)->unsigned();
            $table->decimal('aplay_tax', 15,2)->unsigned();
            $table->integer('tir_rate_id')->unsigned();
            $table->integer('purchase_id')->unsigned();
            $table->decimal('tax', 15,2)->unsigned();
            $table->integer('executive_id')->unsigned();
            $table->integer('vendor_id')->unsigned();
            $table->integer('sales_agent_id')->unsigned();
            $table->string('currency_symbol');


            $table->foreign('property_equipment_id')->references('id')->on('property_equipments')->onDelete('cascade');
            $table->foreign('tir_rate_id')->references('id')->on('tir_rates')->onDelete('cascade');
            $table->foreign('purchase_id')->references('id')->on('rate_purchases')->onDelete('cascade');
            $table->foreign('executive_id')->references('id')->on('executives')->onDelete('cascade');
            $table->foreign('vendor_id')->references('id')->on('vendors')->onDelete('cascade');
            $table->foreign('sales_agent_id')->references('id')->on('sales_agents')->onDelete('cascade');
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
        Schema::drop('quotations');
    }
}
