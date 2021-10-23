<?php

namespace Database\Factories;

use App\Models\Posts;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Posts::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            "tittle"=>$this->faker->sentence(mt_rand(3, 6)),
            "user_id" => mt_rand(1, 5),
            "category_id"=> mt_rand(1, 3),
            "article"=> $this->faker->paragraph(mt_rand(50, 100)),
            "posted_at" => date("Y-m-d H:i:s")
        ];
    }
}
