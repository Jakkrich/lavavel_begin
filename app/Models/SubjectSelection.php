<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubjectSelection extends Model
{
    protected $table = 'subject_selection';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'student_id',
        'subject_id'
    ];

    public function student()
    {
        return $this->belongsToMany('App\Models\Student');
    }

    public function subject()
    {
        return $this->belongsToMany('App\Models\Subject');
    }
}
}
