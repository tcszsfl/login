<?php
namespace app\login\controller;

use think\Controller;

class Common extends Controller
{
	public function _initialize()
    {
        if(cookie('user_name')!='')
        {
            session('user_name',cookie('user_name'));
        }
        if(session('user_name')=='')
        {
            $this->display('Login/index');
        }
    }
}