<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePropertyEquipmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('property_equipments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 50);
            $table->string('properties', 200)->comment('Especificaciones del bien');

            $table->integer('modelo_id')->unsigned();
            $table->foreign('modelo_id')->references('id')->on('modelos')->onDelete('cascade');

            $table->integer('mark_id')->unsigned();
            $table->foreign('mark_id')->references('id')->on('marks')->onDelete('cascade');

            $table->integer('line_id')->unsigned();
            $table->foreign('line_id')->references('id')->on('lines')->onDelete('cascade');

            $table->string('color',25);
            $table->integer('property_type_id')->unsigned();
            $table->foreign('property_type_id')->references('id')->on('property_types')->onDelete('cascade');


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
        Schema::drop('property_equipments');
    }
}
