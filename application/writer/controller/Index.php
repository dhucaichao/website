<?php
namespace app\writer\controller;

use think\Controller;
use think\Db;
use think\Request;
use think\Session;
use think\image;

class Index extends Controller
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

    //登录页面
    public function index()
    {


        $error = '';
        return view('index/writer-login',['error'=>$error]);
    }
    
    //跳转作者主页
    public function writerpersonal()
    {
        header("Content-Type: text/html; charset=utf-8");
        $num = 20; //返回数量
        $url = 'http://api.tianapi.com/txapi/pitlishi/?key=545519d7d9cdbf358b88380fb8af00af&num='.$num.'&rand';     //API接口
        $ch = curl_init();
        $timeout = 5;
        curl_setopt ($ch, CURLOPT_URL, $url);
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        $file_contents = curl_exec($ch);
        curl_close($ch);
//  var_dump(json_decode($file_contents ));
        $json = json_decode($file_contents,true);
//        return dump($json);
        if($json['code'] == 200){
            $txapi=$json['newslist'];
//            return dump($txapi);
        }else{
            echo "返回错误，状态消息：".$json['msg'];
        }


        $penname = Session::get('author.penname');
        if(empty($penname)){
            return $this->error('请先登录','index/index');
        }
        //查询作者ID
        $aid = Db::table('author')->where('penname',$penname)->value('id');
        //查询该用户正在连载的书名
        $where1 = ['aid'=>$aid,'isover'=>1];
        $list1 = Db::table('novel')->where($where1)->select();
        //查询该用户已完本的小说
        $where2 = ['aid'=>$aid,'isover'=>2];
        $list2 = Db::table('novel')->where($where2)->select();
//        return dump($list2);
        return view('index/writer-index',[
            'penname'=>$penname,
            'list1'=>$list1,
            'list2'=>$list2,
            'txapi'=>$txapi

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
            return $this->success('登录成功', 'index/writerinfo');
        }

    }
    
    //用户退出操作
    public function writerout()
    {
        $error = '';
        Session::delete('author','think');
        return $this->success( '','index/index');
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
        $result = Db::table('author')->where('penname',$list['penname'])->value('id');
        if($result>0){
            $error = '用户名已存在';
            return view('index/writer-registe',['error'=>$error]);
        }

        $data = ['penname'=>$list['penname'],'pwd'=>$list['pwd']];
        $result = Db::table('author')->insertGetId($data);


        if(!empty($result)){
            $id = Db::table('authorinfo')->insertGetId(['aid'=>$result,'wname'=>$list['penname']]);
            if(!empty($id)){
                $aid = Db::table('assets')->insertGetId(['aid'=>$result]);
                if(!empty($aid)){

                    return $this->success('注册成功', 'index/index');
                }

            }

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
            return $this->error('请先登录', 'index/index');
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
        $content = input('content');
        //判断书名是否重复
        $result1 = Db::table('novel')->where('name',$list['name'])->value('id');
        if($result1){
            $error = '小说名已存在';
            return $this->success('小说名已存在','index/writerfound');
        }
        //判断表单是否填写完整
        if(empty($list['name']&&$list['zpfl']&&$list['status']&&$list['suggest']&&$list['section']&&$content&&(request()->file('image')))){
            $error = '请完整的填写表单';
            return view('index/writer-found',['error'=>$error,'penname'=>$penname]);
        }

        //调用上传文件方法
            $image = $this->upload();
            //获取想要的文件路径
            $date = strstr($image,'\\',true);
            $image = substr(strstr($image,'\\'),1);
            $icon = '/uploads/'.$date.'/'.$image;
        //查询不到数据则返回false
        $id = Db::table('author')->where('penname',$penname)->value('id');
        if(empty($id)){
            $error = '请先登录';
            return view('index/writer-login',['error'=>$error,'penname'=>$penname]);
        }else{
            //向novel表添加数据
            $data = [
                'aid'=>$id,
                'name'=>$list['name'],
                'isover'=>$list['status'],
                'desc'=>$list['suggest'],
                'face'=>$icon,
                'cid'=>$list['zpfl'],
                'uptime'=>time()
            ];
            Db::name('novel')->insert($data);
            $novelid = Db::name('novel')->getLastInsID();
            //向chapter表添加数据
            $sql = [
                'nid'=>$novelid,
                'tnum'=>1,
                'content'=>$content,
                'title'=>$list['section'],
                'uptime'=>time()
            ];
            Db::name('chapter')->insert($sql);
            $chapterid = Db::name('chapter')->getLastInsID();
            if($novelid >= 1&&$chapterid>=1){
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
        ]);
    }


    //修改用户信息判断
    public function infomod()
    {
        //查询用户的ID
        $penname = Session::get('author.penname');
        $aid = Db::table('author')->where('penname',$penname)->value('id');
        //获取表中的原图片
        $list = Db::table('authorinfo')->where('aid',$aid)->find();
        $icon = $list['icon'];
        //判断是否接受到页面传过来图片信息
        if (!empty(request()->file('image'))){
            //调用上传文件方法
            $image = $this->upload();
            //获取想要的文件路径
            $date = strstr($image,'\\',true);
            $image = substr(strstr($image,'\\'),1);
            $icon = '/uploads/'.$date.'/'.$image;
        }
        //接收POST数据
        $list = input('post.');
        //修改信息
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
    
    
    //跳转小说详情页
    public function writerdet($name)
    {
        $penname = Session::get('author.penname');
        //查询用户ID
        $aid = Db::table('author')->where('penname',$penname)->value('id');
        //按用户ID和书名查询信息
        $where = ['aid'=>$aid,'name'=>$name];
        $list = Db::table('novel')->where($where)->find();
        if($list['isover']==1){
            $list['isover']='连载';
        }else{
            $list['isover']='完本';
        }
        //小说ID
        $nid = $list['id'];
        //获取最新章节数
        $tnum = Db::table('chapter')->where('nid',$nid)->max('tnum');
//        return dump($nid);
        //获取最新章节名
        $title = Db::table('chapter')->where(['nid'=>$nid,'tnum'=>$tnum])->value('title');
        //获取分类名
        $cname = Db::table('category')->where('id',$list['cid'])->value('name');
        //返回信息到页面
        return view('index/writer-details',[
            'penname'=>$penname,
            'name'=>$name,
            'tnum'=>$tnum,
            'categorty'=>$cname,
            'isover'=>$list['isover'],
            'desc'=>$list['desc'],
            'face'=>$list['face'],
            'title'=>$title
        ]);
    }


    //跳转添加章节页面
    public function writeradd($name)
    {
        $penname = Session::get('author.penname');
        //查找作者ID
        $aid = Db::table('author')->where('penname',$penname)->value('id');
        //查找小说ID
        $sql = ['aid'=>$aid,'name'=>$name];
        $id = Db::table('novel')->where($sql)->value('id');
        //查找小说章节
        $tnum = Db::table('chapter')->where('nid',$id)->max('tnum');
        $list = Db::table('chapter')->where(['nid'=>$id,'tnum'=>$tnum])->find();
//        return dump($list);
        return view('index/writer-add',['penname'=>$penname,'name'=>$name,'num'=>(empty($list['tnum'])?0:$list['tnum']),'title'=>$list['title']]);
    }
    
    
    //添加小说章节验证
    public function writeraddyz()
    {
        $post = input('post.');
        $content = input('content');
        //查询对应书名的ID
        $nid = Db::table('novel')->where('name',$post['penname'])->value('id');
        //添加数据到小说表chapter
        $sql = [
            'nid'=>$nid,
            'tnum'=>($post['tnum']+1),
            'content'=>$content,
            'title'=>$post['newtitle'],
            'uptime'=>time()
        ];
        Db::name('chapter')->insert($sql);
        $chapterid = Db::name('chapter')->getLastInsID();
        if($chapterid>=1){
            return $this->success('章节添加成功','index/writerpersonal');
        }else{
            return $this->success('章节添加失败','index/writerpersonal');
        }
    }


    //跳转修改密码页面
    public function modpwd()
    {
        $error = '';
        $penname = Session::get('author.penname');
        return view('index/writer-modpwd',['penname'=>$penname,'error'=>$error]);
    }
    
    
    //修改密码验证
    public function writermodpwd()
    {
        $post = input('post.');
        $penname = Session::get('author.penname');
        //查询用户原密码
        $pwd = Db::table('author')->where('penname',$penname)->value('pwd');
        //判断表单原密码是否与数据库一致
        if($pwd!==$post['ypwd']){
            $error = '原密码不正确';
            return view('index/writer-modpwd',['penname'=>$penname,'error'=>$error]);
        }elseif ($post['xpwd']!==$post['qrxpwd']){
            $error = '两次密码不一致';
            return view('index/writer-modpwd',['penname'=>$penname,'error'=>$error]);
        }else{
            $result = Db::table('author')->where('penname',$penname)->setField('pwd',$post['xpwd']);
            if($result>0){
                return $this->success('密码修改成功','index/writerout');
            }else{
                return $this->success('密码修改失败','index/modpwd');
            }
        }

    }


    //跳转作品数据页面
    public function writerdata()
    {
        $penname = Session::get('author.penname');
        //查询用户ID
        $aid = Db::table('author')->where('penname',$penname)->value('id');

        $list = Db::table(['novel'=>'n','author'=>'a','category'=>'c'])->field('*,a.penname,c.name,n.name nname')->where('n.aid=a.id')->where('n.cid=c.id')->where('aid',$aid)->select();
//        return dump($list);
        //计算条数
        $num = Db::table('novel')->where('aid',$aid)->count();
        return view('index/writer-data',[
            'penname'=>$penname,
            'list'=>$list,
            'num'=>$num
        ]);
    }
    
    
    //用于ajax数据处理
    public function writerajax($id)
    {
        $pid = $id;
        $data = Db::table('category')->where('pid',$pid)->select();
        return json($data);
    }




    //跳转作者资产
    public function authormoney()
    {
        $penname = Session::get('author.penname');
        //查询作者的信息
        $level = Db::table('author')->where('penname',$penname)->value('level');
        //查询用户ID
        $aid = Db::table('author')->where('penname',$penname)->value('id');
        //计算条数
        $num = Db::table('novel')->where('aid',$aid)->count();
        //查看用户资产表
        $list = Db::table('assets')->where('aid',$aid)->find();
        return view('index/author-money',[
            'penname'=>$penname,
            'level'=>$level,
            'Tcollect'=>$list['ticket'],
            'rank'=>$list['rank'],
            'integral'=>$list['integral'],
            'balance'=>$list['balance']
        ]);
    }


    //跳转结算中心页面
    public function writercheckout()
    {
        $penname = Session::get('author.penname');
        //查询用户ID
        $aid = Db::table('author')->where('penname',$penname)->value('id');
        //查询 aid 为 $aid 的用户数据
        $list = Db::name('novel')->where('aid',$aid)->select();
        $sum = Db::name('novel')->where('aid',$aid)->sum('Tticket');
        //查询总数据
        $all = Db::name('assets')->where('aid',$aid)->find();
        return view('index/writer-checkout',[
            'penname'=>$penname,
            'list'=>$list,
            'all'=>$all,
            'aid'=>$aid,
            'sum'=>$sum
        ]);
    }
    
    
    //执行月票兑换操作
    public function writerexchange($id)
    {
        $penname = Session::get('author.penname');
        //查询该小说的月票数
        $num = Db::table('novel')->where('id',$id)->value('Tticket');
        //查询用户ID
        $aid = Db::table('author')->where('penname',$penname)->value('id');
        //查询用户的总体数据
        $list = Db::table('assets')->where('aid',$aid)->find();
        //执行兑换
        //该小说月票清零,用户余额增加,用户的总月票减少
        if($num!==0){
            //该小说月票清零
            Db::table('novel')->where('id',$id)->update(['Tticket'=>0]);
            //总月票减少$num张
            $znum = $list['ticket']-$num;
            //余额增加
            $bal = $list['balance']+$num;
            //修改资产数据表
            $result = Db::table('assets')->where('aid',$aid)->update(['ticket'=>$znum,'balance'=>$bal]);
            if($result>0){
                //合计RMB
                $result1['num'] = $num;
                $result1['list'] = Db::table('assets')->where('aid',$aid)->find();
                $result1['status'] = true;
                return json($result1);
            }else{
                $error['status'] = false;
                return  json($error);
            }
        }else{

            $error['status'] = false;
           return  json($error);
        }
    }
    
    
    //执行积分兑换
    public function writerintexchange($id)
    {
        $penname = Session::get('author.penname');
        //查询该小说的积分
        $num = Db::table('novel')->where('id',$id)->value('integral');
        //查询用户ID
        $aid = Db::table('author')->where('penname',$penname)->value('id');
        //查询用户的总体数据
        $list = Db::table('assets')->where('aid',$aid)->find();
        //执行兑换
        //该小说积分清零,用户余额增加,用户的总积分减少
        if($num!==0){
            //该小说积分清零
            Db::table('novel')->where('id',$id)->update(['integral'=>0]);
            //总积分减少$num张
            $znum = $list['integral']-$num;
            //余额增加
            $num = $num/10;
            $bal = $list['balance']+$num;
            //修改资产数据表
            $result = Db::table('assets')->where('aid',$aid)->update(['integral'=>$znum,'balance'=>$bal]);
            if($result>0){
                //合计RMB
                $result1['num'] = $num;
                $result1['list'] = Db::table('assets')->where('aid',$aid)->find();
                $result1['status'] = true;
                return json($result1);
            }else{
                $error['status'] = false;
                return  json($error);
            }
        }else{

            $error['status'] = false;
            return  json($error);
        }
    }


    //执行总积分的兑换
    public function writertotintexchange($id)
    {
        //查询总数据
        $list = Db::table('assets')->where('aid',$id)->find();
        if($list['integral']!==0){
            //积分换算
            $integral = $list['integral']/10;
            //计算余额
            $num = $list['balance']+$integral;
            //修改总数据表
            $result = Db::table('assets')->where('aid',$id)->update(['integral'=>0,'balance'=>$num]);
            //修改每本书的数据
            $result2 = Db::table('novel')->where('aid',$id)->update(['integral'=>0]);
            if($result>0){
                $result1['list'] = Db::table('assets')->where('aid',$id)->find();
                $result1['status'] = true;
                return json($result1);
            }else{
                $error['status'] = false;
                return json($error);
            }
        }else{
            $error['status'] = false;
            return json($error);
        }

    }

    //执行总月票的兑换
    public function writertotticexchange($id)
    {
        //查询总数据
        $list = Db::table('assets')->where('aid',$id)->find();
        if($list['ticket']!==0){
//            //积分换算
//            $integral = $list['ticket']/100;
            //计算余额
            $num = $list['balance']+$list['ticket'];
            //修改总数据表
            $result = Db::table('assets')->where('aid',$id)->update(['ticket'=>0,'balance'=>$num]);
            //修改每本书的数据
            $result2 = Db::table('novel')->where('aid',$id)->update(['Tticket'=>0]);
            if($result>0){
                $result1['list'] = Db::table('assets')->where('aid',$id)->find();
                $result1['status'] = true;
                return json($result1);
            }else{
                $error['status'] = false;
                return json($error);
            }
        }else{
            $error['status'] = false;
            return json($error);
        }

    }

    //跳转消息通知页面
    public function writernwes()
    {
        $penname = Session::get('author.penname');
        $aid = Db::table('author')->where('penname',$penname)->value('id');
//        $num = Db::table('novel')->where('aid',$aid)->field('id')->select();
//        return dump($num);
        //多表连查
        $list = Db::table(['comment'=>'c','user'=>'u','novel'=>'n','author'=>'a'])->field('c.id,c.time,c.content,u.nickname,n.name')->where('a.penname',$penname)->where('a.id=n.aid')->where('c.uid=u.id')->where('c.nid=n.id')->select();
//        return  dump($list);
        return view('index/writer-news',[
            'penname'=>$penname,
            'list'=>$list,
        ]);
    }


    //执行删除操作
    public function writerdel($id)
    {
        $result = Db::table('comment')->where('id',$id)->delete();
        if($result>0){
            $error['status'] = true;
            return $error;
        }else{
            $error['status'] = false;
            return $error;
        }
    }
    
    
    //跳转充值页面
    public function finance()
    {
        $penname = Session::get('author.penname');
        $error = '';
        return view('index/finance',['penname'=>$penname,'error'=>$error]);
    }
    
    //充值操作
    public function Recharge()
    {
        $penname = Session::get('author.penname');
        //查询用户ID
        $aid = Db::table('author')->where('penname',$penname)->value('id');
        //接收数据
        $post = input('post.');
        if(empty($post['money']&&$post['pwd'])){
            return $this->error('请填写完整表单','index/finance');
        }
//        return  dump($post);
        if($post['shuzhi']==1){
            //查询已有积分
            $integral = Db::table('assets')->where('aid',$aid)->value('integral');
            $integral += ($post['money']*10);
            $result = Db::table('assets')->where('aid',$aid)->update(['integral'=>$integral]);
            if($result>0){
                return $this->success('充值成功','index/writercheckout');
            }else{
                return $this->error('充值失败','index/finance');
            }
        }else{
            //查询已有月票
            $ticket = Db::table('assets')->where('aid',$aid)->value('ticket');
            $ticket += $post['money'];
            $result1 = Db::table('assets')->where('aid',$aid)->update(['ticket'=>$ticket]);
            if($result1>0){
                return $this->success('充值成功','index/writercheckout');
            }else{
                return $this->error('充值失败','index/finance');
            }

        }
    }


    //跳转更换小说封面页面
    public function face($nname)
    {
        $penname = Session::get('author.penname');
        $face = Db::table('novel')->where('name',$nname)->value('face');
//        return dump($face);
        $error = '';
        return view('index/face',['penname'=>$penname,'error'=>$error,'name'=>$nname,'face'=>$face]);
    }
    
    
    //更换封面验证
    public function faceyz($name)
    {
        $penname = Session::get('author.penname');
       $a = request()->file('image');
       if(!empty($a)){
           //调用上传文件方法
           $image = $this->upload();
           //获取想要的文件路径
           $date = strstr($image,'\\',true);
           $image = substr(strstr($image,'\\'),1);
           $icon = '/uploads/'.$date.'/'.$image;
           //修改小说封面
           $result = Db::table('novel')->where('name',$name)->update(['face'=>$icon]);
           if($result>0){
               return $this->success('更新封面成功','index/writerdata');
           }
       }else{

           return $this->error('请上传图片','index/writerdata');
       }


    }

}
