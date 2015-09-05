<?php
Class RoleAction extends CommonAction{
	Public function index(){
		$db_role = M('role');
		$db_access = M('access');
		$db_function = M('function');
		$role = $db_role->select();
		$roleList = array();
		foreach ($role as $key1 => $value1) {
			$arr = array('level' => $value1['level']);
			$arr = array_merge($arr,array('id' => $value1['id']));
			$function_id = $db_access->where(array('level'=>$value1['level']))->select();
			$functionArr=array();
			foreach ($function_id as $key2 => $value2) {
				$function = $db_function->where(array('id'=>$value2['fid']))->find();
				array_push($functionArr, $function['function']);
			}
			$arr = array_merge($arr,array('function'=>$functionArr));
			$roleList = array_merge($roleList,array($key1=>$arr));
			
		}
		// p($roleList);die;
		$this->roles = $roleList;
		$this->display();
	}
	//增加角色视图
	Public function addRole(){
		$db_function = M('function');
		$functionList = $db_function->select();
		$this->functionList = $functionList;
		$this->display();
	}
	//处理角色
	Public function addRoleHandle(){
		$level = I('level');
		$ids = $_POST['function'];
		$db_role = M('role');
		$db_access = M('access');
		$db_role->startTrans();
		if(!$db_role->add(array('level'=>$level))){
			$this->error('插入失败');
		}
		$db_access->startTrans();
		foreach ($ids as $key => $id) {
			if(!$db_access->add(array('level'=>$level,'fid'=>$id))){
				$db_access->rollback();
				$db_role->rollback();
				$this->error('插入失败');
			}
		}
		$db_role->commit();
		$db_access->commit();
		$this->redirect(GROUP_NAME . '/Role/index');
	}
	//修改角色视图
	Public function updateRole(){
		$id = $_GET['id'];
		$db_role = M('role');
		$role = $db_role -> where(array('id' => $id))->find();
		$db_access = M('access');
		$fids = $db_access->where(array('level'=>$role['level']))->select();
		$db_function = M('function');
		$all_function = $db_function->select();
		$role = array_merge($role,array('function' => $all_function));
		 // p($role);die;
		$this->role = $role;
		$this->display();
	}
	//修改角色处理
	Public function updateRoleHandle(){
		$level = $_POST['level'];
		$fids = $_POST['function'];
		$db_access = M('access');
		$db_access->startTrans();
		if(!$db_access->where(array('level'=>$level))->delete()){
			$db_access->rollback();
			$this->error('修改失败');
			
		}
		foreach ($fids as $key => $fid) {
			if(!$db_access->add(array('level'=>$level,'fid'=>$fid))){
				$db_access->rollback();
				$this->error('修改失败');
			}
		}
		$db_access->commit();
		$this->redirect(GROUP_NAME . '/Role/index');
	}
	//删除角色
	Public function deleteRole(){
		$db_role = M('role');
		$id = $_GET['id'];
		$level = $db_role->where(array('id'=>$id))->find()['level'];
		$db_role->startTrans();
		if(!$db_role->where(array('id'=>$id))->delete()){
			$db_role->rollback();
			$this->error('删除失败');
		}
		$db_access = M('access');
		if(!$db_access->where(array('level'=>$level))->delete()){
			$db_role->rollback();
			$db_access->rollback();
			$this->error('删除失败');
		}
		$db_role->commit();
		$db_access->commit();
		$this->redirect(GROUP_NAME . '/Role/index');
	}
}