<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CommentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ユーザーと動物を作成
        \App\Models\User::factory(10)->create();
        \App\Models\Animal::factory(10)->create();

        // ポストを作成し、animal_id を指定
        \App\Models\Post::factory(10)->create([
            'animal_id' => \App\Models\Animal::inRandomOrder()->first()->id,
        ]);

        // コメントを作成し、user_id と post_id を指定
        \App\Models\Comment::factory(20)->create([
            'user_id' => \App\Models\User::inRandomOrder()->first()->id,
            'post_id' => \App\Models\Post::inRandomOrder()->first()->id,
        ]);
    }
}
