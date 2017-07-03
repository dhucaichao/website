<?php

namespace app\home\controller;

use think\Controller;
use think\Request;
use think\Session;
use think\Db;

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
        } elseif(!empty( Session::get('home.name')) && $tnum>1) {
            $uid = Session::get('home.id');  // 用户id
            $integral = Db::table('user')->where('id', $uid)->field('integral,level')->find();
            $integral1 = Db::table('novel')->where('id', $nid)->field('integral,aid')->find();
            $a = $integral['integral'];  // 用户目前积分
            $l = $integral['level'];   // 用户等级
            $b = $integral1['integral'];  //  小说目前积分
            $aid = $integral1['aid'];   // 小说作者的aid
            $ticketa = Db::table('assets')->where('aid', $aid)->field('integral')->find();
            $ccc = $ticketa['integral']; // assets里的作者积分
            $f = $l == 1 ? 10 : ($l == 2 ? 6 : 3);
            if ($a <= 0) {
                $this->error('积分不足,请先充值', 'index/index');
            } else {
                $a = $a - $f;
                $b = $b + $f;
                $ccc = $ccc + $f;
                Db::table('user')->where('id', $uid)->update(['integral' => $a]);
                Db::table('novel')->where('id', $nid)->update(['integral' => $b]);
                Db::table('assets')->where('aid', $aid)->update(['integral' => $ccc]);
                $list = db('chapter')->where('nid', $nid)->where('tnum', $tnum)->find();
                return view('novelcontent/index', ['list' => $list, 'nn' => $nn, 'au' => $au]);
            }
        } else {
            $list = db('chapter')->where('nid', $nid)->where('tnum', $tnum)->find();
            return view('novelcontent/index', ['list' => $list, 'nn' => $nn, 'au' => $au]);
        }

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
