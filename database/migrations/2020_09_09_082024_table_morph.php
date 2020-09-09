<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TableMorph extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*** Table Image***/
        Schema::connection('pgsql')->create('image', function ($table) {
            $table->increments('id');
            $table->string('path', 49);
            $table->morphs('image');
        });

        /*** Table Address***/
        Schema::connection('pgsql')->create('address', function ($table) {
            $table->increments('id');
            $table->string('address_line1', 49);
            $table->string('address_line2', 49);
            $table->string('address_line3', 49);
            $table->morphs('address');
        });

        /*** Table Contact***/
        Schema::connection('pgsql')->create('contact', function ($table) {
            $table->increments('id');
            $table->string('phone_num', 12);
            $table->morphs('contact');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('image');
        Schema::dropIfExists('address');
        Schema::dropIfExists('contact');
    }
}
