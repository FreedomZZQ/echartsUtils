<?php
Class UserAction extends Action{
	Public function index(){
		echo 1;
	}
	
	//处理注册
	Public function registerHandle(){
		if(session('verify')!=I('code','','md5')){
			$this->error('验证码不正确');
		}
		$db = M('user');
		if($db->where(array('username' => I('username')))->find()){
			$this->error('用户名已存在');
		}
		$user = array(
				'username' => I('username'),
				'password' => I('password','','md5'),
				'email' => I('email'),
			);
		$db_role = M('role');
		$rid = $db_role->where(array('level'=>1))->find()['id'];
		$db->startTrans();
		if(!$db->add($user)){
			$db->rollback();
			$this->error('注册失败');
		}
		$uid = $db->where(array('username'=>I('username')))->find()['id'];
		$db_user_role = M('user_role');
		$db_user_role->startTrans();
		if(!$db_user_role->add(array('uid'=>$uid,'rid'=>$rid))){
			$db_user_role->rollback();
			$db->rollback();
			$this->error('注册失败');
		}
		$db->commit();
		$db_user_role->commit();
		$this->success('注册成功',U(GROUP_NAME . '/Index/index'));

	}
	
	//处理登录
	Public function loginHandle(){
		if(session('verify')!=I('code','','md5')){
			$this->error('验证码不正确');
		}
		$db = M('user');
		$user = $db->where(array('username' => I('username')))->find();
		if(!$user||$user['password'] != I('password','','md5')){
			$this->error('用户名或密码不正确');
		}
		session('user',array(
			'username' => $user['username'],
			'email' => $user['email'],
			'level' => $user['level'],
			));
		$this->success('登录成功',U(GROUP_NAME . '/Index/index'));

	}
	//验证码
	Public function verify(){
		import('ORG.Util.Image');
		Image::buildImageVerify();
	}

	//用户信息
	Public function userMsg(){
		$user = session('user');
		$this->username = $user['username'];
		$this->email = $user['email'];
		$this->level = $user['level'];
		$this->display();
	}

}
?>