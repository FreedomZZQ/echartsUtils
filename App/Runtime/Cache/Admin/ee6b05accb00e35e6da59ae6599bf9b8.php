<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>功能修改</title>
	<meta http-equiv="Content-Type:" content="text/html;charset=utf-8">
</head>
<body>
<form action="<?php echo U(GROUP_NAME . '/Function/updateFunctionHandle');?>" method="POST">
功能:<input name="newFunction" type="text" value="<?php echo ($function); ?>"/>
<input name="fid" type="hidden" value="<?php echo ($fid); ?>">
<input type="submit" value="确定修改">
</form>
</body>
</html>