<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\Image;
class banner extends Controller
{

    public function upload()
    {
        $file = request()->file('image');
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
        $list = db('banner')->paginate(1);;
        return view('banner/index',['list'=>$list, 'title'=>'轮播图']);
    }

    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        return view('banner/add',['title'=>'添加轮播图']);
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
        $data['image'] =  DS . 'uploads' . DS . $aa;
        $image = Image::open('uploads' . DS . $aa);
        $image->thumb(600, 600)->save('uploads' . DS . $aa);
        $result = db('banner')->insert($data);
        if($result>0) {
            $this->success('添加成功','banner/index');
        } else {
            $this->error('添加失败','banner/create');
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
        $result = db('banner')->where('id',$id)->find();
        return view('banner/edit',['title'=>'更换轮播图','result'=>$result]);
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
        $data['image'] =  DS . 'uploads' . DS . $bb;
        $image = Image::open('uploads' . DS . $bb);
        $image->thumb(600, 600)->save('uploads' . DS . $bb);
        $result = db('banner')->where('id',$id)->update($data);
        if($result>0) {
            $this->success('更新成功','banner/index');
        } else {
            $this->error('更新失败','banner/edit');
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
        $result = db('banner')->where('id', $id)->delete();
        if ($result > 0) {
            $info['status'] = true;
            $info['info'] = '图片已删除';
        } else {
            $info['status'] = false;
            $info['info'] = '图片删除失败,请重试!';
        }

        return json($info);
    }
}
