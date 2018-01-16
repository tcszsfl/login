<?php
namespace app\login\controller;

use think\Controller;

class Login extends Controller
{
   
    public function index()
    {
        if(cookie('user_name')!='')
        {
            session('user_name',cookie('user_name'));
        }
        if(session('user_name')=='')
        {
           return $this->fetch('Login/index');
        }else{
           return $this->redirect('Index/index');
        }

    }
    
    public function dologin()
    {
        $data=input('post.ischecks');
        $username=input('post.username');
        $password=md5(input('post.password'));
        //验证用户
        $list=db('users')->where("user_name='".$username."'")->find();

         if(!empty($list))
        {
            if($list['user_pwd']==$password)
            {
                session('user_name',$username);
                // session('user_id',$list['id']);
                if(isset($data))
                {
                    cookie('user_id', $username, 3600);
                }
                  // 一个小时有效期
                  // cookie('user_name', $list['user_name'], 3600);
                $datas=[
                    'msg'=>'登录成功',
                    'status'=>1
                ];
                return $datas;
            }
            else{
                $datas=[
                    'msg'=>'密码错误',
                    'status'=>2
                ];
                return $datas;
            }
        }
        else{
            $datas=[
                'msg'=>'用户名错误',
                'status'=>2
            ];
            return $datas;
            //$this->error('用户名错误！');
        }
        

    }

    public function loginout()
    {
        // cookie('user_id',null);
        setcookie('user_name');
        $this->redirect(url('login/index'));
    }
    
    
    
}
