<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>用户登录</title>
	<meta http-equiv="Content-Type:" content="text/html;charset=utf-8">
</head>
<body>
<form action="<?php echo U(GROUP_NAME . '/Index/loginHandle');?>" method="POST">
		用户名:<input name="username" type="text"><br/>
		密码:<input name="password" type="password"><br/>
		<input type="submit">
	</form>
</body>
</html>