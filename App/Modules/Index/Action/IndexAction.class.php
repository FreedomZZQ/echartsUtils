<?php

Class IndexAction extends Action{
	//前台首页
	Public function index(){
		$user = session('user');
		$this->username = $user['username'];
		$this->display();
	}
	//登录视图
	Public function login(){
		$this->display();
	}
	//注册视图
	Public function register(){
		$this->display();
	}
	
}