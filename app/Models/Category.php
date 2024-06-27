<?php

namespace App\Models;

use App\Models\Posts;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @class \App\Models\Category
 *
 * @property string $name
 * @property string $short_description
 * @property string $color
 * @property boolean $highlight
 * @property boolean $contrast
 * @property boolean $active
 * @property \Carbon\Carbon $created_at
 * @property \Carbon\Carbon $updated_at
 */
class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'name',
        'short_description',
        'color',
        'highlight',
        'contrast',
        'active'
    ];

    protected $casts = [
        'highlight' => 'boolean',
        'contrast' => 'boolean',
        'active' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function posts(): HasMany
    {
        return $this->hasMany(Posts::class);
    }
}
