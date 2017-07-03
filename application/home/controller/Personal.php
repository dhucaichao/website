<?php

namespace app\home\controller;

use think\Controller;
use think\Request;
use think\Session;
use think\Db;
class Personal extends Controller
{
    public function upload(){
        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file('image');

        // 移动到框架应用根目录/public/uploads 目录下
        $info = $file->move(ROOT_PATH . 'public' . DS . 'uploads');
        if($info){
            // 成功上传后 获取上传信息

            // 输出 20170625/42a79759f284b767dfcb2a0197904287.jpg
            return  $info->getSaveName();
        }else{
            // 上传失败获取错误信息
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
        if(empty(Session::get('home.name'))){
            $this->error('请先登录','index/index');
        }
        $name = Session::get('home.name');
//        if(true){
//            $error = '请先登录';
//            $index = controller('home/Index','controller');
////            $index = action()
//            return time();
//        }
        //查询用户信息
        $list = Db::table('user')->where('nickname',$name)->find();
        return view('personal/index',[
            'name'=>$name,
            'list'=>$list
        ]);
    }

    public function ticket()
    {
        $name = Session::get('home.name');
        $uid = Db::table('user')->where('nickname',$name)->value('id');
        //查询书名
        $num = Db::table('ticket')->where('uid',$uid)->count();
        $list1 = Db::table('ticket')->where('uid',$uid)->select();
        for ($a=0;$a<$num;$a++){
            $bname[] = Db::table('novel')->where('id',$list1[$a]['nid'])->value('name');
        }
//        return dump($bname);
        //查询月票表
        $list = Db::table('ticket')->where('uid',$uid)->paginate(5);
        $page = $list->render();
        //查询月票总和
        $sum = Db::table('ticket')->where('uid',$uid)->sum('ticket');
        return view('personal/ticket',[
            'name'=>$name,
            'list'=>$list,
            'bname'=>$bname,
            'sum'=>$sum,
            'page'=>$page
        ]);
    }

    public function safe()
    {
        $error = '';
        $name = Session::get('home.name');
        $list = Db::table('user')->where('nickname',$name)->find();
        return view('personal/safe',['name'=>$name,'list'=>$list,'error'=>$error]);
    }

    //信息修改验证
    public function mod()
    {
        $name = Session::get('home.name');
        //接收信息
        $input = input('post.');
        //接收上传文件
        $images = request()->file('image');
        //判断表单完整性
        if (empty($input['nickname']&&$input['tel']&&$input['email']&&$input['sex']&&$images)){
            return $this->success('请确认表单完整性','index/safe');
        }
        //调用上传文件方法
        $image = $this->upload();
        //获取想要的文件路径
        $date = strstr($image,'\\',true);
        $image = substr(strstr($image,'\\'),1);
        $icon = '/uploads/'.$date.'/'.$image;
        //更新数据库
        $data = [
            'nickname'=>$input['nickname'],
            'tel'=>$input['tel'],
            'email'=>$input['email'],
            'sex'=>$input['sex'],
            'icon'=>$icon
        ];
        $result = Db::table('user')->where('nickname',$name)->update($data);
        if ($result>0){
            return $this->success('更新成功','personal/safe');
        }else{
            return $this->success('更新失败','persoal/safe');
        }
    }


    //修改密码页面
    public function modpwd()
    {
        $name = Session::get('home.name');
        $error = '';
        return view('personal/modpwd',['name'=>$name,'error'=>$error]);
    }

    //修改密码验证
    public function yzmodpwd()
    {
        $name = Session::get('home.name');
        //获取post数据
        $post = input('post.');
        $pwd = Db::table('user')->where('nickname',$name)->value('pwd');
        if (empty($post['pwd']&&$post['xpwd']&&$post['qrpwd'])){
            $error = '请填写完整表单';
            return $this->error($error,'personal/modpwd');
        }
        if($post['pwd']!==$pwd){
            $error = '原密码错误';
            return $this->error($error,'personal/modpwd');
        }elseif ($post['xpwd']!==$post['qrpwd']){
            $error = '两次密码不一致';
            return $this->error($error,'personal/modpwd');
        }elseif ($post['pwd']==$post['xpwd']){
            $error = '新密码不得和原密码一样';
            return $this->error($error,'personal/modpwd');
        }
        $result = Db::table('user')->where('nickname',$name)->update(['pwd'=>$post['xpwd']]);
        if($result>0){
            return $this->success('修改密码成功','personal/index');
        }
    }


    public function review()
    {
        $name = Session::get('home.name');
        //用户ID
        $uid = Db::table('user')->where('nickname',$name)->value('id');
        //查询用户评论
        $list1 = Db::table('comment')->where('uid',$uid)->select();
        $num =  Db::table('comment')->where('uid',$uid)->count();
        for ($a=0;$a<$num;$a++){
            $bname[] = Db::table('novel')->where('id',$list1[$a]['nid'])->value('name');
        }
//        $list = $list->paginate(3);
//        return dump($list);
        $list = Db::table('comment')->where('uid',$uid)->paginate(5);
        $page = $list->render();
        return view('personal/comment',['name'=>$name,'list'=>$list,'bname'=>$bname,'page'=>$page]);
    }
}
