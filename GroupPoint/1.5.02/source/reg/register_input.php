<?php
include '../../root/SN.php';
include '../../root/config.php';
include '../common/head.php';
	echo "<head><link rel='stylesheet' type='text/css' href='../../style/index.css'></head>";
	echo "<form id='form' name='login' method='post' action='./register.php'>
			<table border='0' width='device-width' align='center'>
			<tr ><td colspan='2' align='center'><a class='WebsiteName'>{$_WebsiteName}</a><a class='WebsiteVer'>{$_WebsiteVer}</a></td></tr>
			<tr><td align='right'>账号：</td><td align='left'><input type='text' name='Username' maxLength=16></td></tr>
			<tr><td align='right'>密码：</td><td align='left'><input type='password' name='Password' maxLength=16></td></tr>
			<tr><td align='right'>再次输入密码：</td><td align='left'><input type='password' name='Password2' maxLength=16></td></tr>
			<tr><td align='right'>邀请码（CDKey）：</td><td align='left'><input type='text' name='CDKey' maxLength=16></td></tr>
			<tr><th><td align='right'><a class='index_login' href='#' onclick='document:form.submit()'>注册</a></td></th></tr>
			<tr><td colspan='2' align='center'><a class='index_register' href='../../index.php'>使用已有账户登录</a></td></tr>
			</table></form>";
	//foot
	include "../common/foot.php";
?>
