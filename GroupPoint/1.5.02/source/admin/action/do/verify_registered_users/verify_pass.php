<?php
include '../../../../../root/SN.php';
include '../../../../../root/config.php';
include '../../../../common/head.php';
echo "<head><link rel='stylesheet' type='text/css' href='../../../../../style/user.css'></head>";
	$Username=$_POST['Username'];
	$Point=$_POST['Point'];
	$Righter=$_POST['Righter'];
	$Student=$_POST['Student'];
	$Vaild=$_POST['Vaild'];
	$ConnectMysql = mysqli_connect($_DBHost,$_DBUsername,$_DBPassword,$_DBName);
	if (!$ConnectMysql){
		die('Could not connect: ' . mysqli_connect_error());
	}
	mysqli_select_db($ConnectMysql,$_DBName);
	//获取原密码
	$sql="SELECT * FROM `register` WHERE `Username` = '{$Username}'";//代入命令
	$result=mysqli_query($ConnectMysql,$sql);//查询数据
	$Info=mysqli_fetch_array($result);//排列数据
	$Password=$Info['Password'];
	$CDKey=$Info['CDKey'];
		//连接服务器注册
		mysqli_query($ConnectMysql,"INSERT INTO account (Username, Password, Point, Student, Righter, Vaild) 
		VALUES ('{$Username}', '{$Password}', '{$Point}','{$Student}','{$Righter}','{$Vaild}')");
		//删除
		mysqli_query($ConnectMysql,"DELETE FROM register WHERE `Username`='{$Username}'");
		mysqli_close($ConnectMysql);
echo "<table border='0' width='device-width' align='center'><tr><td colspan='2' align='center'><a class='WebsiteName'>{$_WebsiteName}</a><a class='WebsiteVer'>{$_WebsiteVer}</a></td></tr>";
	echo "<tr><td colspan='2' align='center'><a style='color:green;'>{$Username}</a>注册成功！</td>
			<tr><td colspan='2'><a href='../verify_registered_users.php'>返回注册管理中心</a></td></tr>";
	echo "</table>";//表格结束

	//foot
	include "../../../../common/foot.php";		
?>