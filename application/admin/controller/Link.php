<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;

class Link extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $list = db('link')->paginate(5);;
        return view('link/index',['list'=>$list, 'title'=>'链接']);
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        return view('link/add',['title'=>'添加链接']);
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        $data = input('post.');
        $result = db('link')->insert($data);
        if($result>0) {
            $this->success('添加成功','link/index');
        } else {
            $this->error('添加失败','link/create');
        }
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
        $result = db('link')->where('id',$id)->find();
        return view('link/edit',['title'=>'更换链接','result'=>$result]);
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
        $data = input('post.');
        $result = db('link')->where('id',$id)->update($data);
        if($result>0) {
            $this->success('更新成功','link/index');
        } else {
            $this->error('更新失败','link/edit');
        }
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        $result = db('link')->where('id', $id)->delete();
        if ($result > 0) {
            $info['status'] = true;
            $info['info'] = '链接已删除';
        } else {
            $info['status'] = false;
            $info['info'] = '链接删除失败,请重试!';
        }

        return json($info);
    }
}
