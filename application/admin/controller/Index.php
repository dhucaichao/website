<?php
namespace app\admin\controller;
use think\Controller;

class Index extends Controller
{
    public function index()
    {
        $this->assign('title','后台首页');
        return $this->fetch('index/index');
    }
}
