<?php
Class LoginAction extends Action{
	Public function index(){
		$this->display();
	}
	Public function login(){
		$username = I('username');
			$password = I('password');
			if(C('USERNAME')!=$username||C('PSW')!=$password){
				$this->error('用户名或密码不正确');
			}
			session('admin',$username);
			$this->success('登陆成功',U(GROUP_NAME . '/Index/index'));
	}
}