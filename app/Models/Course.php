<?php

// app/Models/Course.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'course_date', 'course_type', 'practical_skill', 'duration_hours'];

    public function certificates()
    {
        return $this->hasMany(Certificate::class);
    }
}
