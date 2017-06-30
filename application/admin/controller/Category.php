<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;

class Category extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $list = db('category')->where('pid','0')->paginate(8);
        $arr = '一级分类';
        return view('category/index',['title'=>'小说分类管理','list'=>$list,'arr'=>$arr]);
    }

    public function index2($id)
    {
        $list = db('category')->where('pid',$id)->paginate(8);
        $arr = db('category')->where('id',$id)->find();
        $arr = $arr['name'];
        return view('category/index',['title'=>'小说分类管理','list'=>$list,'arr'=>$arr]);
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        $arr = db('category')->where('pid',0)->select();
        return view('category/add',['title'=>'添加多级分类','arr'=>$arr]);
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
        $result = db('category')->insert($data);
        if($result>0) {
            $this->success('添加成功','category/index');
        } else {
            $this->error('添加失败','category/create');
        }
    }

    public function create1()
    {
        return view('category/add1',['title'=>'添加一级分类']);
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save1(Request $request)
    {
        $data = input('post.');
        $result = db('category')->insert($data);
        if($result>0) {
            $this->success('添加成功','category/index');
        } else {
            $this->error('添加失败','category/create');
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

    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        $result = db('category')->where('id',$id)->find();
        $arr = db('category')->where('pid',0)->select();
        return view('category/edit',['title'=>'编辑分类','result'=>$result,'arr'=>$arr]);
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
        $result = db('category')->where('id',$id)->update($data);
        if($result>0) {
            $this->success('更新成功','category/index');
        } else {
            $this->error('更新失败','category/edit');
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
        $arr = db('category')->where('id', $id)->find();
        if ($arr['pid'] == 0) {
            $arr1 = db('category')->where('pid', $id)->select();
            if ($arr1 == null) {
                $result = db('category')->where('id', $id)->delete();
                if ($result > 0) {
                    $info['status'] = true;
                    $info['info'] = '分类已删除';
                } else {
                    $info['status'] = false;
                    $info['info'] = '分类删除失败,请重试!';
                }
            } else {
                $info['status'] = false;
                $info['info'] = '请先删除子分类';
            }
            return json($info);
        } else {
            $arr2 = db('novel')->where('cid', $id)->select();
            if ($arr2 == null) {
                $result = db('category')->where('id', $id)->delete();
                if ($result > 0) {
                    $info['status'] = true;
                    $info['info'] = '分类已删除';
                } else {
                    $info['status'] = false;
                    $info['info'] = '分类删除失败,请重试!';
                }
            } else {
                $info['status'] = false;
                $info['info'] = '请先删除该分类下的小说';
            }
            return json($info);
        }
    }
}
