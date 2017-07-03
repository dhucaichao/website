<?php

namespace app\admin\controller;

use think\Controller;
use think\Db;
use think\Request;

class Comment extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $list = Db::table('comment')->alias('c')->join('novel n','c.nid=n.id')->join('user u','c.uid=u.id')->field('c.id,c.content,n.name,u.nickname,c.time')->paginate(6);
        return view('index',['list'=>$list,'title'=>'评论列表']);
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
        $list = Db::table('reply')->alias('c')->join('novel n','c.nid=n.id')->join('user u','c.uid=u.id')->field('c.id,c.content,n.name,u.nickname,c.time')->where('c.did',$id)->paginate(6);
        return view('index2',['list'=>$list,'title'=>'评论回复列表']);
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
        $result = db('comment')->where('id', $id)->delete();
        $result1 = db('reply')->where('did', $id)->delete();
        if ($result > 0) {
            $info['status'] = true;
            $info['info'] = '评论已删除';
        } else {
            $info['status'] = false;
            $info['info'] = '评论删除失败,请重试!';
        }

        return json($info);
    }


    public function delete1($id)
    {
        $result = db('reply')->where('id', $id)->delete();
        if ($result > 0) {
            $info['status'] = true;
            $info['info'] = '评论回复已删除';
        } else {
            $info['status'] = false;
            $info['info'] = '评论回复删除失败,请重试!';
        }

        return json($info);
    }
}
