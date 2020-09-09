<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $table = 'student';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'firstname',
        'lastname',
        'city_id'
    ];

    public function city()
    {
        return $this->belongsTo('App\Models\City');
    }

    public function card()
    {
        return $this->hasOne('App\Models\Card');
    }

    public function subjects()
    {
        return $this->belongsToMany(
            'App\Models\Subject',
            'student_selection',
            'student_id',
            'subject_id'
        );
    }

    public function image()
    {
        return $this->morphMany('App\Models\Image', 'image');
    }

    public function address()
    {
        return $this->morphMany('App\Models\Address', 'address');
    }

    public function contact()
    {
        return $this->morphMany('App\Models\Contact', 'contact');
    }
}
