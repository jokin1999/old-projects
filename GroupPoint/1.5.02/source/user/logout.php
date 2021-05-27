<?php
include '../../root/SN.php';
include '../../root/config.php';
include '../common/head.php';
echo "<head><link rel='stylesheet' type='text/css' href='../../style/login.css'></head>";
echo "<table border='0' width='device-width' align='center'><tr ><td colspan='2' align='center'><a class='WebsiteName'>{$_WebsiteName}</a><a class='WebsiteVer'>{$_WebsiteVer}</a></td></tr>";
if (isset($_COOKIE['user'])){
	setcookie('user', '', time()-3600,'/','.smartifly.net');
	setcookie('manager', '', time()-3600,'/','smartifly.net');
	setcookie('student', '', time()-3600,'/','smartifly.net');
	setcookie('user', '', time()-3600,'/');
	setcookie('manager', '', time()-3600,'/');
	setcookie('student', '', time()-3600,'/');
	echo "<tr><td align='center'>退出成功！</td></tr><tr><td align='center'><a href='../../index.php'>点击这里跳转首页</a></td></tr></table>";
}else{
	echo "<tr><td align='center'>您还没有登录！</td></tr><tr><td align='center'><a href='../../index.php'>点击这里跳转首页</a></td></tr></table>";
}
?>