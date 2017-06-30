<?php
namespace app\home\controller;
use think\captcha;

use think\Request;
use think\Session;
use think\Controller;
use think\Db;
class Index extends Controller
{
    public function index()
    {
        $list1 = Db::query('select *,n.name k,penname from novel n,category c,author a where c.pid=1 and n.cid=c.id and n.aid=a.id order by Tticket limit 0,5' );
        $list = db('banner')->select();
        if (!empty(Session::get('home.name'))){
            return view('default',['logined'=>2,'name'=>Session::get('home.name'),'list'=>$list,'list1'=>$list1]);
        } else {
            return view('default',['logined'=>1,'list'=>$list,'list1'=>$list1]);
        }
    }

    public function login(Request $request)
    {
        $a = Request::instance()->post();
        $arr= db('user')->where('tel',$a['tel'])->find();
        $captcha = $a['yzm'];
        if (empty($arr)){
            $info['status'] = 1;
            $info['error'] = '该用户不存在';
            return json($info);
        } elseif ($arr['pwd'] != $a['pwd']) {
            $info['status'] = 2;
            $info['error'] = '密码错误';
            return json($info);
        }
//        elseif(!captcha_check($captcha)){
//            $info['status'] = 3;
//            $info['error'] = '验证码错误';
//            return json($info);
//        }
        else {
            $info['status'] = 4;
            $info['name'] = $arr['nickname'];
            Session::set('home.name',$arr['nickname'],'think');
            Session::set('home.tel',$arr['tel'],'think');
            return json($info);
        }
    }

    public function loginout()
    {
        Session::delete('home');
        $this->redirect('index');
    }
    public function sign()
    {
        return view('reg');
    }

    public function reg()
    {
        $result = input('post.');
        $arr['tel'] = $result['tel'];
        $arr['pwd'] = $result['pwd'];
        $arr['nickname'] = '书友'.$arr['tel'];
        $a = db('user')->insert($arr);
        if($a>0){
            $this->success('注册成功','index/index');
        } else {
            $this->error('注册失败','index/index');
        }
    }

    public function regt(Request $request)
    {
        $b = Request::instance()->post();
        $arr = db('user')->where('tel',$b['tel'])->find();
        if (!empty($arr)) {
            $info['status'] = 0;
            return json($info);
        } else {
            $info['status'] = 1;
            return json($info);
        }
    }
}
