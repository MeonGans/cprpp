<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use SoftDeletes;

    /**
     * Атрибути, які можна масово назначати.
     *
     * @var array
     */
    protected $fillable = [
        'content', 'display'
    ];
}
