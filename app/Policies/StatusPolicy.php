<?php

namespace App\Policies;

use App\Models\User;
use App\Models\Status;
use Illuminate\Auth\Access\HandlesAuthorization;

class StatusPolicy
{
    use HandlesAuthorization;

    /**
     * Create a new policy instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * 动态授权策略的destroy方法
     *
     * @param User $user     提出删除动态请求的用户
     * @param Status $status 要被删除的动态
     * @return void
     */
    public function destroy(User $user, Status $status)
    {
        return $user->id === $status->user_id;
    }
}
