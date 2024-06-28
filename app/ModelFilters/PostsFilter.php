<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class PostsFilter extends ModelFilter
{
    public function categoryId($value)
    {
        return $this->where('category_id', '=', $value);
    }

    public function title($value)
    {
        return $this->whereLike('title', $value);
    }

    public function highlight($value)
    {
        return $this->where('highlight', '=', $value);
    }

    public function active($value)
    {
        return $this->where('active', '=', $value);
    }
}
