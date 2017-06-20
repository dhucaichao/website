<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\Session;

class login extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $error = '';
        if (!request()->isPost()) {
            return view('login', ['error' => $error]);
        }
        $data = input('post.');
        $arr = db('admin')->where('name', $data['name'])->find();
        if (empty($arr)) {
            $error = '账户不存在';
            return view('login', ['error' => $error]);
        } elseif ($arr['pwd'] != $data['pwd']) {
            $error = '密码错误';
            return view('login', ['error' => $error]);
        } else {
            return view('index/index',['name'=>$data['name']]);
        }
        $_SESSION['admin']['name'] = $data['name'];
        $_SESSION['admin']['pwd'] = $data['pwd'];
    }

    public function logout()
    {
//        unset($_SESSION['admin']);
        Session::delete('admin');
        $this->success('退出成功', 'login/index', ['error' => '']);
    }

}
