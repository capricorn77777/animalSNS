<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User; // 追加
use App\Models\Follower; // 追加

class FollowersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
          // 10人のユーザーを作成
          $users = User::factory(10)->create();

          // ユーザー同士をランダムにフォローするロジック
          foreach ($users as $user) {
              // ランダムなユーザーを選択
              $randomUser = $users->random();
  
              // 同じユーザーにはフォローしないように
              if ($user->id !== $randomUser->id) {
                  // フォロー関係をデータベースに挿入
                  Follower::create([
                      'user_id' => $user->id,
                      'follower_id' => $randomUser->id,
                  ]);
              }
          }
    }
}
