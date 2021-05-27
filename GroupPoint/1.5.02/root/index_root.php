<?php
include './config.php';
include './SN.php';
include "../source/common/head.php";
echo "<head><link rel='stylesheet' type='text/css' href='../style/index_root.css'></head>";
	echo "	<form id='form' name='root' method='post' action='./root.php'>
			<table border='0' width='device-width' align='center'>
			<tr><td colspan='2' align='center'><a class='WebsiteName'>{$_WebsiteName}</a><a class='WebsiteVer'>{$_WebsiteVer}工程模式</a></td></tr>
			<tr><td align='right'>DB服务器：</td><td align='left'><input type='text' name='Server_Root' value={$_DBHost}></td></tr>
			<tr><td align='right'>DB服务器账户：</td><td align='left'><input type='text' name='ServerUsername_Root' value={$_DBUsername}></td></tr>
			<tr><td align='right'>DB服务器密码：</td><td align='left'><input type='text' name='ServerPassword_Root' value={$_DBPassword}></td></tr>
			<tr><td align='right'>数据库名称：</td><td align='left'><input type='text' name='ServerDBName_Root' value={$_DBName}></td></tr>
			<tr><td align='right'>管理口令：</td><td align='left'><input type='password' name='Password_Root'></td></tr>
			<tr><th><td align='right'><a class='index_root' href='#' onclick='document:form.submit()'>创建数据库</a></td></th></tr>
			</table></form>";
	//foot
	include "../source/common/foot.php";
?>
