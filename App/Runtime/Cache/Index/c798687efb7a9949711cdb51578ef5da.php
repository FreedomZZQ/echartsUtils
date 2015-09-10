<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html>
	<head>
		<meta charest="utf-8">
		<title>echarts_line</title>

		<script type="text/javascript" src="__PUBLIC__/Js/jquery.min.js"></script>
		<script type="text/javascript"  src="__PUBLIC__/Js/bootstrap.min.js"></script>
		<link type="text/css" rel="stylesheet" href="__PUBLIC__/Css/bootstrap.min.css">
		<link type="text/css" rel="stylesheet" href="__PUBLIC__/Css/srp.css">
		<script type="text/javascript"  src="__PUBLIC__/Js/echarts-all.js"></script>
		<script type="text/javascript"  src="__PUBLIC__/Js/myecharts.js"></script>

	</head>
	<body>
		<div class="container" id="echarts_line">
			<input type="submit" class="line_name" value="增加图像">
			<input type="submit" class="data_xy" value="增加(x,y)">
			<input type="submit" class="submit_btn" value="生成图像">
			<div class="row">
				<div class="col-sm-12">
					<table class="table table-bordered">
						<thead>
							<tr>
								<td></td>
								<td><input type="text" value="最高气温"></td>
								<td><input type="text" value="最低气温"</td>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td><input type="text" value="周一"></td>
								<td><input type="text" value="30"></td>
								<td><input type="text" value="20"></td>
								
							</tr>
							<tr>
								<td><input type="text" value="周二"></td>
								<td><input type="text" value="33"></td>
								<td><input type="text" value="22"></td>
								
							</tr>
							<tr>
								<td><input type="text" value="周三"></td>
								<td><input type="text" value="25"></td>
								<td><input type="text" value="16"></td>
								
							</tr>
							<tr>
								<td><input type="text" value="周四"></td>
								<td><input type="text" value="29"></td>
								<td><input type="text" value="19"></td>
								
							</tr>
							<tr>
								<td><input type="text" value="周五"></td>
								<td><input type="text" value="36"></td>
								<td><input type="text" value="25"></td>
								
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			<div class="line_main" id="line_main" style="height:400px"></div>
		</div>
		<script type="text/javascript">
			$(".line_name").click(function(){
				var td_add="<td><input type="+"text"+ "value="+""+"></td>";
				var first_tr_td_add="<td><input type="+"text"+" value="+""+"></td>";
				//var td_width=$(this).width();
				$("table thead tr").find("td:last").after(first_tr_td_add);
				$("table tbody tr").each(function(){
					$(this).find("td:last").after(td_add);
					//$(this).find("td:last").prev().width(td_width);
				});
				

			});
			$(".data_xy").click(function(){
				var td_amount=$("thead tr td");
				var tr_add="<tr>";
				for(var i=0;i<td_amount.size();i++){
					tr_add+="<td><input type="+"text"+" value="+""+"></td>";
				}
				tr_add+="</tr>";
				$("tbody tr:last").after(tr_add);
			})
			$(".submit_btn").click(function(){
				var line_name=new Array(),
					x_positions=new Array(),
					y_positions=new Array();
				//line_name=$("thead tr td:first-child").nextAll("td");
				$("thead tr td input").each(function(){
					line_name.push($(this).val());
				})
				$("tbody tr td:first-child input").each(function(){
					x_positions.push($(this).val());
				});
				for(var i=0;i<line_name.length;i++){
					y_positions[i]=new Array();
					for(var j=0;j<x_positions.length;j++){
						y_positions[i][j]=$("table tr:eq("+(j+1)+")"+" td:eq("+(i+1)+")"+" input").val();
					}
				}
				echarts_line(line_name,x_positions,y_positions);
				//echarts_init();
			})
		</script>
	</body>
</html>