<?php
include '../../root/SN.php';
include '../../root/config.php';
include '../common/head.php';
echo "<head><link rel='stylesheet' type='text/css' href='../../style/login.css'></head>";
echo "<form name='login' method='post' action='./register.php'>";
echo "<table border='0' width='device-width' align='center'>
		<tr ><td colspan='2' align='center'><a class='WebsiteName'>{$_WebsiteName}</a><a class='WebsiteVer'>{$_WebsiteVer}注册</a></td></tr>";
	$Username=$_POST['Username'];
	$Password=$_POST['Password'];
	$Password2=$_POST['Password2'];
	$CDKey=$_POST['CDKey'];
	if ($Username==""){
		echo "<tr><td align='center'>用户名不能为空！请重新填写！</td></tr><tr><td align='center'>页面将在3秒内跳转</td></tr>";
		echo "<tr><td align='center'><a href='./register_input.php'>无法跳转请点击这里</a></td></tr></table>";
		echo "<meta http-equiv='refresh' content='2;url=./register_input.php'> ";
	}else{
			$ConnectMysql = mysqli_connect($_DBHost,$_DBUsername,$_DBPassword,$_DBName);//查询重复情况
		if (!$ConnectMysql){
			die('Could not connect: ' . mysqli_connect_error());
		}
		mysqli_select_db($ConnectMysql,$_DBName);
	
		$sql="SELECT * FROM `account` WHERE `Username` = '{$Username}'";//代入命令
		$result=mysqli_query($ConnectMysql,$sql);//查询数据
		$Info=mysqli_fetch_array($result);//排列数据
		if ($Info['Username']==$Username){
			echo "<tr><td align='center'>用户名已被注册！请重新填写！</td></tr><tr><td align='center'>页面将在3秒内跳转</td></tr>";
			echo "<tr><td align='center'><a href='./register_input.php'>无法跳转请点击这里</a></td></tr></table>";
			echo "<meta http-equiv='refresh' content='2;url=./register_input.php'> ";
		}else{
			if ($Password!=$Password2){
				echo "<tr><td align='center'>密码不一致！请重新填写！</td></tr><tr><td align='center'>页面将在3秒内跳转</td></tr>";
				echo "<tr><td align='center'><a href='./register_input.html'>无法跳转请点击这里</a></td></tr></table>";
				echo "<meta http-equiv='refresh' content='2;url=./register_input.html'> ";
			}else{
				$sql="SELECT * FROM `register` WHERE `Username` = '{$Username}'";//代入命令
				$result=mysqli_query($ConnectMysql,$sql);//查询数据
				$Info=mysqli_fetch_array($result);//排列数据

				if ($Info['Username']==$Username){
					echo "<tr><td align='center'>用户名已被注册！请重新填写！</td></tr><tr><td align='center'>页面将在3秒内跳转。</td></tr>";
					echo "<tr><td align='center'><a href='./register_input.html'>无法跳转请点击这里</a></td></tr></table>";
					echo "<meta http-equiv='refresh' content='2;url=./register_input.html'> ";
				}else{
					//连接服务器注册
					mysqli_close($ConnectMysql);
					register();
				}
			}
		}
	}
	//---------------------------------------------------------------------------
	function register(){
	include '../../root/SN.php';
	include '../../root/config.php';
	$Username=$_POST['Username'];
	$Password=$_POST['Password'];
	$CDKey=$_POST['CDKey'];
	
	$ConnectMysql = mysqli_connect($_DBHost,$_DBUsername,$_DBPassword,$_DBName);
	if (!$ConnectMysql){
		die('Could not connect: ' . mysqli_connect_error());
	}
		mysqli_select_db($ConnectMysql,$_DBName);
		$sql="SELECT * FROM `reg_cdkey` WHERE `CDKey` = '{$CDKey}'";
		$result=mysqli_query($ConnectMysql,$sql);
		$Info=mysqli_fetch_array($result);
		if ($Info['CDKey']=$CDKey)
		{
			//*注册
				$Point=$Info['Point'];
				$Righter=$Info['Righter'];
				$Student=$Info['Student'];
				$Vaild=$Info['Vaild'];
				$Times=$Info['Times'];
				mysqli_select_db($ConnectMysql,$_DBName);
				//连接服务器注册
				mysqli_query($ConnectMysql,"INSERT INTO account (Username, Password, Point, Student, Righter, Vaild) 
				VALUES ('{$Username}', '{$Password}', '{$Point}','{$Student}','{$Righter}','{$Vaild}')");
				if ($Times=='0'){
				//删除
					mysqli_query($ConnectMysql,"DELETE FROM `reg_cdkey` WHERE `CDKey`='{$CDKey}'");
					echo "<tr><td class='success' align='center'>注册成功！</td></tr><tr><td><a href='../../index.php'>返回登录</a></td></tr></table>";
					mysqli_close($ConnectMysql);
				}				
				//*注册
		}else{
				mysqli_query($ConnectMysql,"INSERT INTO register (Username, Password, CDKey) 
				VALUES ('{$Username}', '{$Password}', '{$CDKey}')");
				echo "<tr><td class='success' align='center'>注册成功！（需管理员审核）</td></tr><tr><td align='center'><a href='../../index.php'>返回首页</a></td></tr></table>";
		}
	}
	//foot
	include "../common/foot.php";
	?>