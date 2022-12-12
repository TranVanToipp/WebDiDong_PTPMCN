
<?php
session_start();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<script src= "../../Javascript/Toast_mes.js"></script>
    <link rel="stylesheet" href="/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/FE/Layout/css/style.css">
    <title>Đăng kí</title>
    
</head>
<body>
    <div class="main">

        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" class="form" id="form-1">
          <h3 class="heading">Đăng kí tài khoản</h3>
          <div class="spacer"></div>
      
          <div class="form-group">
            <label for="fullname" class="form-label">Họ và tên</label>
            <input id="fullname" name="fullname" required type="text" placeholder="VD: trantoi" class="form-control">
            <span class="form-message"></span>
          </div>
      
          <div class="form-group">
            <label for="email" class="form-label">Email</label>
            <input id="email" name="email" required type="email" placeholder="VD: email@domain.com" class="form-control">
            <span class="form-message"></span>
          </div>

          <div class="form-group">
            <label for="username" class="form-label">Tên tài khoản: </label>
            <input id="userName" name="userName" required type="text"  placeholder="Nhập tên tài khoản" class="form-control">
            <span class="form-message"></span>
          </div>
      
          <div class="form-group">
            <label for="password" class="form-label">Mật khẩu</label>
            <input id="password" name="password" required type="password" minlength="6" placeholder="Nhập mật khẩu" class="form-control">
            <span class="form-message"></span>
          </div>
      
          <div class="form-group">
            <label for="password_confirmation" class="form-label">Nhập lại mật khẩu</label>
            <input id="password_confirmation" name="password_confirmation" placeholder="Nhập lại mật khẩu" minlength="6" required type="password" class="form-control">
            <span class="form-message"></span>
          </div>
          <div class="form-dangki">
        <a href="/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/authen/login/index.php" class="form-dangki-link">Đăng nhập tài khoản</a>
    </div>
          <button class="form-submit" type="submit">Đăng ký</button>
        </form>
      <script>
            function showErrorToast() {
                toast({
                    title: "Thất bại!",
                    message: "Đăng kí không thành công. Vui lòng kiểm tra lại!",
                    type: "error",
                    duration: 5000
                });
            }
        </script>
		<script src= "../../Javascript/Toast_mes.js"></script>
      </div>

       <?php
			if(isset($_POST['fullname']) && isset($_POST['userName']) && isset($_POST['password']) && isset($_POST['email']) && isset($_POST['password_confirmation'])){
				$url = "http://localhost/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/PHPREST/api/user/read_user.php";
				$json=file_get_contents($url);
				$data = json_decode($json);
				if(isset($data->message)){
					if($_POST['password'] == $_POST['password_confirmation']){
						$_SESSION['fullname'] = $_POST['fullname'];
						$_SESSION['email'] = $_POST['email'];
						$_SESSION['userName'] = $_POST['userName'];
						$_SESSION['password'] = $_POST['password'];
						header('Location:../../../../../../WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/PHPREST/api/user/createUser.php');
					}else
						$msg = 'Mật Khẩu Không Khớp, vui lòng kiểm tra lại thông tin'; 
				}else{
					foreach($data->data as $user){
						if($user->userName == $_POST['userName'] && $user->email ==$_POST['email']){
							$msg = 'Tên Đăng Nhập hoặc email Đã Tồn Tại, vui lòng kiểm tra lại thông tin';
							die();
						}
					}
					if($_POST['password'] == $_POST['password_confirmation']){
						$_SESSION['fullname'] = $_POST['fullname'];
						$_SESSION['email'] = $_POST['email'];
						$_SESSION['userName'] = $_POST['userName'];
						$_SESSION['password'] = $_POST['password'];
						header('Location:../../../../../../WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/PHPREST/api/user/createUser.php');
					}else{
						echo '<script>showErrorToast();</script>';
					}
				}
				
			}
		?>
</body>
</html>