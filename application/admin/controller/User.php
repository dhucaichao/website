<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\Image;
class User extends Controller
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

        $list = db('user')->paginate(8);

        return view('user/index', ['title' => '后台用户管理', 'list' => $list]);
    }


    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        return view('user/add',['title'=>'添加用户']);
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
        $image = Image::open('uploads' . DS . $aa);
        $image->thumb(30, 30)->save('uploads' . DS . $aa);
        $result = db('user')->insert($data);
        if($result>0) {
            $this->success('添加成功','user/index');
        } else {
            $this->error('添加失败','user/create');
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
            $this->error('非法路径', 'user/index');
        }
        $list = db('user')->where('id', $id)->find();
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
        $result = db('user')->where('id',$id)->find();
        return view('user/edit',['title'=>'编辑用户','result'=>$result]);
    }


    /**php

     * 保存更新的资源
     *
     * @param  \think\Request $request
     * @param  int $id
     * @return \think\Response
     */
    public function update(Request $request,$id)
    {

        $bb = $this->upload();
        $data = input('post.');
        $data['icon'] =  DS . 'uploads' . DS . $bb;
        $image = Image::open('uploads' . DS . $bb);
        $image->thumb(30, 30)->save('uploads' . DS . $bb);

        $result = db('user')->where('id',$id)->update($data);
        if($result>0) {
            $this->success('更新成功','user/index');
        } else {
            $this->error('更新失败','user/edit');
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
        $result = db('user')->where('id', $id)->delete();
        if ($result > 0) {
            $info['status'] = true;
            $info['info'] = '用户已删除';
        } else {
            $info['status'] = false;
            $info['info'] = '用户删除失败,请重试!';
        }

        return json($info);
    }
}
