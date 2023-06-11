<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Author;
use App\Models\Category;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Article>
 */
class ArticleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $authorid = Author::pluck('ma_tgia')->random();
        $categoryid = Category::pluck('ma_tloai')->random();

        return [
            'tieude' => $this->faker->sentence(5),
            'ten_bhat' => $this->faker->sentence(5),
            'ma_tloai' => $categoryid,
            'tomtat' => $this->faker->sentence(10),
            'ma_tgia' => $authorid,
        ];
    }
}
