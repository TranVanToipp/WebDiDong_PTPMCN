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
    <link rel="stylesheet" href="../../../../WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/FE/Layout/css/responsive.css">
    <link rel="stylesheet" href="../../../../WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/FE/Layout/css/grid.css">
    <link rel="stylesheet" href="/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/FE/Layout/css/toast.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" integrity="sha512-+4zCK9k+qNFUR5X+cKL9EIR+ZOhtIloNl9GIKS57V1MyNsYpYcUrUeQc9vNfzsWfV28IaLL3i96P9sdNyeRssA==" crossorigin="anonymous" />

    <title>Đăng nhập</title>
</head>

<!-- <script src="../../Javascript/user.js">

</script> -->
<body>
<div class="main">
<div id="toast"></div>
  <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST" class="form l-12 c-12" id="form-1">
      <h3 class="heading">Đăng nhập tài khoản</h3>
       <div class="spacer"></div>

    <div class="form-group c-12 ">
        <label for="fullname" class="form-label">Tên tài khoản: </label>
        <input id="username" name="userName" type="text" required placeholder="VD: trantoi" class="form-control">
        <span class="form-message"></span>
    </div>

    <div class="form-group c-12">
        <label for="password" class="form-label">Nhập mật khẩu: </label>
        <input id="password" name="password" required type="password" minlength="6"  class="form-control">
        <span class="form-message"></span>
    </div>
    <div class="form-dangki c-12">
        <a href="/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/authen/register/index.php" class="form-dangki-link">Đăng kí tài khoản</a>
    </div>
    <button type="submit" class="form-submit">Đăng nhập</button>
  </form>
  <script>
    function showErrorToast() {
        toast({
            title: "Thất bại!",
            message: "Tài khoản hoặc mật khẩu sai. Vui lòng kiểm tra lại!",
            type: "error",
            duration: 5000
        });
    }
</script>
<script src= "../../Javascript/Toast_mes.js"></script>
  <?php
        if(isset($_POST['userName']) && isset($_POST['password'])){
            $url = "http://localhost/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/PHPREST/api/user/read_user.php";
            $json=file_get_contents($url);
            $data = json_decode($json);
            $username = $_POST['userName'];
            $pass= md5($_POST['password']);
            foreach($data->data as $user){
              if($username == $user->userName && $pass == $user->password){
                    $_SESSION['role_id'] = $user->role_id;
                    $_SESSION['fullname'] = $user->fullname;
                    $_SESSION['id'] = $user->id;
                    header('Location:../../../../../../WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN');
                }
            }
            
            echo '<script>showErrorToast();</script>';
        }
		else echo '<script>showErrorToast();</script>';
		?>

</div>

</body>
</html>
