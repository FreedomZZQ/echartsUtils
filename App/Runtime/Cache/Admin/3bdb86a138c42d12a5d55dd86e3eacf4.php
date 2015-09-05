<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>修改等级</title>
	<meta http-equiv="Content-Type:" content="text/html;charset=utf-8">
</head>
<body>
<form action="<?php echo U(GROUP_NAME . '/User/updateUserHandle');?>" method="POST">
	等级
	<?php if(is_array($role)): foreach($role as $key=>$item): ?><input name='rid' type="radio" value="<?php echo ($item["id"]); ?>"><?php echo ($item["level"]); endforeach; endif; ?>
	<input name="uid" type="hidden" value="<?php echo ($uid); ?>">
	<input type="submit" value="确定">
</form>
</body>
</html>