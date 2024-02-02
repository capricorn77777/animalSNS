<?php
namespace Database\Factories;

use App\Models\Comment;
use App\Models\Post;
use App\Models\Like;
use Illuminate\Database\Eloquent\Factories\Factory;

class LikeFactory extends Factory
{
    protected $model = Like::class;

    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 10),
            
            'post_id' => Post::factory(), 
        
        ];
    }
}