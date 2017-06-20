<?php

namespace app\writer\controller;

use think\Controller;
use think\Request;
use think\Session;

class login extends Controller
{
//    判断登录
    public function writerlogin()
    {
//        $error = '';
        $list = input('post.');
        $request = db('author')->where('penname',$list['penname'])->find();
//        判断是否是POST方式访问的
        if(!request()->isPost()){
            $error = '请正常登录';
            return view('index/writer-login');
        }
        if(empty($request)){
            $error = '账号不存在';
            return view('index/writer-login',['error'=>$error]);
        }elseif($request['pwd'] !== $list['pwd']){
            $error = '密码不正确';
            return view('index/writer-login',['error'=>$error]);
        }else{
            Session::set('author.pwd',$list['pwd']);
            Session::set('author.penname',$list['penname']) ;
            return view('index/writer-index',['penname'=>$list['penname']]);
        }


    }
}
