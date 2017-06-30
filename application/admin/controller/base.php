<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;

use think\Session;
class Base extends Controller
{
    public function _initialize()
    {

        if (empty(Session::get('admin.name'))) {

            $this->error('请先登录', 'login/index', ['error' => '']);
        }
        return view('index/index');
    }
}
