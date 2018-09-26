<?php

namespace App\Observers;

use App\Models\User;

class UserObserver
{
	public function deleted(User $user)
	{
		\DB::table('statuses')->where('user_id', $user->id)->delete();
	}
}