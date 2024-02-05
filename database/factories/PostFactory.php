<?php
namespace Database\Factories;

use App\Models\animal;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 10),
            
            'content' => $this->faker->paragraph,

            'animal_id' => Animal::inRandomOrder()->first()->id, // 修正
        ];
    }
}
