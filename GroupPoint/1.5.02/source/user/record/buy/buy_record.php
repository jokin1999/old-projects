<?php
include '../../../../root/SN.php';
include '../../../../root/config.php';
include '../../../common/head.php';
echo "<head><link rel='stylesheet' type='text/css' href='../../../../style/user.css'></head>";
	$ConnectMysql = mysqli_connect($_DBHost,$_DBUsername,$_DBPassword,$_DBName);//连接sql服务器
	if (!$ConnectMysql){
		die('Could not connect: ' . mysqli_connect_error());
	}
	mysqli_select_db($ConnectMysql,$_DBName);
	$sql = "SELECT * FROM `buy_record`\n"
    . "ORDER BY `buy_record`.`Date` DESC LIMIT 0, 30 ";
	$result=mysqli_query($ConnectMysql,$sql);//查询数据
	$count=0;
	echo "<table border='0' width='device-width' align='center'><tr>
	<td colspan='7' align='center'><a class='WebsiteName'>{$_WebsiteName}</a><a class='WebsiteVer'>{$_WebsiteVer}</a></td></tr>;
			<tr>
			<th scope='col'>订单ID</th>
			<th scope='col'>商品ID</th>
			<th scope='col'>价格</th>
			<th scope='col'>交易方式</th>
			<th scope='col'>交易日期</th>
			<th scope='col'>状态</th>
			<th scope='col'>操作</th>
			</tr>";
	while($row = mysqli_fetch_array($result)){
		if ($row['BuyerUsername']==$_COOKIE['student']){
			$count++;
			if ($row['Finish']=='0'){
				$Finish='交易中';
				echo "<tr>
				<tr scope='col'style='color: red;'>{$row['ID']}</tr>
				<tr scope='col'>{$row['ShopID']}</tr>
				<tr scope='col'>{$row['Price']}</tr>
				<tr scope='col'>{$row['Type']}</tr>
				<tr scope='col'>{$row['Date']}</tr>
				<tr scope='col'style='color: red;'>{$Finish}</tr>
				<tr scope='col'><a style='color: red;' href='./sign.php?Username={$_COOKIE['student']}&ID={$row['ID']}&Price={$row['Price']}'>确认收货</a></tr>
				</tr>";
			}else{
				$Finish='完成';
				echo "<tr>
				<td scope='col'>{$row['ID']}</td>
				<td scope='col'>{$row['ShopID']}</td>
				<td scope='col'>{$row['Price']}</td>
				<td scope='col'>{$row['Type']}</td>
				<td scope='col'>{$row['Date']}</td>
				<td scope='col' style='color: green;'>{$Finish}</td>
				<td scope='col' style='color: grey;'>";
				$ID=$row['ID'];
				$ShopID=$row['ShopID'];
				include "./actions.php";
				echo "</th></tr>";
			}

		}
	}
	echo "<tr><th colspan='7'>有效订单数量为：{$count} 个。</th></tr>";
	echo "<tr><th colspan='7'><a href='../../user.php'>返回个人中心</a></th></tr>";
	echo "</table>";
	//foot
	include "../../../common/foot.php";
?>