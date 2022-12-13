<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <title>Đổi mật khẩu</title>
</head>

<body>
<div class="main">
<!-- <?php echo $_SERVER['PHP_SELF'];?> -->
<form action="change-pass.php" method="POST" class="form" id="form-1">
    <h3 class="heading">Đổi mật khẩu</h3>

    <div class="spacer"></div>

    <div class="form-group">
        <label for="username" class="form-label">Nhập mật khẩu cũ: </label>
        <input id="username" name="old_pass" required type="text" minlength="6" placeholder="" class="form-control">
        <span class="form-message"></span>
    </div>

    <div class="form-group">
        <label for="password" class="form-label">Nhập mật khẩu mới: </label>
        <input id="password" name="new_pass" required type="password" minlength="6" class="form-control">
        <span class="form-message"></span>
    </div>
    <div class="form-group">
        <label for="password" class="form-label">Nhập lại mật khẩu mới: </label>
        <input id="password" name="re_new_pass" required type="password" minlength="6" class="form-control">
        <span class="form-message"></span>
    </div>
    <button class="form-submit">Đổi mật khẩu</button>
</form>
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
</div>

</body>
</html>
