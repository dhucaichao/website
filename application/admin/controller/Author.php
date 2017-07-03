<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\Db;
use think\Image;

class Author extends Controller
{
    public function upload()
    {
        $file = request()->file('icon');
        $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
        if($info){
            return $info->getSaveName();
        }else{
            return $file->getError();
        }
    }
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $list = Db::table('author')->paginate(8);
        return view('author/index', ['title' => '后台作者管理', 'list' => $list]);
    }


    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        return view('author/add',['title'=>'添加作者']);
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        $aa = $this->upload();
        $data = input('post.');
        $data['icon'] =  DS . 'uploads' . DS . $aa;
        $data['regtime'] = time();
        $image = Image::open('uploads' . DS . $aa);
        $image->thumb(600, 600)->save('uploads' . DS . $aa);
        $data['regtime'] = time();
        $result = db('author')->insert($data);
        if($result>0) {
            $this->success('添加作者成功','author/index');
        } else {
            $this->error('添加作者失败','author/create');
        }
    }

    /**
     * 显示指定的资源
     *
     * @param  int $id
     * @return \think\Response
     */
    public function read($id)
    {
        if (!Request::instance()->isAjax()){
            $this->error('非法路径', 'author/index');
        }
        $list = db('author')->where('id', $id)->find();
        $list['regtime'] = date('Y-m-d',$list['regtime']);
        return json($list);
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int $id
     * @return \think\Response
     */
    public function edit($id)
    {
        $result = db('author')->where('id',$id)->find();
        return view('author/edit',['title'=>'编辑作者','result'=>$result]);
    }

    /**
     * 保存更新的资源
     *
     * @param  \think\Request $request
     * @param  int $id
     * @return \think\Response
     */
    public function update(Request $request,$id)
    {
        $aa = $this->upload();
        $data = input('post.');
        $data['icon'] =  DS . 'uploads' . DS . $aa;
        $image = Image::open('uploads' . DS . $aa);
        $image->thumb(600, 600)->save('uploads' . DS . $aa);
        $result = db('author')->where('id',$id)->update($data);
        if($result>0) {
            $this->success('更新成功','author/index');
        } else {
            $this->error('更新失败','author/edit');
        }
    }

    /**
     * 删除指定资源
     *
     * @param  int $id
     * @return \think\Response
     */
    public function delete($id)
    {
        $result = db('author')->where('id', $id)->delete();
        if ($result > 0) {
            $info['status'] = true;
            $info['info'] = '该作者已删除';
        } else {
            $info['status'] = false;
            $info['info'] = '作者删除失败,请重试!';
        }

        return json($info);
    }
}
