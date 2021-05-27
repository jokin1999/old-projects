<?php
	$ConnectMysql_u = mysqli_connect($_DBHost,$_DBUsername,$_DBPassword,$_DBName);//连接sql服务器
	if (!$ConnectMysql_u){
		die('Could not connect: ' . mysqli_connect_error());
	}
	mysqli_select_db($ConnectMysql_u,$_DBName);

	$sql_u="SELECT * FROM `ssc` WHERE `ID` = '{$ShopID}'";//代入命令
	$result_u=mysqli_query($ConnectMysql_u,$sql_u);//查询数据
	$Info_u=mysqli_fetch_array($result_u);//排列数据
	$Url=$Info_u['Url'];
	echo "<a class='button' href='{$Url}' target='_blank'>打开</a> ";
	echo "<a class='button' href='./del_buy_record.php?ID={$ID}'>删除</a>";
?>