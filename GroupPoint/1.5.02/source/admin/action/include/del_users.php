<?php
	echo "<tr><td class='menu' colspan='2' align='center'>删除用户</td></tr>";
	echo "<form action='./action/do/del_users.php' method='post'>";
	echo "<tr><td align='left'>用户名：</td><td align='left'><input type='text' name='Username'></td></tr>";
	echo "<tr><td colspan='2' align='right'><a href='./action/do/users.php'>用户中心</a> <input type='submit' value='删除'></td></tr></form>";
	echo "<tr><td colspan='2'><hr /></td></tr>";//分割线
?>