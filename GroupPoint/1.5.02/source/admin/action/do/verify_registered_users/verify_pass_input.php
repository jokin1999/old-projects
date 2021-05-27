<?php
include '../../../../../root/SN.php';
include '../../../../../root/config.php';
include '../../../../common/head.php';
echo "<head><link rel='stylesheet' type='text/css' href='../../../../../style/user.css'></head>";
$Username=$_GET['Username'];
echo "<table border='0' width='device-width' align='center'><tr><td colspan='2' align='center'><a class='WebsiteName'>{$_WebsiteName}</a><a class='WebsiteVer'>{$_WebsiteVer}</a></td></tr>";
	echo "<tr><td colspan='2' align='center'>尊敬的管理员 {$_COOKIE['user']}</td></tr>";
	echo "<tr><td colspan='2'><hr /></td></tr>";//分割线
	$ConnectMysql = mysqli_connect($_DBHost,$_DBUsername,$_DBPassword,$_DBName);//连接sql服务器
	if (!$ConnectMysql){
		die('Could not connect: ' . mysql_error());
	}
	mysqli_select_db($ConnectMysql,$_DBName);
	$sql="SELECT * FROM `account` WHERE `Username` = '{$Username}'";//代入命令
	$result=mysqli_query($ConnectMysql,$sql);//查询数据
	$Info=mysqli_fetch_array($result);//排列数据
	echo "<form action='./verify_pass.php' method='post'>
			<tr><td align='right'>账号：</td><td align='left'><input readonly='true' type='text' name='Username' value='{$Username}'></td></tr>
			<tr><td align='right'>Point:</td><td align='left'><input type='text' name='Point' value='100'></td></tr>
			<tr><td align='right'>Student:</td><td align='left'><input type='text' name='Student' value='2'></td></tr>
			<tr><td align='right'>Righter：</td><td align='left'><input type='text' name='Righter' value='2'></td></tr>
			<tr><td align='right'>Vaild：</td><td align='left'><input type='text' name='Vaild' value='1'></td></tr>
			<tr><td colspan='2' align='right'><input type='submit' value='注册'></td></tr></form>";
	echo "<tr><td colspan='2'><hr /></td></tr>";//分割线
	echo "</table>";//表格结束
	//foot
	include "../../../../common/foot.php";
	
?>