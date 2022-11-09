<?php

	$db_host 	 = 'localhost';
	$db_user 	 = 'root';
	$db_password ='';
	$db_name 	 = 'database_sphone';

	$db = new PDO("mysql:host=$db_host; dbname=$db_name; charset=utf8",$db_user,$db_password);
	//$db gọi là đối tượng kết nối.
	
	//thiết lập các thuộc tính ở đây
	$db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); //tắt tính năng mô phỏng
	$db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);//bật chuyển đổi bộ đệm
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);//đặt chế độ lỗi PDO thành ngoại lệ
	
?>