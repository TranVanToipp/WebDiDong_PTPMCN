<html>
	<head><meta charset="utf8">
		<title>Đăng kí thông tin</title>
	<head>
	<body>
		<table align= "center">
		<form action="<?php echo $_SERVER['PHP_SELF'];?>" METHOD ="POST">
			<tr><td colspan="2" align="center"><b>Thông Tin Đăng Kí</b></td></tr>
			<tr><td> user name:</td><td><input type="text" name="fullname" value=""></td></tr>
			<tr><td> Tên DN(SID):</td><td><input type="text" name="userName" value=""></td></tr>
			<tr><td>Mật Khẩu:</td><td><input type="password" name="password" value=""></td></tr>
			<tr><td>Email:</td><td><input type="text" name="email" value=""></td></tr>
			<tr><td colspan="2" align="right"><input type="submit" name="dk" value="Đăng Ký"></td></tr>
		</form>
		</table>
		<?php
			if(isset($_POST['fullname'])&&isset($_POST['userName'])&&isset($_POST['password'])&&isset($_POST['email'])){
				$user_arr = array(
					'fullname' =>$_POST['fullname'],
					'email' =>$_POST['email'],
					'phone_number' =>'',
					'address' =>'',
					'userName' =>$_POST['userName'],
					'password' =>$_POST['password']
				);
				$json = json_encode($user_arr);
				$fp = fopen('C:\\wamp64\\www\\WebDiDong_PTPMCN\\DiThoaiThongMinh-PTPMCN\\PHPREST\\api\\user\\input.txt', 'w');
				fputs($fp,$json);
				fclose($fp);
				header('Location:../../../../DiThoaiThongMinh-PTPMCN/PHPREST/api/user/createUser.php');
			}
		?>
	</body>
</html>