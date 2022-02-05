<?php

namespace Database\Factories;

use App\Models\Blog;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    protected $model = Blog::class;


    public function definition()
    {
        $title = $this->faker->sentence;
        $slug = Str::slug($title,'-');
        return [
            'title' => $title,
            'slug' => $slug,
            'summary' => $this->faker->text(),
            'description' => $this->faker->paragraph(),
            'image' => 'https://images.pexels.com/photos/2349209/pexels-photo-2349209.jpeg?auto=compress&cs=tinysrgb&dpr=2&h=650&w=940'
        ];
    }
}
