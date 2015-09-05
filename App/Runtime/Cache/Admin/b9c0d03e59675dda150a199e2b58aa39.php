<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<title>功能管理</title>
	<meta http-equiv="Content-Type:" content="text/html;charset=utf-8">
</head>
<body>
	<table>
		<tr>
			<td>功能</td>
		</tr>
		<?php if(is_array($function)): foreach($function as $key=>$item): ?><tr>
			<td><?php echo ($item["function"]); ?></td>
			<td><a href="<?php echo U(GROUP_NAME . '/Function/updateFunction').'?id='; echo ($item["id"]); ?>">修改</a></td>
			<td><a href="<?php echo U(GROUP_NAME . '/Function/deleteFunction').'?id='; echo ($item["id"]); ?>">删除</a></td>
		</tr><?php endforeach; endif; ?>
		<tr>
			<td><a href="<?php echo U(GROUP_NAME . '/Function/addFunction');?>">添加功能</a></td>
		</tr>
	</table>
	<a href="<?php echo U(GROUP_NAME . '/Index/index');?>">返回</a>
</body>
</html>