<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>用户管理</title>
	<meta http-equiv="Content-Type:" content="text/html;charset=utf-8">
</head>
<body>

	<table>
		<tr>
			<td>用户名</td>
			<td>邮箱</td>
			<td>等级</td>
		</tr>
		<?php if(is_array($users)): foreach($users as $key=>$item): ?><tr>
				<td><?php echo ($item["username"]); ?></td>
				<td><?php echo ($item["email"]); ?></td>
				<td><?php echo ($item["level"]); ?></td>
				<td><a href="<?php echo U(GROUP_NAME . '/User/updateUser').'?id='; echo ($item["id"]); ?>">修改等级</a></td>
				<td><a href="<?php echo U(GROUP_NAME . '/User/deleteUser').'?id='; echo ($item["id"]); ?>">删除</a></td>
			</tr><?php endforeach; endif; ?>

	</table>
	<a href="<?php echo U(GROUP_NAME . '/Index/index');?>">返回</a>
</body>
</html>