<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTblShifingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_shifing', function (Blueprint $table) {
            $table->increments('shiping_id');
            $table->string('shiping_email');
            $table->string('shiping_f_name');
            $table->string('shiping_l_name');
            $table->string('shiping_address');
            $table->string('shiping_location');
            $table->string('shiping_phone');
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
        Schema::dropIfExists('tbl_shifing');
    }
}
