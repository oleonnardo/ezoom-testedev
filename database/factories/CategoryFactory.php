<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    public function definition(): array
    {
        return [
            'short_description' => 'Lorem Ipsum dolor Sit Amet Lorem.',
            'highlight' => true,
            'active' => true
        ];
    }

    public function withData($name, $color, $contrast = false)
    {
        return $this->state(function (array $attributes) use ($name, $color, $contrast) {
            return array_merge($attributes, [
                'name' => $name,
                'color' => $color,
                'contrast' => $contrast,
            ]);
        });
    }
}
