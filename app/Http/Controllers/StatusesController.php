<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Status;
use Auth;

class StatusesController extends Controller
{
    /**
     * 构造中间件过滤http请求
     * 只允许登录用户访问
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * 存储用户发布动态的方法
     *
     * @param Request $request 用户发布动态的请求
     * @return 返回动态发布提交页面
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'content' => 'required|max:140'
        ]);

        Auth::user()->statuses()->create([
            'content' => $request['content']
        ]);
        return redirect()->back();
    }

    /**
     * 删除动态的方法
     *
     * @param Status $status 要被删除的动态
     * @return 返回动态删除请求页
     */
    public function destroy(Status $status)
    {
        $this->authorize('destroy', $status);
        //$status->delete();
        session()->flash('success', '动态已被成功删除！');
        return redirect()->back();
    }
}
