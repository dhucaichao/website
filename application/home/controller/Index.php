<?php
namespace app\home\controller;

use think\captcha;
use think\Request;
use think\Session;
use think\Controller;
use think\Db;

class Index extends Controller
{
    public function index()
    {
//        接口
        header("Content-Type: text/html; charset=utf-8");
        $num = 5; //返回数量
        $url = 'http://api.tianapi.com/txapi/godreply/?key=ebe901b7924c774859bb4d4e72cdf59f&num='.$num.'&rand';     //API接口
        $ch = curl_init();
        $timeout = 5;
        curl_setopt ($ch, CURLOPT_URL, $url);
        curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
        $file_contents = curl_exec($ch);
        curl_close($ch);
//  var_dump(json_decode($file_contents ));
        $json = json_decode($file_contents,true);
        if($json['code'] == 200){
            $txapi=$json['newslist'];
//            for ($i = 0; $i < $num; $i++){
//                //   echo var_dump($de_json);
//                $title = $txapi[$i]['content']; //文章标题
////                $desc =  $txapi[$i]['description']; //文章描述
////                $pic =   $txapi[$i]['picUrl'];  //封面图片
////                $url =   $txapi[$i]['url'];  //文章链接
////                echo $title."<br/>".$desc."<br/>".$pic."<br/>".$url."<br/>";
//            }
        }else{
            return "返回错误，状态消息：".$json['msg'];
        }
//        接口
        $list1 = Db::query('select *,n.name k,n.id n,penname from novel n,category c,author a where c.pid=1 and n.cid=c.id and n.aid=a.id order by Tticket desc limit 0,5');
        $list2 = Db::query('select *,n.name k,n.id n,penname from novel n,category c,author a where c.pid=2 and n.cid=c.id and n.aid=a.id order by Tticket desc limit 0,5');
        $list3 = Db::query('select *,n.name k,n.id n,penname from novel n,category c,author a where n.cid=c.id and n.aid=a.id order by Tticket desc limit 0,5');
        $list4 = Db::query('select *,n.name k,n.id n,penname from novel n,category c,author a where n.cid=c.id and n.aid=a.id order by Tcollect desc limit 0,10');
        $list = db('banner')->select();
        $link = db('link')->select();
        if (!empty(Session::get('home.name'))) {
            return view('default', ['logined' => 2, 'name' => Session::get('home.name'), 'list' => $list, 'list1' => $list1, 'list2' => $list2, 'list3' => $list3, 'list4' => $list4,'txapi'=>$txapi,'link'=>$link]);
        } else {
            return view('default', ['logined' => 1, 'list' => $list, 'list1' => $list1, 'list2' => $list2, 'list3' => $list3, 'list4' => $list4,'txapi'=>$txapi,'link'=>$link]);
        }
    }

    public function login(Request $request)
    {
        $a = Request::instance()->post();
        $arr = db('user')->where('tel', $a['tel'])->find();
        $captcha = $a['yzm'];
        if (empty($arr)) {
            $info['status'] = 1;
            $info['error'] = '该用户不存在';
            return json($info);
        } elseif ($arr['pwd'] != $a['pwd']) {
            $info['status'] = 2;
            $info['error'] = '密码错误';
            return json($info);
        }
//        elseif(!captcha_check($captcha)){
//            $info['status'] = 3;
//            $info['error'] = '验证码错误';
//            return json($info);
//        }
        else {
            $info['status'] = 4;
            $info['name'] = $arr['nickname'];
            Session::set('home.name', $arr['nickname'], 'think');
            Session::set('home.tel', $arr['tel'], 'think');
            Session::set('home.id', $arr['id'], 'think');
            return json($info);
        }
    }

    public function loginout()
    {
        Session::delete('home');
        $this->redirect('index');
    }

    public function sign()
    {
        return view('reg');
    }

    public function reg()
    {
        $result = input('post.');
        $arr['tel'] = $result['tel'];
        $arr['pwd'] = $result['pwd'];
        $arr['nickname'] = '书友' . $arr['tel'];
        $a = db('user')->insert($arr);
        if ($a > 0) {
            $this->success('注册成功', 'index/index');
        } else {
            $this->error('注册失败', 'index/index');
        }
    }

    public function regt(Request $request)
    {
        $b = Request::instance()->post();
        $arr = db('user')->where('tel', $b['tel'])->find();
        if (!empty($arr)) {
            $info['status'] = 0;
            return json($info);
        } else {
            $info['status'] = 1;
            return json($info);
        }
    }
}
