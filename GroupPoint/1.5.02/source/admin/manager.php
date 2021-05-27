<?php
include '../../root/SN.php';
include '../../root/config.php';
include '../common/head.php';
echo "<head><link rel='stylesheet' type='text/css' href='../../style/user.css'></head>";
	if (isset($_COOKIE['manager'])){
			$ConnectMysql = mysqli_connect($_DBHost,$_DBUsername,$_DBPassword,$_DBName);//连接sql服务器
			if (!$ConnectMysql){
				die('Could not connect: ' . mysqli_connect_error());
			}
			mysqli_select_db($ConnectMysql,$_DBName);
			$sql="SELECT * FROM `account` WHERE `Username` = '{$_COOKIE['user']}'";//代入命令
			$result=mysqli_query($ConnectMysql,$sql);//查询数据
			$Info=mysqli_fetch_array($result);//排列数据
			mysqli_close($ConnectMysql);
		echo "<table border='0' width='device-width' align='center'><tr><td colspan='2' align='center'><a class='WebsiteName'>{$_WebsiteName}</a><a class='WebsiteVer'>{$_WebsiteVer}</a></td></tr>";
		echo "<tr><td colspan='2' align='center'>尊敬的管理员 {$_COOKIE['user']} （LV.{$Info['Righter']}）</td></tr>
		<tr><td align='center'><a href='../user/logout.php'>退出登录</a></td>
		<td align='center'><a href='../user/user.php'>返回个人中心</a></td></tr>";
		//审核待注册用户
		include "./action/include/verify_registered_users.php";
		//删除用户
		include "./action/include/del_users.php";
		//服务器操作
		echo "<tr><td class='menu' colspan='2' align='center'>服务器操作</td></tr>";
		echo "<form action='./do_db.php' method='post'>
			<tr><td>站点名称：</td><td><input type='text' name='WebsiteName' value={$_WebsiteName}></td></tr>
			<tr><td>站点版本：</td><td><input type='text' name='WebsiteVer' value={$_WebsiteVer}></td></tr>
			<tr><td>DB服务器：</td><td><input type='text' name='Server_Root' value={$_DBHost}></td></tr>
			<tr><td>DB账户：</td><td><input type='text' name='ServerUsername_Root' value={$_DBUsername}></td></tr>
			<tr><td>DB密码：</td><td><input type='text' name='ServerPassword_Root' value={$_DBPassword}></td></tr>
			<tr><td>DB名称：</td><td><input type='text' name='ServerDBName_Root' value={$_DBName}></td></tr>
			<tr><td>Point名称：</td><td><input type='text' name='Point' value={$_Point}></td></tr>
			<tr><td>Point单位：</td><td><input type='text' name='Point_Unit' value={$_Point_Unit}></td></tr>
			<tr><td colspan='2' align='right'><input type='submit' value='修改'></td></tr>
			</form>";
		echo "<tr><td colspan='2'><hr /></td></tr>";//分割线
		/* echo "<form action='./del_account.php' method='post'>
			<input type='submit' value='删除用户信息'>
			</form>"; */
		/* echo "<form action='./changeuserinfo.php' method='post'>
			<input type='submit' value='修改用户资料'>
			</form>"; */
		echo "</table>";
	}else{
		echo "<table border='0' width='device-width' align='center'><tr><td colspan='2' align='center'><a class='WebsiteName'>{$_WebsiteName}</a><a class='WebsiteVer'>{$_WebsiteVer}</a></td></tr>";
		echo "<tr><td colspan='2' align='right'>您还没有登录，页面将在3秒内跳转。</td></tr>";
		echo "<tr><td colspan='2' align='right'><a href='../../index.php'>没有反应请点击这里</a></td></tr></table>";
		echo "<meta http-equiv='refresh' content='3;url=../../index.php'> ";
	}
	//foot
	include "../common/foot.php";
?>