<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class SaveCategory extends FormRequest
{
    public function rules()
    {
        return [
            'name' => 'required|string|max:100',
            'short_description' => 'required|string|max:200',
            'color' => 'required|string',
            'highlight' => 'boolean',
            'contrast' => 'boolean',
            'active' => 'boolean'
        ];
    }
}
