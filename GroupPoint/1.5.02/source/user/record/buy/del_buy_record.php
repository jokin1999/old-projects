<?php
include '../../../../root/SN.php';
include '../../../../root/config.php';
include '../../../common/head.php';
echo "<head><link rel='stylesheet' type='text/css' href='../../../../style/user.css'></head>";
$ID=$_GET['ID'];
	$ConnectMysql = mysqli_connect($_DBHost,$_DBUsername,$_DBPassword,$_DBName);//连接sql服务器
	if (!$ConnectMysql){
		die('Could not connect: ' . mysqli_connect_error());
	}
	mysqli_select_db($ConnectMysql,$_DBName);
	$sql = "DELETE FROM `buy_record` WHERE `ID`='{$ID}'";
	mysqli_query($ConnectMysql,$sql);
	echo "<table border='0' width='device-width' align='center'><tr><td colspan='2' align='center'><a class='WebsiteName'>{$_WebsiteName}</a><a class='WebsiteVer'>{$_WebsiteVer}</a></td></tr>";
	echo "<tr><td colspan='2' align='center' class='success'>删除记录成功</td></tr>";
	echo "<tr><td colspan='2' align='center' class='button'><a href='./buy_record.php'>返回订单页</a></td></tr>";
	echo "</table>";
	//foot
	include "../../../common/foot.php";
?>