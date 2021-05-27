<?php
include '../../../../root/SN.php';
include '../../../../root/config.php';
include '../../../common/head.php';
echo "<head><link rel='stylesheet' type='text/css' href='../../../../style/user.css'></head>";
$Username=$_GET['Username'];
$ID=$_GET['ID'];
$Pay=$_GET['Price'];
echo "<table border='0' width='device-width' align='center'><tr><td colspan='2' align='center'><a class='WebsiteName'>{$_WebsiteName}</a><a class='WebsiteVer'>{$_WebsiteVer}</a></td></tr>";
	if (isset($_COOKIE['student'])){
		$ConnectMysql = mysqli_connect($_DBHost,$_DBUsername,$_DBPassword,$_DBName);//连接sql服务器
		if (!$ConnectMysql){
			die('Could not connect: ' . mysqli_connect_error());
		}
				//收款
				mysqli_select_db($ConnectMysql,$_DBName);
				$sql="SELECT * FROM `ssc` WHERE `ID` = '{$ID}'";//代入命令
				$result=mysqli_query($ConnectMysql,$sql);//查询数据
				$Info=mysqli_fetch_array($result);//排列数据	
				$Username=$Info['Username'];//卖家用户名

				mysqli_select_db($ConnectMysql,$DBName);
				$sql="SELECT * FROM `account` WHERE `Username` = '{$Username}'";//代入命令
				$result=mysqli_query($ConnectMysql,$sql);//查询数据
				$Info=mysqli_fetch_array($result);//排列数据
				$temppoint=$Info['Point']+$Pay;
				$sql="UPDATE account SET Point = '{$temppoint}'WHERE `Username` = '{$Info['Username']}' ";//代入命令
				$result=mysqli_query($ConnectMysql,$sql);//提交数据

				$sql="UPDATE buy_record SET Finish = '1'WHERE `ID` = '{$ID}' ";//代入命令
				$result=mysqli_query($ConnectMysql,$sql);//提交数据
				echo "<tr><td colspan='2' align='center' style='color=green;'>签收成功！对方已经收到您的货款。</td></tr>";
				echo "<tr><td colspan='2' align='center'><a href='../../user.php'>返回个人中心</a></td></tr>";
				echo "</table>";
				mysqli_close($ConnectMysql);

	}else{
		echo "<tr><td colspan='2' align='center' style='color=red;'>您还没有登录，页面将在3秒内跳转。</td></tr>";
		echo "<tr><td colspan='2' align='center'><a href='../../../../../index.php'>没有反应请点击这里</td></tr>";
		echo "<meta http-equiv='refresh' content='2;url=../../../../../index.php'>";
		echo "</table>";
	}
//foot
include "../../../common/foot.php";
?>