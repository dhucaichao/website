<?php
namespace app\writer\controller;

use think\Controller;
use think\Db;
use think\Session;

class Index extends Controller
{
    //登录页面
    public function index()
    {
        $error = '';
        return view('index/writer-login',['error'=>$error]);
    }
    
    //跳转作者主页
    public function writerpersonal()
    {
        $penname = Session::get('author.penname');
        $list = Db::table('author')->where('penname',$penname)->find();
        return view('index/writer-index',[
            'penname'=>Session::get('author.penname'),
            'endnover'=>$list['endnover'],
            'serialnover'=>$list['serialnover']
        ]);
    }

    //作者登录验证
    public function writerlogin()
    {

        $error = '';
        $list = input('post.');
        $captcha = $list['yzm'];
        $request = db('author')->where('penname',$list['penname'])->find();
//        判断是否是POST方式访问的
        if(!request()->isPost()){
            $error = '请正常登录';
            return view('index/writer-login',['error'=>$error]);
        }
        if(empty($request)){
            $error = '账号不存在';
            return view('index/writer-login',['error'=>$error]);
        }elseif($request['pwd'] !== $list['pwd']){
            $error = '密码不正确';
            return view('index/writer-login',['error'=>$error]);
        }elseif(!captcha_check($captcha)){
            $error = '验证码不正确';
            return view('index/writer-login',['error'=>$error]);
        } else{
            Session::set('author.pwd',$list['pwd']);
            Session::set('author.penname',$list['penname'],'think') ;
//            return view('index/writer-index',['penname'=>Session::get('author.penname')]);
            return $this->success('登录成功', 'index/writerpersonal');
        }

    }
    
    //用户退出操作
    public function writerout()
    {
        $error = '';
        Session::delete('author','think');
        return view('index/writer-login',['error'=>$error]);
    }

    //注册跳转
    public function writerregiste()
    {
        $error = '';
        return view('writer-registe',['error'=>$error]);
    }

    //作者注册验证
    public function submitregiste()
    {
        $list = input('post.');
        $captcha = $list['yzm'];
        $error = '';

        if(empty($list['penname']&&$list['pwd']&&$list['yzm'])){
            $error = '请填写完整注册信息';
            return view('index/writer-registe',['error'=>$error]);
        }
        if(!captcha_check($captcha)){
            $error = '验证码不正确';
            return view('index/writer-registe',['error'=>$error]);
        };
        $data = ['penname'=>$list['penname'],'pwd'=>$list['pwd']];
        $result = Db::table('author')->insert($data);
        if(!empty($result)){
            $error = '注册成功';
            return view('index/writer-login',['error'=>$error]);

        }
        return view('index/writer-registe');
    }

    //跳转到创建小说页面
    public function writerfound()
    {
        $error = '';
        return view('index/writer-found',['penname'=>Session::get('author.penname'),'error'=>$error]);
    }

    //创建的小说审核验证
    public function foundverify()
    {
//        return dump(input('post.'));
        $error = '';
        if(empty(Session::get('author.penname'))){
            $error = '请先登录';
            return view('index/writer-found',['error'=>$error]);
        }
        //判断是否是POST形式访问!request()->isPost()
        if (!request()->isPost()){
            $error = '请使用正确的访问方式';
            return view('index/writer-found',['error'=>$error]);
        }
        //作者登录用户名
        $penname = Session::get('author.penname');
        //获取post数据
        $list = input('post.');
        //判断表单是否填写完整
        if(empty($list['name']&&$list['zpfl']&&$list['status']&&$list['suggest']&&$list['section']&&$list['text']&&$list['file'])){
            $error = '请完整的填写表单';
            return view('index/writer-found',['error'=>$error,'penname'=>$penname]);
        }
        //查询不到数据则返回false
        $id = Db::table('author')->where('penname',$penname)->value('id');
        if(empty($id)){
            $error = '请先登录';
            return view('index/writer-login',['error'=>$error,'penname'=>$penname]);
        }else{
            $data = [
                'aid'=>$id,
                'name'=>$list['name'],
                'isover'=>$list['status'],
                'desc'=>$list['suggest']
            ];
            Db::name('novel')->insert($data);
            $novelid = Db::name('novel')->getLastInsID();
            if($novelid >= 1){
            return $this->success('作品添加成功,审核中...','index/writerpersonal');
            }
        }

    }

    //跳转作者信息
    public function writerinfo()
    {
        $penname = Session::get('author.penname');
        $aid = Db::table('author')->where('penname',$penname)->value('id');
        $list = Db::table('authorinfo')->where('aid',$aid)->find();
        return view('index/writer-info',[
            'penname'=>Session::get('author.penname'),
            'wname'=>$list['wname'],
            'idnumber'=>$list['idnumber'],
            'name'=>$list['name'],
            'tel'=>$list['tel'],
            'inclination'=>$list['inclination'],
            'qq'=>$list['qq'],
            'sex'=>$list['sex'],
            'email'=>$list['email'],
            'icon'=>$list['icon'],
            'status'=>$list['status'],
            'level'=>$list['level'],
            'icon'=>$list['icon']
        ]);
    }

    //文件上传获取数据
    public function upload(){
        // 获取表单上传文件 例如上传了001.jpg
        $file = request()->file('image');
        // 移动到框架应用根目录/public/static/writer/images 目录下
        $info = $file->validate(['size'=>155678,'ext'=>'jpg,png,gif'])->move(ROOT_PATH . 'public' . DS . '/static/writer/images');
        if($info){
        // 成功上传后 获取上传信息

            // 输出 20170625/42a79759f284b767dfcb2a0197904287.jpg
            return  $info->getSaveName();
        }else{
            // 上传失败获取错误信息
            return $file->getError();
        }
    }

    //修改信息判断
    public function infomod()
    {
        //查询用户的ID
        $penname = Session::get('author.penname');
        $aid = Db::table('author')->where('penname',$penname)->value('id');
        //调用上传文件方法
        $image = $this->upload();
        //获取想要的文件路径
        $date = strstr($image,'\\',true);
        $image = substr(strstr($image,'\\'),1);
        $icon = '/static/writer/images/'.$date.'/'.$image;

        //接收POST数据
        $list = input('post.');
        $result = Db::table('authorinfo')->where('aid',$aid)->update([
            'wname'=>$list['wname'],
            'idnumber'=>$list['idnumber'],
            'name'=>$list['name'],
            'tel'=>$list['tel'],
            'inclination'=>$list['inclination'],
            'qq'=>$list['qq'],
            'sex'=>$list['sex'],
            'email'=>$list['email'],
            'icon'=>$icon
        ]);
        if(!$result>0){
            return $this->success('信息更新失败','index/writerinfo');
        }else{
            return $this->success('信息更新成功','index/writerinfo');
        }
    }


}
