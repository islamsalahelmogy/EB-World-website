<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','phone','gender','email'
    ];

    public function subjects()
    {
        return $this->hasMany('App\Models\Subject');
    }

    public function department()
    {
        return $this->belongsTo('App\Models\Department');
    }
}
