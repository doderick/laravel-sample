<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Mail;

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

        // 发送激活邮件
        $this->sendActivateEmailTo($user);

        // 提示用户查收激活邮件
        session()->flash('info', '激活邮件已发送到您的邮箱上，请注意查收～');

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

    /**
     * 发送激活邮件的方法
     *
     * @param $user 新注册的用户
     * @return void
     */
    public function sendActivateEmailTo($user)
    {
        $view = 'emails.activate';
        $data = compact('user');
        $to = $user->email;
        $subject = "感谢您注册Sample Ⅴ！请确认您的邮箱地址。";

        Mail::send($view, $data, function($message) use ($to, $subject) {
            $message->to($to)->subject($subject);
        });
    }

    /**
     * 用户激活的方法
     *
     * @param integer $id   执行激活操作的用户的id
     * @param string $token 执行激活操作的用户的激活令牌
     * @return 激活用户的主页
     */
    public function activate($id, $token)
    {
        $user = User::find($id);
        if ($user->activation_token === $token) {
            $user->is_activated = true;
            $user->activation_token = null;
            $user->save();
        }

        // 用户激活后自动登录
        Auth::login($user);
        session()->flash('success', '恭喜您，您的账号已经激活。');
        return redirect()->route('users.show', compact('user'));
    }
}
