<?php
include '../../../../../root/SN.php';
include '../../../../../root/config.php';
include '../../../../common/head.php';
echo "<head><link rel='stylesheet' type='text/css' href='../../../../../style/user.css'></head>";
$Username=$_POST['Username'];
	$ConnectMysql = mysqli_connect($_DBHost,$_DBUsername,$_DBPassword,$_DBName);
	if (!$ConnectMysql){
		die('Could not connect: ' . mysqli_connect_error());
	}
	mysqli_select_db($ConnectMysql,$_DBName);
	//删除
	mysqli_query($ConnectMysql,"DELETE FROM account WHERE `Username`='{$Username}'");
	mysqli_close($ConnectMysql);	
echo "<table border='0' width='device-width' align='center'><tr><td colspan='2' align='center'><a class='WebsiteName'>{$_WebsiteName}</a><a class='WebsiteVer'>{$_WebsiteVer}</a></td></tr>";
	echo "<tr><td colspan='2' align='center'><a style='color:red;'>{$Username}</a>删除成功！</td>";
	echo "<tr><td colspan='2'><a href='../../../manager.php'>返回管理中心</a></td></tr>";
	echo "</table>";
	//foot
	include "../../../../common/foot.php";		
?>