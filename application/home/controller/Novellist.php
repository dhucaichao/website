<?php

namespace app\home\controller;

use think\Controller;
use think\Request;
use think\Db;
class novellist extends Controller
{
    /**;
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $list1 = Db::table('category')->where('pid',1)->field('name,id')->select();
        $list2 = Db::table('category')->where('pid',2)->field('name,id')->select();
        $list = Db::table('category')->field('name')->select();
//        $list4 = Db::query('select *,n.name k,n.id n,penname from novel n,category c,author a where n.cid=c.id and n.aid=a.id');
        $list4 = Db::table('novel')->alias('n')->join('category c','n.cid=c.id')->join('author a','n.aid=a.id')->field('*,n.name k,n.id n,penname')->paginate(9);
        return view('novellist/index',['list1'=>$list1,'list2'=>$list2,'list'=>'','list4'=>$list4]);
    }

    public function nindex($type)
    {
        $list1 = Db::table('category')->where('pid',$type)->field('name,id')->select();
        $list4 = Db::table('novel')->alias('n')->join('category c','n.cid=c.id')->join('author a','n.aid=a.id')->where('c.pid',$type)->field('*,n.name k,n.id n,penname')->paginate(9);
        return view('novellist/index',['list1'=>$list1,'list2'=>'','list'=>'','list4'=>$list4]);
    }


    public function tindex($num1,$num2)
    {
        $list1 = Db::table('category')->field('name,id')->select();
        $list4 = Db::table('novel')->alias('n')->join('category c','n.cid=c.id')->join('author a','n.aid=a.id')->where('n.twords','>',$num1)->where('n.twords','<',$num2)->field('*,n.name k,n.id n,penname')->paginate(9);
        return view('novellist/index',['list1'=>$list1,'list2'=>'','list'=>'','list4'=>$list4]);
    }


    public function mindex($m)
    {
        $list1 = Db::table('category')->field('name,id')->select();
        $list4 = Db::table('novel')->alias('n')->join('category c','n.cid=c.id')->join('author a','n.aid=a.id')->where('n.isover',$m)->field('*,n.name k,n.id n,penname')->paginate(9);
        return view('novellist/index',['list1'=>$list1,'list2'=>'','list'=>'','list4'=>$list4]);
    }


    public function kindex($id)
    {
        $list1 = Db::table('category')->field('name,id')->select();
        $list4 = Db::table('novel')->alias('n')->join('category c','n.cid=c.id')->join('author a','n.aid=a.id')->where('n.cid',$id)->field('*,n.name k,n.id n,penname')->paginate(9);
        return view('novellist/index',['list1'=>$list1,'list2'=>'','list'=>'','list4'=>$list4]);
    }
    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        //
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request  $request
     * @param  int  $id
     * @return \think\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        //
    }
}
