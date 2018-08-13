<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    /**
     * The attributes that should be hidden for arrays.
     * 允许填充content字段
     *
     * @var array
     */
    protected $fillable = [
        'content'
    ];

    /**
     * 处理动态与用户之间的关联
     * 一条动态属于一个用户
     *
     * @return void
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
