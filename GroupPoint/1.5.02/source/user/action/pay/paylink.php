<?php 
include '../../../../root/SN.php';
include '../../../../root/config.php';
include '../../../common/head.php';
echo "<head><link rel='stylesheet' type='text/css' href='../../../../style/login.css'></head>";
echo "<table border='0' width='device-width' align='center'><tr><td colspan='2' align='center'><a class='WebsiteName'>{$_WebsiteName}</a><a class='WebsiteVer'>{$_WebsiteVer}</a></td></tr>";
$Username=$_POST['Username'];
if ($Username==""){
	echo "<tr><td colspan='2' align='center' class='failure'>收款用户不能为空！</td></tr>";
	echo "<tr><td colspan='2' align='center'><a href='#'>返回上页</a></td></tr></table>";
}else{
	if (isset($_COOKIE['user'])){
			$ConnectMysql = mysqli_connect($_DBHost,$_DBUsername,$_DBPassword,$_DBName);//连接sql服务器
			if (!$ConnectMysql){
				die('Could not connect: ' . mysqli_connect_error());
			}
			mysqli_select_db($ConnectMysql,$_DBName);
			$sql="SELECT * FROM `account` WHERE `Username` = '{$Username}'";//代入命令
			$result=mysqli_query($ConnectMysql,$sql);//查询数据
			$Info=mysqli_fetch_array($result);//排列数据
			setcookie('puser',$Username, time()+300, '/');
			if ($Info['Username']==$Username){
				echo "<tr><td colspan='2' align='center'>本次交易将与用户<a style='color:red;'> {$Username} </a>进行。</td></tr>";
				echo "<tr><td colspan='2' align='left'>支付金额：（点击金额）
				<a class='button' href='./pay_point.php?pay_point=50'>50</a> 
				<a class='button' href='./pay_point.php?pay_point=100'>100</a></td></tr>";
				echo "<tr><td align='right'><a style='color:grey;' href='./action.php'>上一步</a></td></tr>";
			//返回
				echo "<tr><td colspan='2' align='center'><a href='../../user.php'>返回个人中心</a></table>";
				mysqli_close($ConnectMysql);
			}else{
				echo "<tr><td colspan='2' align='center' class='failure'>收款用户不存在！</td></tr>";
				echo "<tr><td colspan='2' align='center'><a href='./action.php'>返回上页</a></td></tr></table>";
			}
			
	}else{
		echo "<tr><td colspan='2' align='center' class='failure'>您还没有登录，页面将在3秒内跳转。</td></tr>";
		echo "<tr><td colspan='2' align='center'><a href='../../../../../index.php'>没有反应请点击这里</a></td></tr></table>";
		echo "<meta http-equiv='refresh' content='2;url=../../../../../index.php'> ";
	}
}
	include "../../../common/foot.php";

?>