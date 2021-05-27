<?php
include './root/SN.php';
include './root/config.php';
include './source/common/head.php';
	echo "<head><link rel='stylesheet' type='text/css' href='./style/index.css'></head>";
	echo "<form id='form' name='login' method='post' action='./source/user/login.php'>
			<table border='0' width='device-width' align='center'>
			<tr><td colspan='2' align='center'><a class='WebsiteName'>{$_WebsiteName}</a><a class='WebsiteVer'>{$_WebsiteVer}</a></td></tr>
			<tr><td align='right'>账号：</td><td align='left'><input type='text' name='Username' maxLength=16></td></tr>
			<tr><td align='right'>密码：</td><td align='left'><input type='password' name='Password' maxLength=16></td></tr>
			<tr><th><td align='right'><a class='index_login' href='#' onclick='document:form.submit()'>安全登录</a></td></th></tr>
			<tr><td colspan='2' align='center'><a class='index_register' href='./source/reg/register_input.php'>没有账户？免费注册！</a></td></tr>
			<tr><td colspan='2' align='center' style='font-size:10px;color:orange;'>推荐使用QQ浏览器高速渲染打开本站！</td></tr>
			</table></form>";

	if (isset($_COOKIE['user'])){
		if ($_COOKIE['user']!=""){
			echo "<table border='0' width='device-width' align='center'>";
			echo "<tr><td><a href='./source/user/user.php' style='color:green;'>您已经登录，点击进入用户中心！</a></td></tr>";
			echo "</table>";
		}
	}

//index_page
	include "./source/common/foot.php";
?>
