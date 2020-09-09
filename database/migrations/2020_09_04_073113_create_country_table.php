<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateCountryTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $date = new DateTime();
        $unixTimeStamp = $date->getTimestamp();

        Schema::connection('pgsql')->create('country', function (Blueprint $table) {
            $table->increments('id', true)->unsigned();

            $table->string('code', 3);
            $table->string('name', 99)->default('');
            $table->string('dname', 99)->default('');
            $table->smallInteger('num_code');
            $table->mediumInteger('phone_code');

            $table->integer('created')->unsigned();
            $table->integer('register_by')->unsigned();
            $table->integer('modified')->unsigned();
            $table->integer('modified_by')->unsigned();
            $table->boolean('record_delete')->default(0);
        });

        DB::connection('pgsql')->table('country')->insert([
            [
                'code' => 'pk',
                'name' => 'Thai',
                'dname' => 'Thai',
                'num_code' => 0,
                'phone_code' => 99,
                'created' => $unixTimeStamp,
                'register_by' => 1,
                'modified' => $unixTimeStamp,
                'modified_by' => 1,
            ]
        ]);

        Schema::connection('pgsql')->create('country_state', function (Blueprint $table) {
            $table->increments('id', true)->unsigned();

            $table->integer('country_id')->unsigned();
            $table->string('name', 99)->default('');
            $table->string('code', 10)->default('');

            $table->integer('created')->unsigned();
            $table->integer('register_by')->unsigned();
            $table->integer('modified')->unsigned();
            $table->integer('modified_by')->unsigned();
            $table->boolean('record_delete')->default(0);

            $table->engine = "InnoDB";
        });

        Schema::connection('pgsql')->table('country_state', function ($table) {
            $table->foreign('country_id')->references('id')->on('country')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection('pgsql')->drop('country_state');
        Schema::connection('pgsql')->drop('country');
    }
}
