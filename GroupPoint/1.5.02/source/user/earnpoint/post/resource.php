<?php 
include '../../../../root/SN.php';
include '../../../../root/config.php';
include '../../../common/head.php';
$Username=$_COOKIE['student'];
$Name=$_POST['Name'];
$Price=$_POST['Price'];
$Type='online';
$Url=$_POST['Url'];
$Open='1';
echo "<head><link rel='stylesheet' type='text/css' href='../../../../style/user.css'></head>";
echo "<table border='0' width='device-width' align='center'><tr><td colspan='2' align='center'><a class='WebsiteName'>{$_WebsiteName}</a><a class='WebsiteVer'>{$_WebsiteVer}</a></td></tr>";
	if ($Name==''){
		echo "<tr><td colspan='2' align='center' style='color:red;'>商品名称不能为空！</td></tr>
			<tr><td colspan='2' align='center'><a href='../index.php'>返回上一页</a></td></tr>"; 
		echo "</table>";
		include "../../../common/foot.php";
		exit(0);
	}else{
		if ($Price==''){
			echo "<tr><td colspan='2' align='center' style='color:red;'>出售价格不能为空！</td></tr>
			<tr><td colspan='2' align='center'><a href='../index.php'>返回上一页</a></td></tr>";
			echo "</table>";
			include "../../../common/foot.php";
			exit(0);
		}else{
			if ($Url==''){
				echo "<tr><td colspan='2' align='center' style='color:red;'>资源类商品必须设置资源地址！</td></tr>
				<tr><td colspan='2' align='center'><a href='../index.php'>返回上一页</a></td></tr>";
				echo "</table>";
				include "../../../common/foot.php";
				exit(0);
			}else{
				$ConnectMysql = mysqli_connect($_DBHost,$_DBUsername,$_DBPassword,$_DBName);//连接sql服务器
				if (!$ConnectMysql){
					die('Could not connect: ' . mysqli_connect_error());
				}
				mysqli_select_db($ConnectMysql,$_DBName);
				$sql="SELECT * FROM `ssc`";//代入命令
				$result=mysqli_query($ConnectMysql,$sql);//查询数据
				$count=0;
				while($row = mysqli_fetch_array($result))
				{
					$count++;
				}
	
				$ID=$count++;	//---获取订单ID
				date_default_timezone_set('Asia/Shanghai');
				$Date=date('Y-m-d H:i:s');
				mysqli_select_db($ConnectMysql,$_DBName);
				mysqli_query($ConnectMysql,"INSERT INTO ssc (ID, Username, Name, Price, Date, Type, Url, Open) 
				VALUES ('{$ID}', '{$Username}', '{$Name}', '{$Price}','{$Date}','{$Type}','{$Url}','{$Open}')");

				echo "<tr><td colspan='2' align='center'>创建完成，商城信息已经更新。</td></tr>";
				echo "<tr><td colspan='2' align='center'><a href='../../user.php'>返回个人中心</a></td></tr>";
				echo "</table>";
			}
		}
	}
?>