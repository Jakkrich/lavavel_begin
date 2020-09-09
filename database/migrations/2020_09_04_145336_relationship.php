<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class Relationship extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*** City ***/
        Schema::connection('pgsql')->create('city', function ($table) {
            $table->increments('id');
            $table->string('name', 49);
            $table->string('code', 3);
        });
        DB::connection('pgsql')->table('city')->insert([
            [
                'name' => 'Thai',
                'code' => 'TH'
            ],
            [
                'name' => 'LOA',
                'code' => 'LA'
            ]
        ]);

        /*** Student ***/
        Schema::connection('pgsql')->create('student', function ($table) {
            $table->increments('id');
            $table->string('firstname', 49);
            $table->string('lastname', 49);
            $table->integer('city_id')->unsigned();
        });

        Schema::connection('pgsql')->table('student', function (Blueprint $table) {
            $table->foreign('city_id')->references('id')->on('city');
        });
        DB::connection('pgsql')->table('student')->insert([
            [
                'firstname' => 'AAA',
                'lastname' => 'sss',
                'city_id' => 1
            ],
            [
                'firstname' => 'BBB',
                'lastname' => 'ddd',
                'city_id' => 1
            ],
            [
                'firstname' => 'CCC',
                'lastname' => 'fff',
                'city_id' => 2
            ],
            [
                'firstname' => 'DDD',
                'lastname' => 'hhh',
                'city_id' => 2
            ]
        ]);

        /*** Student Card ***/
        Schema::connection('pgsql')->create('card', function ($table) {
            $table->increments('id');
            $table->integer('student_id')->unsigned()->unique();
            $table->string('code', 32);
            $table->boolean('active')->default(false);
        });
        Schema::connection('pgsql')->table('card', function (Blueprint $table) {
            $table->foreign('student_id')->references('id')->on('student');
        });
        DB::connection('pgsql')->table('card')->insert([
            [
                'student_id' => 1,
                'code' => 'AAA',
                'active' => 1
            ],
            [
                'student_id' => 2,
                'code' => 'BBB',
                'active' => 1
            ],
            [
                'student_id' => 3,
                'code' => 'CCC',
                'active' => 1
            ],
            [
                'student_id' => 4,
                'code' => 'DDD',
                'active' => 1
            ],
        ]);

        /*** Subject ***/
        Schema::connection('pgsql')->create('subject', function ($table) {
            $table->increments('id');
            $table->string('name', 49);
            $table->string('code', 3);
        });
        DB::connection('pgsql')->table('subject')->insert([
            [
                'name' => 'Eng',
                'code' => 'ENG'
            ],
            [
                'name' => 'Physics',
                'code' => 'PYH'
            ],
            [
                'name' => 'Chemistry',
                'code' => 'CHM'
            ]
        ]);

        /*** Student Selection ***/
        Schema::connection('pgsql')->create('student_selection', function ($table) {
            $table->integer('student_id')->unsigned();
            $table->integer('subject_id')->unsigned();

            $table->unique(['student_id', 'subject_id']);
        });
        Schema::connection('pgsql')->table('student_selection', function (Blueprint $table) {
            $table->foreign('student_id')->references('id')->on('student');
            $table->foreign('subject_id')->references('id')->on('subject');
        });
        DB::connection('pgsql')->table('student_selection')->insert([
            [
                'student_id' => 1,
                'subject_id' => 1
            ],
            [
                'student_id' => 1,
                'subject_id' => 2
            ],
            [
                'student_id' => 1,
                'subject_id' => 3
            ],
            [
                'student_id' => 2,
                'subject_id' => 2
            ],
            [
                'student_id' => 3,
                'subject_id' => 3
            ]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('student_selection');
        Schema::dropIfExists('subject');
        Schema::dropIfExists('card');
        Schema::dropIfExists('student');
        Schema::dropIfExists('city');
    }
}
