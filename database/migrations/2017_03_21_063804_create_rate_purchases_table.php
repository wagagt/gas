<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRatePurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rate_purchases', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->integer('range_value_id')->unsigned();  // Range Value Rates
            $table->enum('status_property', ['new', 'old'])->default('new');
            $table->integer('company_id')->unsigned();

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
        Schema::drop('rate_purchases');
    }
}
