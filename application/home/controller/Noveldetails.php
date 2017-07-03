<?php

namespace app\home\controller;

use think\captcha;
use think\Request;
use think\Session;
use think\Controller;
use think\Db;

class noveldetails extends Controller
{
    public function ndindex($id)
    {
        if(!empty(Session::get('home.name'))){
            $cc = Session::get('home.id');
            $a = Db::table('collection')->where('nid',$id)->where('uid',$cc)->find();
            if ($a!=null){
                $b = 1;
            } else {
                $b = 2;
            }
        } else {
            $b = 2;
        }
        $list = Db::query('select *,n.name k,n.id n,penname from novel n,category c,author a where n.cid=c.id and n.aid=a.id and n.id = '.$id );
//        $list1 = Db::query('select *,c.id from `user` u,`comment` c where c.uid = u.id and c.nid ='.$id.' order by `time` desc');
        $list1 = Db::table('user')->alias('u')->join('comment c','c.uid=u.id')->where('c.nid',$id)->order('time desc')->field('*,c.id')->paginate(4);
        $list2 = Db::query('select *,did,r.content from `user` u,`reply` r where r.uid = u.id and r.nid ='.$id.' order by `time` desc');
        return view('noveldetails/index',['list'=>$list[0],'list1'=>$list1,'list2'=>$list2,'b'=>$b]);
    }

    public function add($nid)
    {
        $c = input('post.content');
        if (empty(Session::get('home.name'))){
            $this->error('请先登录','index/index');
        } else {
            $id = Session::get('home.id');
            $data['uid'] = $id;
            $data['nid'] = $nid;
            $data['content'] = $c;
            $data['time'] = time();
            Db::table('comment')->insert($data);
            $this->redirect('ndindex',['id'=>$nid]);
        }
    }

    public function reply($nid,$did)
    {
        $c = input('post.content');
        if (empty(Session::get('home.name'))){
            $this->error('请先登录','index/index');
        } else {
            $id = Session::get('home.id');
            $data['uid'] = $id;
            $data['nid'] = $nid;
            $data['did'] = $did;
            $data['content'] = $c;
            $data['time'] = time();
            $arr = Db::query('select a.id from author a,novel n where n.aid=a.id and n.id = '.$nid);
            $data['aid'] = $arr[0]['id'];
            Db::table('reply')->insert($data);
            $this->redirect('ndindex',['id'=>$nid]);
        }
    }

    public function getticket($nid)
    {
        if (empty(Session::get('home.name'))){
            $this->error('请先登录','index/index');
        } else {
            $uid = Session::get('home.id');
            $ticket = Db::table('user')->where('id',$uid)->field('ticket')->find();
            $ticket1 = Db::table('novel')->where('id',$nid)->field('Tticket,aid')->find();
            $a = $ticket['ticket'];
            $b = $ticket1['Tticket'];
            $aid = $ticket1['aid'];
            $ticketa = Db::table('assets')->where('aid',$aid)->field('ticket')->find();
            $ccc = $ticketa['ticket'];
            if($a<=0){
                $this->error('月票不足,请先购买','index/index');
            } else {
                $a--;
                $b++;
                $ccc++;
                Db::table('user')->where('id', $uid)->update(['ticket'=>$a]);
                Db::table('novel')->where('id', $nid)->update(['Tticket'=>$b]);
                $data = ['nid'=>$nid,'uid'=>$uid,'ticket'=>1,'time'=>time()];
                Db::table('ticket')->insert($data);
                Db::table('assets')->where('aid', $aid)->update(['ticket'=>$ccc]);
                $this->redirect('ndindex',['id'=>$nid]);
            }
//            return dump($ticket);
        }
    }
}
