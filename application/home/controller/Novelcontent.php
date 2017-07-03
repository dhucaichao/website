<?php

namespace app\home\controller;

use think\Controller;
use think\Request;
use think\Session;

class novelcontent extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index($tnum,$nid,$nn,$au)
    {
        if ($tnum>1 && empty( Session::get('home.name') )){
            $this->error('vip章节,请先登录','index/index');
        }
        $list = db('chapter')->where('nid',$nid)->where('tnum',$tnum)->find();
        return view('novelcontent/index',['list'=>$list,'nn'=>$nn,'au'=>$au]);
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function index1($nid,$tnum,$nn,$au)
    {
        $b = db('chapter')->where('nid',$nid)->field('min(tnum) m')->find();
        if($tnum > $b['m']){
            $tnum--;
        }
        $this->redirect('index',['tnum'=>$tnum,'nn'=>$nn,'au'=>$au,'nid'=>$nid]);
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function index2($nid,$tnum,$nn,$au)
    {
        $a = db('chapter')->where('nid',$nid)->field('max(tnum) m')->find();
        if($tnum < $a['m']){
            $tnum++;
        }
        $this->redirect('index',['tnum'=>$tnum,'nn'=>$nn,'au'=>$au,'nid'=>$nid]);
    }

}
