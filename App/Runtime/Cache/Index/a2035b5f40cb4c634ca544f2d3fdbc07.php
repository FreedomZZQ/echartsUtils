<?php if (!defined('THINK_PATH')) exit();?>﻿<!doctype html>
<html>
<head>
<title>srp text</title>
<meta http-equiv="charset" content="UTF-8">
<script type="text/javascript" src="__PUBLIC__/Js/jquery.min.js"></script>
<script src="__PUBLIC__/Js/bootstrap.min.js"></script>
<link type="text/css" rel="stylesheet" href="__PUBLIC__/Css/bootstrap.min.css">
<link type="text/css" rel="stylesheet" href="__PUBLIC__/Css/srp.css">
</head>
<body >
	<header class="navbar navbar-fixed-top" role="banner">
		<button class="navbar-toggle" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
        		<span class="sr-only">Toggle navigation</span>
        		<span class="icon-bar"></span>
        		<span class="icon-bar"></span>
        		<span class="icon-bar"></span>
      	</button>
      	<div class="navbar-brand">
		 		<div class="navbar-img">
			    	<img  class="img-responsive"src="Public/Img/logo_header.png">
				</div>
		 </div>
 		<nav class="collapse navbar-collapse bs-navbar-collapse navbar-right" role="navigation">
	 		<ul class="nav nav-pills">
		   		<li class="bt_nav" id="main_page"><a class=""><span>Homepage </span></a></li>
		   		<li class="bt_nav" id="chart"><a class=""><span>Chart </span></a></li>
		   		<li class="bt_nav" id="about_to"><a class=""><span>About</span></a></li>
		   		<li class="bt_nav" id="register"><a class=""><span>Sign up</span></a></li>
		   		<li class="hidden-xs"><hr/></li>
		   		<li class="bt_nav" id="login"><a class=""><span>Login in</span></a></li>
	  		</ul>
  		</nav>
  	</header>
  	<div class="col-sm-12"id="content">
  		
  	</div>
  	<script type="text/javascript">
      $('[class=bt_nav]').bind('click',function(){
         var item_element=$(this).eq(0).attr("id");
        $('.active').removeClass('active');
        $(this).addClass('active');
        switch(item_element){
          case "main_page":{
            $('#content').load("<?php echo U(GROUP_NAME . '/Index/main');?> #main_content",function(){
               $("body").attr("id","mian_body");
            });
            break;
          }
          case "chart":{
            $('#content').load("<?php echo U(GROUP_NAME . '/Index/web_echarts');?> #main_content",function(){

              $("body").removeAttr("id");
            });
            break;
          }
          case "about_to":{
              // alert("success");
          }
          case "register":{
          	$('#content').load("<?php echo U(GROUP_NAME . '/Index/register');?> #login_content",function(){
              $("body").removeAttr("id");
            });
            break;
          }
          case "login":{
            $('#content').load("<?php echo U(GROUP_NAME . '/Index/login');?> #login_content",function(){
              $("body").removeAttr("id");
            });
            break;
          }
        }
      });
	  window.onload=function(){
	  	var login_input_width=$('#firstname').outerWidth();
      			var login_input_height=$('#firstname').outerHeight();
      			//var vcodeHeight=$('#button_vcode input').height();
      			//$('#button_vcode img').css("height",vcodeHeight);
      			$('#button_vcode input').css("height",login_input_height);
      			$('#button_vcode img').css("height",login_input_height);
     
      			$('#button_vcode img').css("width",login_input_width / 2);
      			//var vcodeWidth=$('#button_vcode img').width();
      			$('#button_vcode input').css("width",login_input_width / 2);
	  };
      window.onresize=function(){
      	var login_input_width=$('#firstname').outerWidth();
      	var login_input_height=$('#firstname').outerHeight();
      	//var vcodeHeight=$('#button_vcode input').height();
      	//$('#button_vcode img').css("height",vcodeHeight);
      	$('#button_vcode input').css("height",login_input_height);
      	$('#button_vcode img').css("height",login_input_height);
     
      	$('#button_vcode img').css("width",login_input_width / 2);
      	//var vcodeWidth=$('#button_vcode img').width();
      	$('#button_vcode input').css("width",login_input_width / 2);
      	//alert($('#button_vcode img').height());
      	//$('button_vcode img').css("width":"auto");
      	
      };
  	</script>
</body>
</html>