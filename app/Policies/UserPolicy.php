<?php

namespace App\Policies;

use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class UserPolicy
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
     * 用户删除策略的update方法
     *
     * @param User $currentUser 当前登录的用户实例
     * @param User $user        需要edit，update的用户实例
     * @return void
     */
    public function update(User $currentUser, User $user)
    {
        return $currentUser->id === $user->id;
    }

    /**
     * 用户授权策略的destroy方法
     *
     * @param User $currentUser 当前登录的用户实例
     * @param User $user        需要destroy的用户实例
     * @return void
     */
    public function destroy(User $currentUser, User $user)
    {
        return $currentUser->is_admin && $currentUser->id !== $user->id;
    }
}
