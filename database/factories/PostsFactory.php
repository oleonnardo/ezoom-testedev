<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostsFactory extends Factory
{
    public function definition(): array
    {
        $title = 'Lorem Ipsum dolor Sit Amet Dolor lorem ipsum';
        $slug = Str::slug($title . '-' . now()->format('His'));

        return [
            'title' => $title,
            'slug' => $slug,
            'highlight' => false,
            'active' => true,
            'content' => $this->faker->paragraphs(asText: true),
            'created_at' => Carbon::parse('2023-04-10 00:00:00')
        ];
    }

    public function withCategory($category_id, $image_id)
    {
        return $this->state(function (array $attributes) use ($category_id, $image_id) {
           return array_merge($attributes, [
               'category_id' => $category_id,
               'image' => asset("storage/uploads/posts/category-{$category_id}-{$image_id}.jpeg"),
           ]);
        });
    }

    public function setHighlight($value = true)
    {
        return $this->state([
           'highlight' => $value,
        ]);
    }
}
