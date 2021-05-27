<?php 
include '../../../root/SN.php';
include '../../../root/config.php';
include '../../common/head.php';
echo "<head><link rel='stylesheet' type='text/css' href='../../../style/user.css'></head>";
echo "<table border='0' width='device-width' align='center'><tr><td colspan='4' align='center'><a class='WebsiteName'>{$_WebsiteName}</a><a class='WebsiteVer'>{$_WebsiteVer}</a></td></tr>";
	if (isset($_COOKIE['student'])){
			$ConnectMysql = mysqli_connect($_DBHost,$_DBUsername,$_DBPassword,$_DBName);//连接sql服务器
			if (!$ConnectMysql){
				die('Could not connect: ' . mysqli_connect_error());
			}
			mysqli_select_db($ConnectMysql,$_DBName);
			$sql="SELECT * FROM `account` WHERE `Username` = '{$_COOKIE['student']}'";//代入命令
			$result=mysqli_query($ConnectMysql,$sql);//查询数据
			$Info=mysqli_fetch_array($result);//排列数据
			mysqli_close($ConnectMysql);
		echo "<tr><td colspan='4' align='center'>尊敬的{$_COOKIE['student']}（S-LV.{$Info['Student']}）</td></tr>";
		echo "<tr><td colspan='4' align='center'>您剩余的{$_Point}为： {$Info['Point']} 点</td></tr>";
		echo "<tr><td colspan='4' align='center'><a href='../logout.php'>退出登录</a></td></tr>";
		echo "<tr><td colspan='4'><hr /></td></tr>";//分割线
			echo "<form action='./post/resource.php' method='post'>
				<tr><td colspan='4'>商品名称：<input type='text' name='Name'></td></tr>
				<tr><td colspan='4'>出售价格：<input type='text' name='Price'></td></tr>
				<tr><td colspan='4'>资源地址：<input type='text' name='Url'></td></tr>
				<tr><td colspan='4' align='right'><input type='submit' value='出售'></td></tr>
				</form>";
	}else{
		echo "<tr><td colspan='4' align='center'>访问失败，将返回主页。</td></tr>";
		echo "<tr><td colspan='4' align='center'><a href='../../../index.php'>没有反应请点击这里</a></td></tr>";
		echo "<meta http-equiv='refresh' content='4;url=../../../index.php'> ";
	}
	//返回
	echo "<tr><td colspan='4' align='center'><a href='../user.php'>返回个人中心</a></td></tr></table>";
	//foot
	include "../../common/foot.php";
?>