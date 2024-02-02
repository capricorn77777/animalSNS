<?php
namespace Database\Factories;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    protected $model = Comment::class;

    public function definition()
    {
        return [
            'user_id' => $this->faker->numberBetween(1, 10),
            
            'content' => $this->faker->paragraph,
            
            'post_id' => Post::factory(), 
        
        ];
    }
}