<?php

namespace app\admin\controller;

use think\Controller;
use think\Db;
use think\Request;

class User extends Controller
{
    public function index()
    {
        $list = db('admin')->select();
        dump($list);
    }

    public function insert()
    {
        $data = ['name'=>'huanghanyi','pwd'=>'123456'];
        $result = Db::table('admin')->insertGetId($data);
        dump($result);
    }

    public function delete()
    {
        $result = Db::table('admin')->where('name','hhy')->delete();
        dump($result);
    }

    public function update()
    {
        $data = ['name'=>'hhy','pwd'=>'123456'];
        $result = Db::table('admin')->where(['id'=>5])->update($data);
        dump($result);
    }
}
