<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>角色管理</title>
	<meta http-equiv="Content-Type:" content="text/html;charset=utf-8">
</head>
<body>
<table>
	<tr>
		<td>等级</td>
		<td>拥有功能</td>
	</tr>
	<?php if(is_array($roles)): foreach($roles as $key=>$item): ?><tr>
		<td><?php echo ($item["level"]); ?></td>
		<td>
		<?php if(is_array($item["function"])): foreach($item["function"] as $key=>$fun): echo ($fun); ?></br><?php endforeach; endif; ?>
		</td>	
		<td><a href="<?php echo U(GROUP_NAME . '/Role/updateRole').'?id='; echo ($item["id"]); ?>">修改</a></td>
		<td><a href="<?php echo U(GROUP_NAME . '/Role/deleteRole').'?id='; echo ($item["id"]); ?>">删除</a></td>
	</tr><?php endforeach; endif; ?>
	<tr>
		<td><a href="<?php echo U(GROUP_NAME . '/Role/addRole');?>">增加角色</a></td>
	</tr>
</table>
<a href="<?php echo U(GROUP_NAME . '/Index/index');?>">返回</a>
</body>
</html>