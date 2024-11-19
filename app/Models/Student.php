<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'telegram_id', 'activation_code'];

    public function stars()
    {
        return $this->hasMany(Star::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($student) {
            $student->activation_code = self::generateActivationCode();
        });
    }

    public static function generateActivationCode()
    {
        do {
            $code = str_pad(random_int(0, 99999), 5, '0', STR_PAD_LEFT);
        } while (self::where('activation_code', $code)->exists());

        return $code;
    }
}
