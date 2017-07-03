<?php

namespace app\admin\controller;

use think\Controller;
use think\Request;

class Phone extends Controller
{
    /**
     * 显示资源列表
     *
     * @return \think\Response
     */
    public function index()
    {
        $tel = empty($_GET['phone'])?'':$_GET['phone'];
// var_dump($tel);

        $host = "http://jshmgsdmfb.market.alicloudapi.com";
        $path = "/shouji/query";
        $method = "GET";
        $appcode = "f7d2429e81e141f298233828d5f4b135";
        $headers = array();
        array_push($headers, "Authorization:APPCODE " . $appcode);

        // $querys = "shouji=13456755448";
        // shouji = $tel;
        $querys = "shouji=$tel";
        $bodys = "";

        // 中心
        $url = $host . $path . "?" . $querys;

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($curl, CURLOPT_URL, $url);
        curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($curl, CURLOPT_FAILONERROR, false);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_HEADER, false);
        if (1 == strpos("$".$host, "https://"))
        {
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
        }

        // curl_exec();  执行$curl


//        var_dump(curl_exec($curl));
        $data = curl_exec($curl);  //json形式
        if (!$data) {
           // 模板变量赋值
            $this->assign('shouji','');
            $this->assign('province','');
            $this->assign('city','');
            $this->assign('company','');
            $this->assign('cardtype','');
            $this->assign('areacode','');
        } else {
            $jsonObj = json_decode($data);    //json_decode  转为数组
            $list = $jsonObj->result;

//        var_dump($list);
            if (empty($list)) {
                $this->assign('shouji','');
                $this->assign('province', '');
                $this->assign('city', '');
                $this->assign('company', '');
                $this->assign('cardtype','');
                $this->assign('areacode','');
            } else {
                $shouji = $list->shouji;
                $province = $list->province;
                $city = $list->city;
                $company = $list->company;
                $cardtype = $list->cardtype;
                $areacode = $list->areacode;
                $this->assign('shouji', $shouji);
                $this->assign('province', $province);
                $this->assign('city', $city);
                $this->assign('company', $company);
                $this->assign('cardtype', $cardtype);
                $this->assign('areacode',$areacode);
            }
        }
        // $res = $data->reslut;
        return view('phone/index');
    }
}
