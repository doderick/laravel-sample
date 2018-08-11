<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UsersController extends Controller
{
    /**
     * 用户注册的create动作
     *
     * @return 用户注册页面视图
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * 储存用户注册信息的方法
     *
     * @param Request $request 用户提交的注册请求
     * @return 注册成功后返回应用首页
     */
    public function store(Request $request)
    {
        // 对用户填写注册信息进行合法性验证
        $this->validate($request, [
            'name'     => 'required|max:50',
            'email'    => 'required|email|max:255',
            'password' => 'required|confirmed|min:6'
        ]);

        // 验证通过之后将信息写入对应的数据表users
        $user = User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => bcrypt($request->password)
        ]);

        // 注册成功之后给出欢迎语
        session()->flash('success', '您已成功注册，您即将在这里开始一段新的旅程～');

        // 重定向至应用首页
        return redirect()->route('home');
    }

    /**
     * 显示用户主页的方法
     *
     * @param User $user 用户的一个实例
     * @return 用户的主页
     */
    public function show(User $user)
    {
        return view('users.show', compact('user'));
    }
}
