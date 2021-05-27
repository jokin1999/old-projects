<?php 
include '../../../../root/SN.php';
include '../../../../root/config.php';
include '../../../common/head.php';
echo "<head><link rel='stylesheet' type='text/css' href='../../../../style/login.css'></head>";
echo "<table border='0' width='device-width' align='center'><tr><td colspan='2' align='center'><a class='WebsiteName'>{$_WebsiteName}</a><a class='WebsiteVer'>{$_WebsiteVer}</a></td></tr>";
$Pay=$_GET['pay_point'];
$PUser=$_COOKIE['puser'];
	if (isset($_COOKIE['user'])){
			$ConnectMysql = mysqli_connect($_DBHost,$_DBUsername,$_DBPassword,$_DBName);//连接sql服务器
			if (!$ConnectMysql){
				die('Could not connect: ' . mysqli_connect_error());
			}
			mysqli_select_db($ConnectMysql,$_DBName);
			$sql="SELECT * FROM `account` WHERE `Username` = '{$_COOKIE['user']}'";//代入命令
			$result=mysqli_query($ConnectMysql,$sql);//查询数据
			$Info=mysqli_fetch_array($result);//排列数据
			if($Info['Point']<$Pay){
				echo "<tr><td class='failed' colspan='2' align='center'>您的{$_Point}不足！</td></tr>";
				echo "<tr><td colspan='2' align='center'><a href='./action.php'>返回支付页</td></tr></table>";
			}else{
				//付款
			$temppoint=$Info['Point']-$Pay;
			$sql="UPDATE account SET Point = '{$temppoint}'WHERE `Username` = '{$_COOKIE['user']}' ";//代入命令
			$result=mysqli_query($ConnectMysql,$sql);//提交数据
				//收款
			$sql="SELECT * FROM `account` WHERE `Username` = '{$PUser}'";//代入命令
			$result=mysqli_query($ConnectMysql,$sql);//查询数据
			$Info=mysqli_fetch_array($result);//排列数据	
			$temppoint=$Info['Point']+$Pay;
			$sql="UPDATE account SET Point = '{$temppoint}'WHERE `Username` = '{$PUser}' ";//代入命令
			$result=mysqli_query($ConnectMysql,$sql);//提交数据
			}
			echo "<tr><td class='success' colspan='2' align='center'>支付完成，请查看款项是否到帐。</td></tr>";
			echo "<tr><td colspan='2' align='center'><a href='../../user.php'>返回个人中心</a></td></tr></table>";
			mysqli_close($ConnectMysql);
			unset($_COOKIE['puser']);
	}else{
		echo "<tr><td class='failed' colspan='2'>您还没有登录！</td></tr>";
		echo "<tr><td colspan='2'><a href='../../../../../index.php'>返回个人中心</a></td></tr></table>";
	}
	include "../../../common/foot.php";
?>
