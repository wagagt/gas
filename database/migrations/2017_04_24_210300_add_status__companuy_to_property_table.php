<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStatusCompanuyToPropertyTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('property_equipments', function (Blueprint $table) {
            $table->enum('status',['new','old'])->after('uploads'); // where 1 new / 0 is old

            $table->integer('company_id')->unsigned()->after('status')->nulleable();
            $table->foreign('company_id')->references('id')->on('companies')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('property_equipments', function ($table) {
            $table->dropColumn('uploads');
            $table->dropColumn('company_id');
        });
    }
}
