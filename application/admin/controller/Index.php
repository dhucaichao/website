<?php

namespace app\admin\controller;

use think\Controller;
use think\Session;

class Index extends Controller
{
    public function index()
    {
        if (empty(Session::get('admin.name'))){
            return redirect('login/index');
        } else {
            return view('index/index',['name'=>Session::get('admin.name')]);
        }
    }

    public function clear()
    {
        Session::clear();
        return view('login/login', ['error' => '']);
    }
}
