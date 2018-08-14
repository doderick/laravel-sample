<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Notifications\ResetPassword;
use Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'can_rename'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * 用户获取头像的方法
     *
     * @param integer $size 用户头像的尺寸
     * @return 用户头像的链接
     */
    public function gravatar($size = '100')
    {
        $hash = md5(strtolower(trim($this->attributes['email'])));
        return "https://s.gravatar.com/avatar/{$hash}?s={$size}";
    }

    /**
     * 监听User模型的创建，生成激活令牌
     * 调用闭包函数，接受一个参数，新建用户模型的实例
     *
     * @return void
     */
    public static function boot()
    {
        parent::boot();
        static::creating(function ($user) {
            $user->activation_token = str_random(30);
        });
    }

    /**
     * 传递密码重置令牌至重置密码通知文件
     *
     * @param string $token 密码重置令牌
     * @return void
     */
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token));
    }

    /**
     * 处理用户和动态之间的关联
     * 一个用户可以拥有多条动态
     *
     * @return void
     */
    public function statuses()
    {
        return $this->hasMany(Status::class);
    }

    /**
     * 取出用户所有动态的方法
     *
     * @return 用户的所有动态，按发布时间倒序排列
     */
    public function feed()
    {
        $user_ids = Auth::user()->followings->pluck('id')->toArray();
        array_push($user_ids, Auth::user()->id);
        return Status::whereIn('user_id', $user_ids)
                            ->with('user')
                            ->orderBy('created_at', 'desc');
    }

    /**
     * 粉丝和用户之间的关系
     *
     * @return void
     */
    public function followers()
    {
        return $this->belongsToMany(User::class, 'followers', 'user_id', 'follower_id');
    }

    /**
     * 关注的人和用户之间的关系
     *
     * @return void
     */
    public function followings()
    {
        return $this->belongsToMany(User::class, 'followers', 'follower_id', 'user_id');
    }

    /**
     * 用户进行关注的方法
     *
     * @param array|integer $user_ids 需要关注的用户的id
     * @return void
     */
    public function follow($user_ids)
    {
        if (!is_array($user_ids)) {
            $user_ids = compact('user_ids');
        }
        $this->followings()->sync($user_ids, false);
    }

    /**
     * 用户取消关注的方法
     *
     * @param array|integer $user_ids 需要取消关注的用户的id
     * @return void
     */
    public function unfollow($user_ids)
    {
        if (!is_array($user_ids)) {
            $user_ids = compact('user_ids');
        }
        $this->followings()->detach($user_ids);
    }

    /**
     * 判断某个用户是否被当前用户所关注
     *
     * @param integer $user_id 需要进行判断的用户的id
     * @return boolean
     */
    public function isFollowing($user_id)
    {
        return $this->followings->contains($user_id);
    }
}