<?php
namespace app\login\controller;

use think\Controller;

use app\login\controller\Common;

class Index extends Common
{
	public function Index()
	{
		echo "用户页面： " . cookie('user_name') . ', <a href="' . url('login/loginout') . '">退出</a>';
	}
	// public function hello()
	// {
	// 	$this->assign('sessions',session('user_name'));
	// 	return $this->fetch();
	// 	// echo "您好： " . cookie('user_name') . ', <a href="' . url('login/loginout') . '">退出</a>';
	// }
}
