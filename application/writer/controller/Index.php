<?php
namespace app\writer\controller;

use think\Controller;

class Index extends Controller
{
    public function index()
    {
        return view('index/writer-login');
    }


}
