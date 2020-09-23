<?php

namespace app\controller;

use support\Db;
use support\Request;

class User
{
    public function hello(Request $request)
    {
        $default_name = 'webman';
        // 从get请求里获得name参数，如果没有传递name参数则返回$default_name
        $name = $request->get('name', $default_name);
        // 向浏览器返回字符串
        return response('Hi ' . $name);
    }

    public function welcome(Request $request)
    {
        $default_name = 'webman';
        $name         = $request->get('name', $default_name);

        return json([
            'code' => 0,
            'msg'  => 'ok',
            'data' => $name,
        ]);
    }

    public function view_hello(Request $request)
    {
        $default_name = 'webman';
        $name         = $request->get('name', $default_name);

        return view('user/view_hello', ['name' => $name]);
    }

    public function db(Request $request)
    {
        $default_uid = 29;

        $uid = $request->get('id', $default_uid);

        $name = Db::table('user')->where('id', $uid)->value('name');

        return response("hello $name");
    }
}
