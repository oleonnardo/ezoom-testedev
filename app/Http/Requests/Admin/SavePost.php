<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SavePost extends FormRequest
{
    public function rules()
    {
        $rules = [
            'category_id' => 'required|int|exists:categories,id',
            'title' => 'required|string|min:2|max:250',
            'content' => 'required|string',
            'highlight' => 'required|boolean',
            'active' => 'required|boolean',
            'image' => 'required|file|mimes:jpeg,png,jpg|max:2048',
        ];

        if (in_array($this->method(), [Request::METHOD_PATCH, Request::METHOD_PUT])) {
            $rules['image'] = Str::replace('required', 'nullable', $rules['image']);
        }

        return $rules;
    }
}
