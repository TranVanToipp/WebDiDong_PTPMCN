<?php
    ob_start();
    session_start();
    $baseURL = '';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Di Động Thông Minh</title>
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css"> -->
    <link rel="stylesheet" href="/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/FE/Layout/css/base.css">
    <link rel="stylesheet" href="/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/FE/Layout/css/main.css">
    <link rel="stylesheet" href="/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/FE/Layout/css/grid.css">
    <link rel="stylesheet" href="/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/FE/Layout/css/responsive.css">
    <!-- <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/> -->
    <link rel="stylesheet" href="/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN//font/fontawesome-free-6.1.2-web/css/all.min.css">
    <!-- <link rel="icon" href="https://tonycongmmo.com/wp-content/uploads/2020/09/cropped-landingpage-clean-studio-logo-4-flatsome-theme-uxbuilder-32x32.png" sizes="32x32" />
    <link rel="icon" href="https://tonycongmmo.com/wp-content/uploads/2020/09/cropped-landingpage-clean-studio-logo-4-flatsome-theme-uxbuilder-192x192.png" sizes="192x192" /> -->
    <!-- <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;1,700&display=swap" rel="stylesheet">  -->
</head>

<body>
    <div class="main">
        <header class="header">
            <div class="grid wide">
                <div class="header__navbar">
                    <div class="header__navbar-item header__navbar-logo">
                        <a href="/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN" class="header__navbar-home-link">
                            <img src="/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/assets/img/logo.svg" alt="Hình ảnh logo home" class="header__navbar-logo-img">
                            <img src="/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/assets/img/responsive/logo_1648529142.svg" alt="Hình ảnh logo home" class="header__navbar-logoresponsive-img">
                        </a>
                    </div>
                    <div class="header__navbar-item header__navbar-address">
                        <button class="header__navbar-city">
                            <span class="header__navbar-city-click-span"> Xem giá, tồn kho tại: </span>
                            <span class="header__navbar-city-click">
                                Hà nội
                                <i class="fa-solid fa-angle-down"></i>
                            </span>
                        </button>
                        <!-- address none -->
                        <div class="header__navbar-city-address">
                            <p class="header__navbar-city-heading">
                                Chọn tỉnh thành để xem chính xác giá và khuyến mãi
                            </p>
                            <ul class="header__navbar-city-list">
                                <li class="a">Hà Nội</li>
                                <li class="a">Đà Nẵng</li>
                                <li class="a">TP HCM</li>
                                <li class="a">Thái Nguyên</li>
                                <li class="a">Hải Phòng</li>
                                <li class="a">Hải Dương</li>
                            </ul>
                        </div>
                        <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
                            <div class="header__search">
                                <div class="header__search-input-wrap">
                                    <input type="text" name="searchInput"  class="header__search-input" placeholder="Bạn tìm gì...">
                                </div>
                                <input type="submit" id ="searchbt_simple" name="ok" value ="Search"/>
                                <!-- <i class="header__search-btn-icon fa-solid fa-magnifying-glass"></i> -->
                                <!-- <input href="" type="submit" name="ok"  class="header__search-btn">
										<i class="header__search-btn-icon fa-solid fa-magnifying-glass"></i>
								</input> -->
                            </div>
                        </form>
                        <?php
                        if(isset($_POST['searchInput'])){
                            header('Location:./search/index.php?search='.$_POST['searchInput']); 
                        }
                        ?>
                    </div>
                    <div class="header__navbar-item header__navbar-rightmenu">
                        <a href="" class="header__navbar-menu-link header__navbar-item-hotline">
                            <img src="/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/assets/img/call.svg" alt="" class="header__navbar-menu-img">
                            <div class="header__navbar-menu-right header__navbar-call">
                                <span>Gọi mua hàng</span>
                                <span>0392518760</span>
                            </div>
                        </a>
                        <!-- Tìm cữa hàng bị bỏ đi -->
                        <!-- <a href="" class="header__navbar-menu-link header__navbar-item-address">
                            <img src="/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/assets/img/map.svg" alt="" class="header__navbar-menu-img">
                            <div class="header__navbar-menu-right header__navbar-address-find">
                                <span>Tìm cữa hàng</span>
                                <span>Gần bạn</span>
                            </div>
                        </a> -->
                        <a href="../../../../../WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/cart/index.php" class="header__navbar-menu-link header__navbar-item-cart header__navbar-item-hover header__navbar-item-click">
                            <img src="/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/assets/img/cart.svg" alt="" class="header__navbar-menu-img">
                            <div class="header__navbar-menu-right header__navbar-cart-basket ">
                                <span>Giỏ hàng</span>
                                <span class="header__navbar-number-cart">
                                    <?php
                                    if(isset($_SESSION['cart'])){
                                        $sum = count($_SESSION['cart']) ;
                                        echo $sum;
                                    }else{
                                            echo 0;
                                        }
                                    ?>
                                </span>
                            </div>

                            <!-- LIST -->
                            <ul class="header__navbar-cart-list">
                                <h4>Sản phẩm mới thêm</h4>
                                <?php
                                $total_money=0;
                                if (isset($_SESSION['cart'])) {
                                    if (count($_SESSION['cart'])>0){
                                            $i = 0;
                                            foreach ($_SESSION['cart'] as $sanpham) {
                                                $total_money = $total_money + ($sanpham[2]-$sanpham[2]*$sanpham[3]);
                                                echo '
                                                    <li class="header__navbar-cart-item">
                                                        <div class="header__navbar-cart-img">
                                                            <img src="'.$sanpham[0].'" alt="Hình sản phẩm" class="header__navbar-cart-img-link">
                                                        </div>
                                                        <div class="header__navbar-cart-name">
                                                        '.$sanpham[1].'
                                                        </div>
                                                        
                                                        <div class="header__navbar-cart-price">
                                                            '.$sanpham[2].'
                                                        </div>
                                                    </li>
                                                ';
                                                $i++;
                                            }
                                        }
                                    }
                                ?>
                                <span class="header__navbar-cart-list-span">
                                    Tổng tiền: <?php echo $total_money;?>
                                </span>
                                <sup>đ</sup>
                            </ul>
                        </a>
                        <div class="header__navbar-cart-menu">
                            <img src="/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/assets/img/responsive/menu_mb.svg" alt="menu responsive mobile tablet" class="header__navbar-cart-menu-img">
                        </div>
                        <div class="header__navbar-item-lore-shared header__navbar-item-lore-shared-hover">
                            <?php 
                                if(isset($_SESSION['fullname']) && isset($_SESSION['id'])) {
                                    echo '
                                        <a href="#" class="header__navbar-item-fullName-link">'.$_SESSION['fullname'].'</a>
                                        <div class="header__navbar-item-box-user">
                                            <ul class="header__navbar-item-box-user-list">
                                                <li class="header__navbar-item-box-user-item"><a href="../../../../../WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/authen/forget/index.php" >Thông tin tài khoản</a></li>
                                                <li class="header__navbar-item-box-user-item"> <a href="../../../../../WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/authen/forget/index.php">Đổi mật khẩu</a></li>
                                                <li class="header__navbar-item-box-user-item"><a href="'.$baseURL.'authen/logout/index.php" >Đăng xuất</a></li>';
                                                if(isset($_SESSION['role_id'])){
                                                    if($_SESSION['role_id'] == 1){
                                                        echo '<li class="header__navbar-item-box-user-item"><a href="'.$baseURL.'admin/" >Admin</a></li>';
                                                    }
                                                }
                                                echo '
                                            </ul>
                                        </div>
                                    ';
                                 } 
                                 else {
                                    echo '
                                    <a href="../../../../../WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/authen/login/index.php" class="header__navbar-item-login-link header__navbar-item-lore">Đăng nhập</a>
                            
                                    <a href="../../../../../WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/authen/register/index.php" class="header__navbar-item-register-link header__navbar-item-lore">Đăng kí</a>
                                    ';
                                }
                            ?>
                        </div>
                    </div>  
                </div>
            </div>
        </header>   
        <div class="container">
            <div class="header__navbar-bot">
                <div class="grid wide">
                    <div class="header__navbar-bot-container">
                        <ul class="header__navbar-bot-list">
                            <li class="header__navbar-bot-item">
                                <img src="/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/assets/img/navbar-hos/phone_1635241065.png" class="header__navbar-bot-img" alt="Điện thoại">
                                <span> Điện thoại</span>
                                </li>
                            <li class="header__navbar-bot-item">
                                <img src="/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/assets/img/navbar-hos/maytinhbang_1635241194.png" class="header__navbar-bot-img" alt="Máy tính bảng">

                                <span> Máy tính bản</span>
                            </li>
                            <li class="header__navbar-bot-item">
                                <img src="/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/assets/img/navbar-hos/latop_1635241226.png" class="header__navbar-bot-img" alt="Láp top">
                                <span> Láp top</span>
                            </li>
                            <li class="header__navbar-bot-item">
                                <img src="/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/assets/img/navbar-hos/tainghe_1635241251.png" class="header__navbar-bot-img" alt="Âm thanh">
                                <span>Âm thanh</span>
                            </li>
                            <li class="header__navbar-bot-item">
                                <img src="/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/assets/img/navbar-hos/phukien_1635241134.png" class="header__navbar-bot-img" alt="Phụ kiện">
                                <span> Phụ kiện</span>
                            </li>
                            <li class="header__navbar-bot-item">
                                <img src="/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/assets/img/navbar-hos/hang-cu.svg" class="header__navbar-bot-img" alt="Hàng cũ">
                                <span>Hàng cũ</span>
                            </li>
                            <li class="header__navbar-bot-item">
                                <img src="/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/assets/img/navbar-hos/dongho_1635241283.png" class="header__navbar-bot-img" alt="Thu cũ">
                                <span>Thu cũ</span>
                            </li>
                            <li class="header__navbar-bot-item">
                                <img src="/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/assets/img/navbar-hos/icon-thu-cu-3.svg" class="header__navbar-bot-img" alt="Smartwatch">
                                <span>Smartwatch</span>
                            </li>
                            <li class="header__navbar-bot-item">
                                <img src="/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/assets/img/navbar-hos/home_1635241313.png" class="header__navbar-bot-img" alt="SmartHome">
                                <span>SmartHome</span>
                            </li>
                            <li class="header__navbar-bot-item">
                                <img src="/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/assets/img/navbar-hos/new_1635241418.png" class="header__navbar-bot-img" alt="Tin công nghệ">
                                <span>Tin công nghệ</span>
                            </li>
                        </ul>
                    </div>
                </div>  
            </div> 
     <!-- Phần footer Web -->
 <script src = "./Javascript/index.js"></script>       
    </div>
       
    
    <!-- Modal Mobile -->
    <nav class="nav-mobile">
        <div class="nav-mobile-header">
            <i class="nav-mobile-check-icon fa-regular fa-circle-xmark"></i>
        </div>
        <ul class="nav-mobile-list">
           <li>
                <a href="" class="nav-mobile-link">Trang chủ</a>
            </li>
            <li>
                <a href="" class="nav-mobile-link">Điện thoại</a>
            </li>
            <li>
                <a href="" class="nav-mobile-link">Máy tính bảng</a>
            </li>
            <li>
                <a href="" class="nav-mobile-link">Gọi mua hàng</a>
            </li>
            <li>
                <a href="" class="nav-mobile-link">Tìm cữa hàng</a>
            </li>
            <li>
                <a href="" class="nav-mobile-link">Giỏ hàng</a>
            </li>
        </ul>
    </nav>

    
