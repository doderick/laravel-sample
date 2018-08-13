<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $users = factory(User::class)->times(100)->make();
        User::insert($users->makeVisible(['password', 'remember_token'])->toArray());

        // 重新设置1号用户的信息
        $user = User::find(1);

        $user->name         = 'doderick';
        $user->email        = 'doderick@outlook.com';
        $user->password     = bcrypt('222222');
        $user->created_at   = '2012-07-01 00:00:00';
        $user->updated_at   = '2017-12-01 00:00:00';
        $user->is_activated = true;
        $user->can_rename   = false;
        $user->is_admin     = true;

        $user->save();
    }
}
