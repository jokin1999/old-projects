<?php
	$ConnectMysql = mysqli_connect($_DBHost,$_DBUsername,$_DBPassword,$_DBName);//连接sql服务器
	if (!$ConnectMysql){
		die('Could not connect: ' .mysqli_connect_error());
	}
	mysqli_select_db($ConnectMysql,$_DBName);

	$sql="SELECT * FROM `register`";//代入命令
	$result=mysqli_query($ConnectMysql,$sql);//查询数据
	$count=0;
	while($row = mysqli_fetch_array($result))
	{
		$count++;
	}
	if ($count==0){
		$color='green';
	}else{
		$color='red';
	}
	echo "<tr><td colspan='2'><hr /></td></tr>";//分割线
	echo "<tr><td class='menu' colspan='2' align='center'>审核用户</td></tr>";
	echo "<tr><td align='center'><a style='color:{$color};'>{$count}位待审核</a></td><td align='center'><a href='./action/do/verify_registered_users.php'>点此审核</a></td></tr>";
	echo "<tr><td colspan='2'><hr /></td></tr>";//分割线
?>