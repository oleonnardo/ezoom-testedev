<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * @property int $category_id
 * @property string $title
 * @property string $slug
 * @property string $image
 * @property string $content
 * @property boolean $highlight
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 * @property \Carbon\Carbon $deleted_at
 */
class Posts extends Model
{
    use SoftDeletes, HasFactory;

    protected $table = 'posts';

    protected $fillable = [
        'category_id',
        'title',
        'slug',
        'image',
        'content',
        'highlight'
    ];

    protected $casts = [
        'highlight' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
