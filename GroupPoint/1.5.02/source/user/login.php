<?php
Session_Start();

include '../../root/SN.php';
include '../../root/config.php';
include '../common/head.php';
echo "<head><link rel='stylesheet' type='text/css' href='../../style/login.css'></head>";
echo "<table border='0' width='device-width' align='center'><tr ><td colspan='2' align='center'><a class='WebsiteName'>{$_WebsiteName}</a><a class='WebsiteVer'>{$_WebsiteVer}</a></td></tr>";
	$Username=$_POST['Username'];
	$Password=$_POST['Password'];
	$ConnectMysql = mysqli_connect($_DBHost,$_DBUsername,$_DBPassword,$_DBName);//连接sql服务器
	if (!$ConnectMysql){
		die('Could not connect: ' . mysql_error());
	}
	mysqli_select_db($ConnectMysql,$_DBName);
	$sql="SELECT * FROM `account` WHERE `Username` = '{$Username}'";//代入命令
	$result=mysqli_query($ConnectMysql,$sql);//查询数据
	$Info=mysqli_fetch_array($result);//排列数据
	if ($Info['Username']==""){
		echo "<tr><td align='center'><p class='failure'>无此用户。</td></tr>
		<tr><td class='failure' align='center'>新注册用户可能暂未通过审核。</td></tr>
		<tr><td align='center'><a style='color:#FF6103;' href='../../index.php'>返回首页</a></td></tr></table>";
	}else{
		if ($Password==$Info['Password']){
			$_SESSION['user']=$Username;
			setcookie('user',$Username, time()+3600, '/');
			echo "<tr><td align='center'><p class='success'>{$_SESSION['user']}成功登录，正在跳转。</td></tr><tr><td align='center'><a href='./user.php'>没有反应？点击这里跳转。</a></p></td></tr></table>";
			echo "<meta http-equiv='refresh' content='1;url=./user.php'>";
		}else{
			echo "<tr><td align='center' style='color:red;'>密码错误</td></tr>";
			echo "<tr><td align='center'><a href='../../index.php' style='color:#FF6103;'>返回首页</a></td></tr>";
			echo "</table>";
		}
	}
	mysqli_close($ConnectMysql);
//index_page
	include "../common/foot.php";
?>