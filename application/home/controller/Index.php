<?php
namespace app\home\controller;

class Index
{
    public function index()
    {
        return view('default');
    }

    public function sign()
    {
        return view();
    }
}
