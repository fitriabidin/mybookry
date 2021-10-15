<?php

namespace Database\Factories;

use App\Models\Book;
use App\Models\Category;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Book::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            //
            'category_id' => rand(1,6),
            'title' => $this->faker->sentence(),
            'slug' => $this->faker->slug(),
            'author' => $this->faker->name(),
            'isbn' => rand(1111111111,9999999999),
            'image' => 'image/'. rand(5,15) . '.jpg' ,
            'excerpt' => "<p>" . implode("</p><p>" , $this->faker->paragraphs(1)) . "</p>",
            'description' => "<p>" . implode("</p><p>" , $this->faker->paragraphs(6)) . "</p>",
            'price' => 43.22
        ];
    }
}

