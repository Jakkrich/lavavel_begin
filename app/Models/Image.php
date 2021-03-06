<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $table = 'image';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'path',
    ];

    public function image()
    {
        return $this->morphTo();
    }
}
