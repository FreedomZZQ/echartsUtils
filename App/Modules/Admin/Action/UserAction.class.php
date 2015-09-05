<?php
	Class UserAction extends CommonAction{
		Public function index(){
			$db_user = M('user');
			$users = $db_user->select();
			// $users=array_merge($users,array('level'=>1));p($users);die;
			$db_user_role = M('user_role');
			$db_role = M('role');
			$userList = array();
			foreach ($users as $key => $value) {
				$user_role = $db_user_role->where(array('uid'=>$value['id']))->find();
				$role = $db_role->where(array('id'=>$user_role['rid']))->find();

				$arr = array('id' => $value['id']);
				$arr = array_merge($arr,array('username'=>$value['username']));
				$arr = array_merge($arr,array('email'=>$value['email']));
				$arr=array_merge($arr, array('level'=>$role['level']));
				$userList = array_merge($userList, array($key=>$arr));
			}
			$this->users = $userList;
			$this->display();
		}
		//修改等级视图
		Public function updateUser(){
			$id = $_GET['id'];
			$db_role = M('role');
			$role = $db_role->select();
			$this->uid = $id;
			$this->role = $role;
			$this->display();
		}
		//修改等级处理
		Public function updateUserHandle(){
			$uid = $_POST['uid'];
			$rid = $_POST['rid'];
			$db_user_role = M('user_role');
			if(!$db_user_role->where(array('uid'=>$uid))->save(array('rid'=>$rid))){
				$this->error('修改失败');
			}
			$this->redirect(GROUP_NAME . '/User/index');
		}
		//删除用户
		Public function deleteUser(){
			$uid = $_GET['id'];
			$db_user = M('user');
			$db_user_role = M('user_role');
			$db_user_role->startTrans();
			if(!$db_user_role->where(array('uid'=>$uid))->delete()){
				$db_user_role->rollback();
				$this->error('删除失败');
			}
			$db_user->startTrans();
			if(!$db_user->where(array('id'=>$uid))->delete()){
				$db_user_role->rollback();
				$db_user->rollback();
				$this->error('删除失败');
			}
			$db_user_role->commit();
			$db_user->commit();
			$this->redirect(GROUP_NAME . '/User/index');
		}
	}