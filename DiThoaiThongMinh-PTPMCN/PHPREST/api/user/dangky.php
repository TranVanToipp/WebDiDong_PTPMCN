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
				$fp = fopen('C:\\wamp64\\www\\WebDiDong_PTPMCN\\DiThoaiThongMinh-PTPMCN\\PHPREST\\api\\user\\input.txt', 'w');
				fputs($fp,'{ '."\n");
				fputs($fp,'"fullname": "'.$_POST['fullname'].'",'."\n");
				fputs($fp,'"email": "'.$_POST['email'].'",'."\n");
				fputs($fp,'"phone_number": "",'."\n");
				fputs($fp,'"address": "",'."\n");
				fputs($fp,'"userName": "'.$_POST['userName'].'",'."\n");
				fputs($fp,'"password": "'.$_POST['password'].'"'."\n");
				fputs($fp,'}');
				fclose($fp);
				header('Location:../../../../DiThoaiThongMinh-PTPMCN/PHPREST/api/user/createUser.php');
			}
		?>
	</body>
</html>