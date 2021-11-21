<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $fillable = [
        'name','cover','description'
    ];

    public function subjects()
    {
        return $this->hasMany('App\Models\Subject');
    }
    public function doctors()
    {
        return $this->hasMany('App\Models\Doctor');
    }
}
