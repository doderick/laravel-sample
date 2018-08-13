<?php

use Illuminate\Database\Seeder;
use App\Models\Status;
use App\Models\User;

class StatusesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $statuses = factory(Status::class)->times(2000)->make()->each(function ($status) {
           $status->user_id = mt_rand(1, User::count());
       });

       Status::insert($statuses->toArray());
    }
}
