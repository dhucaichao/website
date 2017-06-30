<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\Image;
class Novel extends Controller
{
    public function upload()
    {
        $file = request()->file('face');
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
        $list = db('novel')->paginate(6);
        $page = $list->render();
        return view('novel/index', ['title' => '后台书籍管理', 'list' => $list,'page'=>$page]);
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        return view('novel/add',['title'=>'添加书籍']);
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        $aa = $this->upload();
        $data = input('post.');
        $data['face'] =  DS . 'uploads' . DS . $aa;
        $image = Image::open('uploads' . DS . $aa);
        $image->thumb(30, 30)->save('uploads' . DS . $aa);
        $result = db('novel')->insert($data);
        if($result>0) {
            $this->success('添加成功','novel/index');
        } else {
            $this->error('添加失败','novel/create');
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
        if (!Request::instance()->isAjax()){
            $this->error('非法路径', 'novel/index');
        }
        $list = db('novel')->where('id', $id)->find();
        return json($list);
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($id)
    {
        $result = db('novel')->where('id',$id)->find();
        return view('novel/edit',['title'=>'编辑书籍','result'=>$result]);
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
        $bb = $this->upload();
        $data = input('post.');
        $data['face'] =  DS . 'uploads' . DS . $bb;
        $image = Image::open('uploads' . DS . $bb);
        $image->thumb(30, 30)->save('uploads' . DS . $bb);
        $result = db('novel')->where('id',$id)->update($data);
        if($result>0) {
            $this->success('更新成功','novel/index');
        } else {
            $this->error('更新失败','novel/edit');
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
        $result = db('novel')->where('id', $id)->delete();
        if ($result > 0) {
            $info['name'] = true;
            $info['info'] = '书籍已删除';
        } else {
            $info['name'] = false;
            $info['info'] = '删除书籍失败,请重试!';
        }

        return json($info);

    }

}
