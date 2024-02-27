<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Event extends Model
{
    use SoftDeletes;

    /**
     * Атрибути, які можна масово назначати.
     *
     * @var array
     */
    protected $fillable = [
        'date', 'description', 'icon', 'host_name', 'start_time', 'end_time', 'offline_location', 'online_location', 'registration', 'content', 'name'
    ];
}
