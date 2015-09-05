<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>角色修改</title>
	<meta http-equiv="Content-Type:" content="text/html;charset=utf-8">
</head>
<body>
<form action="<?php echo U(GROUP_NAME . '/Role/updateRoleHandle');?>" method="POST">
	角色等级<input type="text" name="level" value="<?php echo ($role["level"]); ?>"/><br/>
	拥有功能
	<?php if(is_array($role["function"])): foreach($role["function"] as $key=>$item): ?><input name="function[]" id="function[]" value="<?php echo ($item["id"]); ?>" type="checkbox"/><?php echo ($item["function"]); endforeach; endif; ?>
	<br/>
	<input type="submit" value="确定"/>
</form>
</body>
</html>