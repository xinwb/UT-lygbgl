<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:96:"/Applications/XAMPP/xamppfiles/htdocs/ut-lygbgl/public/../application/admin/view/login/index.htm";i:1524147185;}*/ ?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<title>登录页</title>
<meta name="description" content="login page">
<meta name="keywords" content="index">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="renderer" content="webkit">
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--styles-->
<link href="__ADMIN__/style/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="__ADMIN__/style/css/font-awesome.min.css" rel="stylesheet">
<link href="__ADMIN__/style/css/amazeui.min.css" rel="stylesheet" type="text/css">
<link href="__ADMIN__/style/css/admin.css" rel="stylesheet" type="text/css">
<link href="__ADMIN__/style/css/app.css" rel="stylesheet" type="text/css">
<link href="__ADMIN__/style/css/loginstyle.css" rel="stylesheet" type="text/css">

<!--/styles-->
</head>
<body>
<div class="bg-blur" style="background:url(__ADMIN__/style/imgs/bg.jpg)"></div>
 <div class="am-g myapp-login">
    <div class="xa-center">
     <div id="contentA" class="contentA">
     	<!--<div class="xa-login-ver">
     		XXXXXXXXXXXXXX系统2.0
     	</div>-->
        <div style="width: 100%;height: 25%;"></div>
        <div style="width: 9%;height: 75%;float: left;"></div>
     	<div class="xa-login-content" style="float: left; width: 75%;">
           
           <div class="xa-login-contentA" style="padding-top: 10px;">
     		<img src="__ADMIN__/style/imgs/ly.png" width="250px">
            <p>干部考核管理系统</p>
     	
	       </div>
	       <div class="xa-border"></div>
	       <div class="xa-login-cententB">
	      	<!--<div class="xa-login-news">
	       		<ul class="xa-login-list">
	       			<li><a href="#">
	       				<p>
	       				<span class="xa-time">【2017.10.10】</span>
	       				<span class="xa-new">xxxx比赛报名已经开始已经开始</span></p>
	       				<div class="xa-more">详情</div></a>
	       			</li>
	       			<li><a href="#">
	       				<p>
	       				<span class="xa-time">【2017.10.10】</span>
	       				<span class="xa-new">xxxx比赛报名已经开始已经开始</span></p>
	       				<div class="xa-more">详情</div></a>
	       			</li>
	       		</ul>
	       	</div>-->
	       </div>
     	</div>
     </div>
     <!--登录框-->
     <div id="contentB" class="contentB">
         <div class="xa-kongge" ></div>
         <div class="myapp-login-logo-text">
             <p class="xa-loginM-title">欢迎使用高校干部考核与信息管理系统</p>
             <div class="xa-login-logo-text">用户登录</div>
             <!--<div class="login-font"></div>--><!--添加系统副标题，可选-->
             <div class="am-u-sm-12 login-am-center xa-login-center">
             	<form class="am-form "  name="loginform" accept-charset="utf-8" id="login_form" method="post"><input type="hidden" name="did" value="0"/>
             	    <!--用户名-->
             		<div class="am-form-group xa-am-form">
             			<input class="xa-first-child" type="text" id="" name="worknum" placeholder="教师工号">
             		</div>
             		<!--密码-->
             		<div class="am-form-group xa-login-mima xa-am-form">
             			<input class="" type="password" id="" name="password" placeholder="密码">
             		</div>
             		<!--验证码-->
             		<!-- <div class="am-form-group xa-am-form">
             			<input class="" type="text" id="" name="code" placeholder="验证码，点击图片刷新">
                        <img class="xa-login-yzmB" src="<?php echo captcha_src(); ?>" onclick="this.src='<?php echo captcha_src(); ?>?'+Math.random();" width="100"  alt="captcha" />	
             		</div> -->
             		<!--登录按钮-->
             		<button class="am-btn am-btn-default" type="submit">登&nbsp;&nbsp;&nbsp;录</button> 
             	</form>
                <div>
                	<a href="#" style="float: left;">忘记密码 ?</a>
                	<!--<span style="float: right;">没有账号？<a href="#">点击注册</a></span>-->
                </div>
                <!--<div class="xa-border xa-border-tz"></div>-->
             </div>
             
         </div>
         <div class="login-font"></div>
         <div class="am-u-sm-10 login-am-center"></div>
     </div>
     <!--/登录框-->
     </div>
 </div>

 <script src="__ADMIN__/style/jquery.js"></script>
    <script src="__ADMIN__/style/bootstrap.js"></script>
    <script src="__ADMIN__/style/jquery_002.js"></script>
    <!--Beyond Scripts-->
    <script src="__ADMIN__/style/beyond.js"></script>

</body>
</html>
