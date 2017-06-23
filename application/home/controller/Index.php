<?php
namespace app\home\controller;
use think\captcha;

class Index
{
    public function index()
    {
        return view('default');
    }

    public function login()
    {
        $a = input('post.');
        $captcha = $a['yzm'];
        if(!captcha_check($captcha)){
            return 1;
        } else {

        }
        return dump(input('post.'));
    }
    public function sign()
    {
        return view();
    }
}
