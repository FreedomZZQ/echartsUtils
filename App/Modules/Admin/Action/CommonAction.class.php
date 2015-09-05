<?php

Class CommonAction extends Action{
	Public function _initialize(){
		if(!isset($_SESSION['admin'])){
			$this->redirect(GROUP_NAME . '/Login/index');
		}
	}
}