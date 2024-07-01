<?php

namespace App\ModelFilters;

use EloquentFilter\ModelFilter;

class CategoryFilter extends ModelFilter
{

    public function name($value)
    {
        return $this->whereLike('name', $value);
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
