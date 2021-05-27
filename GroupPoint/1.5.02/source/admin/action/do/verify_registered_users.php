<?php
include '../../../../root/SN.php';
include '../../../../root/config.php';
include '../../../common/head.php';
echo "<head><link rel='stylesheet' type='text/css' href='../../../../style/user.css'></head>";

echo "<table border='0' width='device-width' align='center'><tr><td colspan='3' align='center'><a class='WebsiteName'>{$_WebsiteName}</a><a class='WebsiteVer'>{$_WebsiteVer}</a></td></tr>";
	echo "<tr><td colspan='3' align='center'>尊敬的管理员 {$_COOKIE['user']}</td></tr>";
	echo "<tr><td colspan='3'><hr /></td></tr>";//分割线
	$ConnectMysql = mysqli_connect($_DBHost,$_DBUsername,$_DBPassword,$_DBName);//连接sql服务器
	if (!$ConnectMysql){
		die('Could not connect: ' . mysqli_connect_error());
	}
	mysqli_select_db($ConnectMysql,$_DBName);
	$sql="SELECT * FROM `register`";//代入命令
	$result=mysqli_query($ConnectMysql,$sql);//查询数据
	$count=0;
	echo "<tr><td colspan='3' align='center' class='menu'>待审核用户</td></tr>";
	echo "<tr><td align='center'>用户名</td><td align='center'>CDkey</td><td align='center'>操作</td></tr>";//表头
	while($row = mysqli_fetch_array($result)){
	$count++;
	echo "<tr><td>{$row['Username']}</td><td>{$row['CDKey']}</td><td><a href='./verify_registered_users/verify_pass_input.php?Username={$row['Username']}' style='color:green;'>通过</a> <a href='./verify_registered_users/verify_deny.php?Username={$row['Username']}' style='color:red;'>删除</a></td></tr>";
	}
	
	if ($count==0){
		$color="green";
	}else{
		$color="red";
	}
	echo "<tr><td colspan='3' align='center' style='color:{$color}'>待审核人数为：{$count}位。</td></tr>";
	echo "<tr><td colspan='3'><hr /></td></tr>";//分割线
	echo "<tr><td colspan='3' align='center'><a href='../../manager.php'>返回管理中心</a></td></tr>";
	echo "<tr><td colspan='3'><hr /></td></tr>";//分割线
	echo "</table>";//表格结束

	//foot
	include "../../../common/foot.php";
?>