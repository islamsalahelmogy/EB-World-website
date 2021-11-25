<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;


    protected $fillable = [
        'code',
        'name',
        'description',
        'cover',
        'doctor_id',
        'level_id',
        'department_id'
    ];

    public function level()
    {
        return $this->belongsTo('App\Models\Level');
    }
    public function department()
    {
        return $this->belongsTo('App\Models\Department');
    }

    public function doctor()
    {
        return $this->belongsTo('App\Models\Doctor');
    }

    public function requirments()
    {
        return $this->belongsToMany('App\Models\Subject','requirments','subject_id','requirment_id');
    }
}
