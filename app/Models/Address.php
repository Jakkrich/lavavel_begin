<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    protected $table = 'address';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'address_line1',
        'address_line2',
        'address_line3'
    ];

    public function address()
    {
        return $this->morphTo();
    }
}
