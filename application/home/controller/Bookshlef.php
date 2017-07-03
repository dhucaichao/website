<?php

namespace app\home\controller;

use think\Controller;
use think\Request;
use think\Session;
use think\Db;
class bookshlef extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        if(empty(Session::get('home.name'))){
            $this->error('请先登录','index/index');
        }
        $name = Session::get('home.name');
        //查询用户ID
        $uid = Db::table('user')->where('nickname',$name)->value('id');
        //查询用户书架表
        $list = Db::table('collection')->where('uid',$uid)->select();
        //多少条数据
        $num = Db::table('collection')->where('uid',$uid)->count();
        for ($a=0;$a<$num;$a++){
            //最新章节
            $list[$a]['tnum'] = Db::table('chapter')->where('nid',$list[$a]['nid'])->max('tnum');
            //最新章节名
            $list[$a]['title']= Db::table('chapter')->where(['nid'=>$list[$a]['nid'],'tnum'=>$list[$a]['tnum']])->value('title');
            //最新章节更新时间
            $list[$a]['time'] = date('Y-m-d ',(Db::table('chapter')->where('nid',$list[$a]['nid'])->max('uptime')));
            //查作者
            $list[$a]['penname'] =Db::table('author')->where('id',(Db::table('novel')->where('id',$list[$a]['nid'])->value('aid')))->value('penname') ;
            //小说名
            $list[$a]['nid'] = Db::table('novel')->where('id',$list[$a]['nid'])->value('name');
        }

//        return dump($list);
        return view('bookshlef/index',['name'=>$name,'list'=>$list]);
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function add($nid)
    {
        $uid = Session::get('home.id');
        $data = ['nid'=>$nid,'uid'=>$uid];
        Db::table('collection')->insert($data);
        $this->redirect('noveldetails/ndindex',['id'=>$nid]);
    }

    public function delbook($id)
    {
        $result = Db::table('collection')->where('id',$id)->delete();
        if($result>0){
            return $this->success('删除成功','bookshlef/index');
        }else{
            return $this->error('删除失败','bookshlef/index');
        }

    }
}
