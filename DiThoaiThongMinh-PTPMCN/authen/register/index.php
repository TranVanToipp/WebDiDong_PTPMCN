<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <title>Đăng kí</title>
    
</head>
<body>
    <div class="main">

        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" class="form" id="form-1">
          <h3 class="heading">Đăng kí tài khoản</h3>
      
          <div class="spacer"></div>
      
          <div class="form-group">
            <label for="fullname" class="form-label">Tên tài khoản</label>
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
            <input id="password_confirmation" required name="password_confirmation" placeholder="Nhập lại mật khẩu" minlength="6" type="password" class="form-control">
            <span class="form-message"></span>
          </div>
      
          <button class="form-submit" type="submit">Đăng ký</button>
        </form>
      
      </div>

      <?php
			if(isset($_POST['fullname'])&&isset($_POST['userName'])&&isset($_POST['password'])&&isset($_POST['email'])){
				$fp = fopen('C:\\wamp23\\www\\WebDiDong_PTPMCN\\DiThoaiThongMinh-PTPMCN\\PHPREST\\api\\input.txt', 'w');
				fputs($fp,'{ '."\n");
				fputs($fp,'"fullname": "'.$_POST['fullname'].'",'."\n");
				fputs($fp,'"email": "'.$_POST['email'].'",'."\n");
				fputs($fp,'"phone_number": "",'."\n");
				fputs($fp,'"address": "",'."\n");
				fputs($fp,'"userName": "'.$_POST['userName'].'",'."\n");
				fputs($fp,'"password": "'.$_POST['password'].'"'."\n");
				fputs($fp,'}');
				fclose($fp);
				header('Location:../../../../WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/PHPREST/api/createUser.php');
			}
		?>
</body>
</html>