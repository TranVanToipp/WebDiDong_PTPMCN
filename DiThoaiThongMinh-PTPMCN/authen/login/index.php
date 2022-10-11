<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../../../WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/FE/Layout/css/style.css">
    <title>Đăng nhập</title>
</head>
<!-- <script src="../../Javascript/user.js">

</script> -->
<body>
<div class="main">

  <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" class="form" id="form-1">
      <h3 class="heading">Đăng nhập tài khoản</h3>
       <div class="spacer"></div>

    <div class="form-group">
        <label for="fullname" class="form-label">Tên tài khoản: </label>
        <input id="username" name="userName" type="text" required placeholder="VD: trantoi" class="form-control">
        <span class="form-message"></span>
    </div>

    <div class="form-group">
        <label for="password" class="form-label">Nhập mật khẩu: </label>
        <input id="password" name="password" required type="password" minlength="6"  class="form-control">
        <span class="form-message"></span>
    </div>
    <button type="submit" class="form-submit">Đăng nhập</button>
  </form>
  <?php
        if(isset($_POST['userName']) && isset($_POST['password'])){
            $url = "http://localhost/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/PHPREST/api/user/read_user.php";
            $json=file_get_contents($url);
            $data = json_decode($json);
            $username = $_POST['userName'];
            $pass= md5($_POST['password']);
            foreach($data->data as $user){
              if($username == $user->userName && $pass == $user->password){
                    $_SESSION['fullname'] = $user->fullname;
                    header('Location:../../../../../../WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN');
                }
            }
            echo "tài khoản or mật khẩu không đúng";
        }
		?>
</div>

</body>
</html>
