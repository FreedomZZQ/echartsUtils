<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>后台管理</title>
	<meta http-equiv="Content-Type:" content="text/html;charset=utf-8">
</head>
<body>
<a href="<?php echo U(GROUP_NAME . '/User/index');?>">用户管理</a>
<a href="<?php echo U(GROUP_NAME . '/Function/index');?>">功能管理</a>
<a href="<?php echo U(GROUP_NAME . '/Role/index');?>">权限管理</a>
</body>
</html>