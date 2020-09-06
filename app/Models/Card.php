<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    protected $table = 'card';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'student_id',
        'code',
        'active'
    ];

    public function student()
    {
        return $this->hasOne('App\Models\Student');
    }
}
