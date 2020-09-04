<?php

namespace App\Model;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;

class CountyrModel extends Model
{
    protected $table = 'country';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function insert()
    {
        $date = new \DateTime();
        $unixTimeStamp = $date->getTimestamp();

        DB::connection('pgsql')->insert(
            'insert into country
        (code, name, dname, num_code, phone_code, created, register_by, modified, modified_by)
        values (?, ?, ?, ?, ?, ?, ?, ?, ?)',
            ['AB', 'ABC', 'ABC', 0, 0, $unixTimeStamp, 1, $unixTimeStamp, 1]
        );
    }

    public function edit()
    {
        DB::connection('pgsql')->update('update country set name = ? where id = ?', ['XYZ', 2]);
    }

    public function read()
    {
        return DB::connection('pgsql')->select('select * from country');
    }

    // public function delete()
    // {
    //     DB::connection('pgsql')->delete('delete from country where id = ?', [2]);
    // }
}
