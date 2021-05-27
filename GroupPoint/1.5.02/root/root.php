<?php
include './config.php';
include './SN.php';
include "../source/common/head.php";
echo "<head><link rel='stylesheet' type='text/css' href='../style/root.css'></head>";
echo "<table border='0' width='device-width' align='center'>";
	echo "<tr><td colspan='2' align='center'><a class='WebsiteName'>{$_WebsiteName}</a><a class='WebsiteVer'>{$_WebsiteVer}工程模式</a></td></tr>";
	$_DB_Host=$_POST["Server_Root"];//获取数据服务器地址
	$_DB_Username=$_POST["ServerUsername_Root"];//获取服务器账户
	$_DB_Password=$_POST["ServerPassword_Root"];//获取服务器密码
	$_DB_Name=$_POST["ServerDBName_Root"];//获取数据库名
	$Password_Root=$_POST["Password_Root"];//获取管理口令
	echo "<tr><td class='DBData'>DB服务器：{$_DB_Host}</td></tr>";
	echo "<tr><td class='DBData'>DB服务器账户：{$_DB_Username}</td></tr>";
	echo "<tr><td class='DBData'>DB服务器密码：{$_DB_Password}</td></tr>";
	echo "<tr><td class='DBData'>数据库名称：{$_DB_Name}</td></tr>";
	echo "<tr><td>检测身份中，请稍候</td></tr>";
	if ($Password_Root=="rooter"){
		echo "<tr><td class='pass'>Pass</td></tr>";
		echo "<tr><td>身份为<a class='user_root'>最高管理员</a></td></tr>";
		echo "<tr><td>连接服务器中，请稍候</td></tr>";
		echo "<tr><td><hr /></td></tr>";
		$ConnectMysql = mysqli_connect($_DB_Host,$_DB_Username,$_DB_Password,$_DB_Name);//连接SQL服务器
		if (!$ConnectMysql){
			die('Could not connect: ' . mysqli_connect_error());
		}
		echo "<tr><td>获取服务器数据中，请稍候</td></tr>";
		//用户数据库
		mysqli_select_db($ConnectMysql,$_DB_Name);//选择数据库
		$Account_Create = "CREATE TABLE Account
(
Username varchar(16),
Password varchar(16),
Point varchar(16),
Student varchar(1),
Righter varchar(1),
Vaild varchar(1)
)";
		mysqli_query($ConnectMysql,$Account_Create);
		mysqli_select_db($ConnectMysql,$_DB_Name);//选择数据库
		mysqli_query($ConnectMysql,"INSERT INTO `gp`.`account` (`Username`, `Password`, `Point`, `Student`, `Righter`, `Vaild`)
		VALUES ('root', 'root', '888888', '9', '9', '1');;");
		echo "<tr><td>建设完成，正在断开连接</td></tr>";

		//注册用户（未审核数据库）
		mysqli_select_db($ConnectMysql,$_DB_Name);//选择数据库
		$Register_Create = "CREATE TABLE register
(
Username varchar(16),
Password varchar(16),
CDKey varchar(16)
)";
		mysqli_query($ConnectMysql,$Register_Create);

		//CDKey（注册用户CDKey数据库）
		mysqli_select_db($ConnectMysql,$_DB_Name);//选择数据库
		$RegCDKey_Create = "CREATE TABLE reg_cdkey
(
CDKey varchar(16),
Point varchar(16),
Student varchar(1),
Righter varchar(1),
Vaild varchar(1),
Times varchar(1)
)";
		mysqli_query($ConnectMysql,$RegCDKey_Create);

		//分享平台（StudentShareCenter）
		mysqli_select_db($ConnectMysql,$_DB_Name);//选择数据库
		$SSC_Create = "CREATE TABLE ssc
(
ID text,
Username varchar(16),
Name text,
Price varchar(9),
Date datetime,
Type varchar(16),
Url text,
Open varchar(1)
)";
		mysqli_query($ConnectMysql,$SSC_Create);

		//购买记录
		mysqli_select_db($ConnectMysql,$_DB_Name);//选择数据库
		$BuyRecord_Create = "CREATE TABLE buy_record
(
ID text,
ShopID text,
SellerUsername varchar(16),
BuyerUsername varchar(16),
Type varchar(16),
Price varchar(9),
Date datetime,
Finish varchar(1)
)";
		mysqli_query($ConnectMysql,$BuyRecord_Create);


		//成就奖励申请
		mysqli_select_db($ConnectMysql,$_DB_Name);//选择数据库
		$BigDealRecord_Create = "CREATE TABLE bigdeal_record
(
Username varchar(16),
Name varchar(1),
Date datetime
)";
		mysqli_query($ConnectMysql,$BigDealRecord_Create);

		//CDKey兑换
		mysqli_select_db($ConnectMysql,$_DB_Name);//选择数据库
		$CDKey_Create = "CREATE TABLE CDKey
(
CDKey varchar(16),
Type varchar(2),
Value varchar(16)
)";
		mysqli_query($ConnectMysql,$CDKey_Create);

		//关闭连接
		mysqli_close($ConnectMysql);

		//-----------------------服务器信息写出
		$temp="$";
		$ServerText="<?php
{$temp}_DBHost='{$_DB_Host}';
{$temp}_DBUsername='{$_DB_Username}';
{$temp}_DBPassword='{$_DB_Password}';
{$temp}_DBName='{$_DB_Name}';
?>";
		echo $ServerText;
		$ServerInfo=fopen("./config.php", "w") or die("<tr><td>写出系统信息失败！请自行添加/root/config.php信息文件。</td></tr></table>");
		fwrite($ServerInfo,$ServerText);
		echo "<tr><td class='pass'>安装完成！</td></tr>";
		print "<tr><td align='center'><a href='../index.php'>返回登录页面</a></td></tr>";
		print "<tr><td align='center'><a href='./index_root.php'>返回工程模式</a></td></tr></table>";
	}else{
		echo "<tr><td class='failure'>身份无效</td></tr>";
		print "<tr><td align='center'><a href='../index.php'>返回登录页面</a></td></tr>";
		print "<tr><td align='center'><a href='./index_root.php'>返回工程模式</a></td></tr></table>";
	}
	//footer
	include "../source/common/foot.php";
?>
