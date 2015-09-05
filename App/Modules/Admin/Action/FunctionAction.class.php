<?php
Class FunctionAction extends CommonAction{
	Public function index(){
		$db_function = M('function');
		$function = $db_function->select();
		$this->function = $function;
		$this->display();
	}

	//添加功能视图
	Public function addFunction(){
		$this->display();
	}
	//添加功能处理
	Public function addFunctionHandle(){
		$function = I('function');
		$db_function = M('function');
		if(!$db_function -> add(array('function'=>$function))){
			$this->error('插入失败');
		}
		$this->redirect(GROUP_NAME . '/Function/index');

	}
	//修改功能视图
	Public function updateFunction(){
		$this->fid = I('id');
		$db_function = M('function');
		$function = $db_function -> where(array('id'=>I('id'))) ->find();
		$this->function = $function['function'];
		$this->display();
	}
	//修改功能处理
	Public function updateFunctionHandle(){
		$newFunction = $_POST['newFunction'];
		$fid = $_POST['fid'];
		$db_function = M('function');
		if($db_function->where(array('id'=>$fid))->find()['function']==$newFunction || $newFunction==''){
			$this->error('功能没有改变或为空');
		}
		if(!$db_function->save(array('id' => $fid,'function' => $newFunction))){
			$this->error('修改失败');
		}
		$this->redirect(GROUP_NAME . '/Function/index');
	}
	//删除功能
	Public function deleteFunction(){
		$fid = $_GET['id'];
		$db_function = M('function');
		if(!$db_function->where(array('id'=>$fid))->delete()){
			$this->error('删除失败');
		}
		$this->redirect(GROUP_NAME . '/Function/index');
	}
}