<?php

namespace app\home\controller;

use think\Controller;
use think\Request;
use think\Db;
class noveldir extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index($id,$nn,$au,$nid)
    {
        $list = Db::table('chapter')->where('nid',$id)->order('tnum')->select();
        return view('noveldir/index',['nn'=>$nn,'au'=>$au,'list'=>$list,'nid'=>$nid]);
    }




}
