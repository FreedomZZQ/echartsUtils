<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>添加功能</title>
	<meta http-equiv="Content-Type:" content="text/html;charset=utf-8">
</head>
<body>
<form action="<?php echo U(GROUP_NAME . '/Function/addFunctionHandle');?>" method="POST">
	功能<input name="function" type="text"/>
	<input type="submit" value="确定"/>
</form>
</body>
</html>