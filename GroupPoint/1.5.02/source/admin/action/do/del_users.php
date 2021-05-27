<?php
include '../../../../root/SN.php';
include '../../../../root/config.php';
include '../../../common/head.php';
echo "<head><link rel='stylesheet' type='text/css' href='../../../../style/user.css'></head>";
$Username=$_POST['Username'];
echo "<table border='0' width='device-width' align='center'><tr><td colspan='2' align='center'><a class='WebsiteName'>{$_WebsiteName}</a><a class='WebsiteVer'>{$_WebsiteVer}</a></td></tr>";
	echo "<tr><td colspan='2' align='center'>尊敬的管理员 {$_COOKIE['user']}</td></tr>";
	echo "<tr><td colspan='2'><hr /></td></tr>";//分割线
	$ConnectMysql = mysqli_connect($_DBHost,$_DBUsername,$_DBPassword,$_DBName);//连接sql服务器
	if (!$ConnectMysql){
		die('Could not connect: ' . mysqli_connect_error());
	}
	mysqli_select_db($ConnectMysql,$_DBName);
	$sql="SELECT * FROM `account` WHERE `Username` = '{$Username}'";//代入命令
	$result=mysqli_query($ConnectMysql,$sql);//查询数据
	$Info = mysqli_fetch_array($result);
	if ($Info['Username']!=$Username){
		echo "<tr><td colspan='2' align='center' style='color:red;'>用户 {$Username} 不存在！</td></tr>";
		echo "<tr><td colspan='2' align='center'><a href='../../manager.php'>返回管理中心</a></td></tr></table>";
		echo "<tr><td colspan='2'><hr /></td></tr>";//分割线
	}else{
		echo "<form action='./del_users/del.php' method='post'>";
		echo "<tr><td align='right'>用户名:</td>
		<td align='left'><input readonly='true' type='text' name='Username' value={$Info['Username']}></td></tr>";
		echo "<tr><td align='right'>Point:</td>
		<td align='left'><input readonly='true' type='text' name='Point' value={$Info['Point']}></td></tr>";
		echo "<tr><td align='right'>Student:</td>
		<td align='left'><input readonly='true' type='text' name='Student' value={$Info['Student']}></td></tr>";
		echo "<tr><td align='right'>Righter:</td>
		<td align='left'><input readonly='true' type='text' name='Righter' value={$Info['Righter']}></td></tr>";
		echo "<tr><td align='right'>Vaild:</td>
		<td align='left'><input readonly='true' type='text' name='Vaild' value={$Info['Vaild']}></td></tr>";
		
		echo "<tr><td colspan='2' align='center'><input type='submit' value='确认删除'></td></tr>";
		echo "<tr><td colspan='2' align='center'><a href='../../manager.php'>返回管理中心</a></td></tr>";
		echo "<tr><td colspan='2'><hr /></td></tr>";//分割线
		echo "</table>";
	}
	//foot
	include "../../../common/foot.php";
?>