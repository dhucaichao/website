<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;
use think\Db;
class Chapter extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
//        $arr = Db::query("select n.`id`,`name`,`penname`, from `author` a,`novel` n,`chapter` c where n.aid =  a.id && n.id=c.nid");
        $arr = Db::table('novel')->alias('n')->join('author a','n.aid =  a.id')->field('n.id,name,penname')->paginate(6);
        return view('chapter/index',['arr'=>$arr,'title'=>'章节表']);
    }

    public function index2($id)
    {
        $arr = Db::table('chapter')->where('nid',$id)->paginate(10);
        return view('chapter/index2',['arr'=>$arr,'title'=>'章节表']);
    }
    /**
     * 显示创建资源表单页.
     *
     * @return \think\Response
     */
    public function create()
    {
        //
    }

    /**
     * 保存新建的资源
     *
     * @param  \think\Request  $request
     * @return \think\Response
     */
    public function save(Request $request)
    {
        //
    }

    /**
     * 显示指定的资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function read($id)
    {
        $list = db('chapter')->where('id', $id)->find();
        return json($list);
    }

    public function read1($id,$p)
    {
        $list = db('chapter')->where('id', $id)->update(['price'=>$p]);
        if ($list > 0) {
            $info['status'] = true;
        } else {
            $info['status'] = false;
        }
        return json($info);
    }

    /**
     * 显示编辑资源表单页.
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function edit($check,$id)
    {
        if ($check == 2){
            $info['mes'] = '审核通过';
        } else {
            $info['mes'] = '审核未通过';
        }
        $a = db('chapter')->where('id',$id)->update(['check'=>$check]);
        if ($a > 0) {
            $info['status'] = true;
        } else {
            $info['status'] = false;
        }
        return json($info);
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
        //
    }

    /**
     * 删除指定资源
     *
     * @param  int  $id
     * @return \think\Response
     */
    public function delete($id)
    {
        $result = db('chapter')->where('id', $id)->delete();
        if ($result > 0) {
            $info['status'] = true;
            $info['info'] = '章节已删除';
        } else {
            $info['status'] = false;
            $info['info'] = '章节删除失败,请重试!';
        }

        return json($info);
    }
}
