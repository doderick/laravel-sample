<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class FollowersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users   = User::all();
        $user    = User::find(1);
        $user_id = $user->id;

        // 获得除了id=1的用户的所有用户以及id
        $followers = $users->slice(1);
        $follower_ids = $followers->pluck('id')->toArray();

        foreach ($followers as $follower) {
            // 除了id=1的用户都关注id=1的用户
            $follower->follow($user_id);

            // id=1的用户关注其他所有用户
            $user->follow($follower_ids);
        }
    }
}
