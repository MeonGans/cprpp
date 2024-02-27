<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class News extends Model
{
    use SoftDeletes;

    /**
     * Атрибути, які можна масово назначати.
     *
     * @var array
     */
    protected $fillable = [
        'title', 'date', 'author_id', 'views', 'description', 'preview_image', 'content', 'category_id'
    ];

    /**
     * Атрибути, які мають бути приведені до відомих типів.
     *
     * @var array
     */
    protected $casts = [
        'date' => 'date',
        'views' => 'integer'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(Member::class, 'author_id');
    }
}
