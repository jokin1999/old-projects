<?php
include '../../../../root/SN.php';
include '../../../../root/config.php';
include '../../../common/head.php';
echo "<head><link rel='stylesheet' type='text/css' href='../../../../style/user.css'></head>";
	if (isset($_COOKIE['user'])){
			echo "<form id='form' action='./paylink.php' method='post'>
					<table border='0' width='device-width' align='center'><tr><td colspan='2' align='center'><a class='WebsiteName'>{$_WebsiteName}</a><a class='WebsiteVer'>{$_WebsiteVer}</a></td></tr>";
			echo "<tr><td>支付给：<input type='text' name='Username'></td></tr>";
			echo "<tr><td align='right'><a class='button' href='#' onclick='document:form.submit()'>安全支付</a></td></tr>";
		//返回
		echo "<tr><td align='center'><a href='../../user.php'>返回个人中心</a></td></tr></table>";
	}else{
		echo "<table border='0' width='device-width' align='center'><tr><td colspan='2' align='center'><a class='WebsiteName'>{$_WebsiteName}</a><a class='WebsiteVer'>{$_WebsiteVer}</a></td></tr>";
		echo "<tr><td align='center'>您还没有登录，页面将在3秒内跳转。</td></tr>";
		echo "<tr><td align='center'><a href='../../../../../index.php'>没有反应请点击这里</a></td></tr></table>";
		echo "<meta http-equiv='refresh' content='2;url=../../../../index.php'> ";
	}

	include "../../../common/foot.php";
?>
