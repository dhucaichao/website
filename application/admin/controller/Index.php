<?php

namespace app\admin\controller;

use think\Controller;
use think\session;

class Index extends Controller
{
    public function _initialize()
    {
        if (empty(Session('admin'))) {
            $this->error('请先登录', 'login/index', ['error' => '']);
        }
        return view('index/index');
    }

    public function index()
    {
        return view();
    }

    public function clear()
    {
        Session::clear();
        return view('index');
    }
}
