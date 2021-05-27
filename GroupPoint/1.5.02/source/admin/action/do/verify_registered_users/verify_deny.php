<?php
include '../../../../../root/SN.php';
include '../../../../../root/config.php';
include '../../../../common/head.php';
echo "<head><link rel='stylesheet' type='text/css' href='../../../../../style/user.css'></head>";
	$Username=$_GET['Username'];
	$ConnectMysql = mysqli_connect($_DBHost,$_DBUsername,$_DBPassword,$_DBName);
	if (!$ConnectMysql){
		die('Could not connect: ' . mysqli_connect_error());
	}
		mysqli_select_db($ConnectMysql,$_DBName);
		mysqli_query($ConnectMysql,"DELETE FROM register WHERE `Username`='{$Username}'");
		mysqli_close($ConnectMysql);
echo "<table border='0' width='device-width' align='center'><tr><td colspan='2' align='center'><a class='WebsiteName'>{$_WebsiteName}</a><a class='WebsiteVer'>{$_WebsiteVer}</a></td></tr>";
	echo "<tr><td colspan='2' align='center'><a style='color:red;'>{$Username}</a>删除成功！</td>
			<tr><td colspan='2'><a href='../verify_registered_users.php'>返回注册管理中心</a></td></tr>";
	echo "</table>";//表格结束
	//foot
	include "../../../../common/foot.php";
?>