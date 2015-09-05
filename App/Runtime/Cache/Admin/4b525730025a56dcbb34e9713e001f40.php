<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>增加角色</title>
	<meta http-equiv="Content-Type:" content="text/html;charset=utf-8">
</head>
<body>
<form action="<?php echo U(GROUP_NAME . '/Role/addRoleHandle');?>" method="POST">
	角色等级<input name="level" type="text"/><br/>
	拥有功能
	<?php if(is_array($functionList)): foreach($functionList as $key=>$item): ?><input type="checkbox" name="function[]" id="function[]" value="<?php echo ($item["id"]); ?>" /><?php echo ($item["function"]); endforeach; endif; ?>
	<br/>
	<input type="submit" value="确定"/>
</form>
</body>
</html>