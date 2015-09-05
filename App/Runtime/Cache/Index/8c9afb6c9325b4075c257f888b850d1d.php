<?php if (!defined('THINK_PATH')) exit();?>﻿<!doctype html>
<html>
<head>
<title>srp text</title>
<meta http-equiv="charset" content="UTF-8">
<script type="text/javascript" src="jquery.min.js"></script>
<script src="bootstrap.min.js"></script>
<link type="text/css" rel="stylesheet" href="bootstrap.min.css">
<link type="text/css" rel="stylesheet" href="srp.css">
</head>
<body>
	<header class="navbar navbar-fixed-top" role="banner">
 		<nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
	 		<ul class="nav nav-pills">
		   		<li class="bt_nav" id="main_page"><a href="#"> 首页 </a></li>
		   		<li class="bt_nav" id="register"><a href="#"> 注册 </a></li>
		   		<li class="bt_nav" id="login"><a href="#"> 登陆 </a></li>
	  		</ul>
  		</nav>
  	</header>
  	<div id="content">
  		<canvas id="canvas1"></canvas>
  		<canvas id="canvas2"></canvas>
  		<canvas id="canvas3"></canvas>
  		<canvas id="canvas4"></canvas>
  	</div>
  	<script type="text/javascript">
      window.onload=function(){
          InitMainpage();
      };
      function InitCanvas_Size(canvas_item,height,width,color){
          canvas_item.innerHeight(height);
          canvas_item.innerWidth(width);
          canvas_item.css({backgroundColor:color});
      }
      function InitMainpage(){
          var body_width=$(window).width();
          var nav_height=$('body header').height();
          var body_height=$(window).height();
          var canvas_array=new Array($('#canvas1'),$('#canvas2'),$('#canvas3'),$('#canvas4'));
          for(var i in canvas_array){
              InitCanvas_Size(canvas_array[i],body_height,body_width,'hsla(0,0%,98%,1)');
          }
      }
      $('[class=bt_nav]').bind('click',function(){
        var item_element=$(this).eq(0).attr("id");
        $('.active').removeClass('active');
        $(this).addClass('active');
        switch(item_element){
          case "main_page":{
            $('#content').load("main.html #main_content",function(){
              InitMainpage();
            });
            break;
          }
          case "register":{
            $('#content').load("register.html #register_content");
            break;
          }
          case "login":{
            $('#content').load("login.html #login_content");
            break;
          }
        }
      });
  	</script>
</body>
</html>