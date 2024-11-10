<?php

// app/Models/Certificate.php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    use HasFactory;

    protected $fillable = ['course_id', 'name', 'gender', 'certificate_number', 'status'];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
