<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;
use App\Models\User;
class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        //
         // ユーザーごとに10個の投稿を作成
         User::all()->each(function (User $user) {
            Post::factory()->count(10)->create(['user_id' => $user->id]);
         });
    }
}
