<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class SessionsController extends Controller
{
    /**
     * 创建登录表单的方法
     *
     * @return 登录表单视图
     */
    public function create()
    {
        return view('sessions.create');
    }

    /**
     * Undocumented function
     *
     * @param Request $request
     * @return void
     */
    public function store(Request $request)
    {
        // 验证用户填写的信息是否合规
        $credentials = $this->validate($request, [
            'email'    => 'required|email|max:255',
            'password' => 'required|min:6'
        ]);

        // 将用户填写的登录请求信息与数据库中的数据进行比对
        if (Auth::attempt($credentials, $request->has('remember_me'))) {
            // 用户激活状态验证
            if (Auth::user()->is_activated) {
                session()->flash('success', Auth::user()->name.'，欢迎回来！');
                return redirect()->intended(route('users.show', [Auth::user()]));
            } else {
                Auth::logout();
                session()->flash('warning', '您的账号尚未激活，请检查邮箱中的激活邮件进行激活。');
                return redirect('home');
            }
        } else {
            session()->flash('danger', '抱歉，您的邮箱与密码不匹配，请重试～');
            return redirect()->back()->withInput($request->except('password'));
        }
    }

    /**
     * 用户退出的方法
     *
     * @return 登录页面
     */
    public function destroy()
    {
        Auth::logout();
        session()->flash('info', '您已成功退出～');
        return redirect()->route('login');
    }
}
