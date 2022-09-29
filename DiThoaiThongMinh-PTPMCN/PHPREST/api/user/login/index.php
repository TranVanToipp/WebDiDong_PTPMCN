<html>
	<head><meta charset="utf8">
		<title>Đăng kí thông tin</title>
	<head>
	<body>
		<table align= "center">
		<form action="<?php echo $_SERVER['PHP_SELF'];?>" METHOD ="POST">
			<tr><td colspan="2" align="center"><b>Thông Tin Đăng Nhập</b></td></tr>
			
			<tr><td> Tên DN(SID):</td><td><input type="text" name="userName" value=""></td></tr>
			<tr><td>Mật Khẩu:</td><td><input type="password" name="password" value=""></td></tr>
			
			<tr><td colspan="2" align="right"><input type="submit" name="dn" value="Đăng Nhập"></td></tr>
		</form>
		</table>
		<?php
			if(isset($_POST['userName'])&&isset($_POST['password'])){
				$url = "http://localhost/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/PHPREST/api/user/read_user.php";
				$json=file_get_contents($url);
				$data = json_decode($json);
				$username = $_POST['userName'];
				$pass= md5($_POST['password']);
				foreach($data->data as $user){
					if($username == $user->userName && $pass == $user->password)
						 header('Location:../../../../../../WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN');
				}
				echo "tài khoản or mật khẩu không đúng";
			}
		?>
	</body>
</html>