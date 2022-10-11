<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Di Động Thông Minh</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="../assets/css/slideshow.css">
    <link rel="stylesheet" href="../assets/css/base.css">
    <link rel="stylesheet" href="../assets/css/main.css">
    <link rel="stylesheet" href="../assets/css/grid.css">
    <link rel="stylesheet" href="../assets/css/responsive.css">
    <link rel="stylesheet" href="../assets/css/phantrang.css">
    <link rel="stylesheet" href="./font/fontawesome-free-6.1.2-web/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;1,700&display=swap" rel="stylesheet"> 
</head>

<body>
    <div class="main">
        <header class="header">
            <div class="grid wide">
                <div class="header__navbar">
                    <div class="header__navbar-item header__navbar-logo">
                        <a href="../" class="header__navbar-home-link">
                            <img src="../assets/img/logo.svg" alt="Hình ảnh logo home" class="header__navbar-logo-img">
                            <img src="../assets/img/responsive/logo_1648529142.svg" alt="Hình ảnh logo home" class="header__navbar-logoresponsive-img">
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
									<input type="text" name="search"  class="header__searh-input" placeholder="Bạn tìm gì...">
								</div>
									<input href="" type="submit" name="ok"  class="header__search-btn">
										<i class="header__search-btn-icon fa-solid fa-magnifying-glass"></i>
									</input>
							</div>
						</form>
                    </div>
                    <div class="header__navbar-item header__navbar-rightmenu">
                        <a href="" class="header__navbar-menu-link header__navbar-item-hotline">
                            <img src="../assets/img/call.svg" alt="" class="header__navbar-menu-img">
                            <div class="header__navbar-menu-right header__navbar-call">
                                <span>Gọi mua hàng</span>
                                <span>0392518760</span>
                            </div>
                        </a>
                        <div href="" class="header__navbar-menu-link header__navbar-item-cart header__navbar-item-hover header__navbar-item-click">
                            <img src="../assets/img/cart.svg" alt="" class="header__navbar-menu-img">
                            <div class="header__navbar-menu-right header__navbar-cart-basket ">
                                <span>Giỏ hàng</span>
                                <span class="header__navbar-number-cart">0</span>
                            </div>

                           
                            <!-- LIST -->
                            <ul class="header__navbar-cart-list">
                                <h4>Sản phẩm mới thêm</h4>
                                
                                <span class="header__navbar-cart-list-span">
                                    Tổng tiền: 0
                                </span>
                                <sup>đ</sup>
                            </ul>
                        </div>
                        <div class="header__navbar-cart-menu">
                            <img src="../assets/img/responsive/menu_mb.svg" alt="menu responsive mobile tablet" class="header__navbar-cart-menu-img">
                        </div>
                        <div class="header__navbar-item-lore-shared ">
                            
                                <a href="../../../../../WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/authen/login/index.php" class="header__navbar-item-login-link header__navbar-item-lore">Đăng nhập</a>
                            
                            
                                <a href="../../../../../WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/authen/change/index.php" class="header__navbar-item-register-link header__navbar-item-lore">Đăng kí</a>
                                <a href="#" class="header__navbar-item-fullName-link header__navbar-item-lore-shared-hover">Trần văn Tới</a>
                                <div class="header__navbar-item-box-user">
                                    <ul class="header__navbar-item-box-user-list">
                                        <li class="header__navbar-item-box-user-item"><a href="../../../../../WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/authen/forget/index.php" >Thông tin tài khoản</a></li>
                                        <li class="header__navbar-item-box-user-item"> <a href="../../../../../WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/authen/forget/index.php" >Đổi mật khẩu</a></li>
                                        <li class="header__navbar-item-box-user-item"><a href="../../../../../WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/authen/forget/index.php" >Đăng xuất</a></li>
                                    </ul>
                                </div>
                                
                           
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
                                <img src="../assets/img/navbar-hos/phone_1635241065.png" class="header__navbar-bot-img" alt="Điện thoại">
                                <span> Điện thoại</span>
                                </li>
                            <li class="header__navbar-bot-item">
                                <img src="../assets/img/navbar-hos/maytinhbang_1635241194.png" class="header__navbar-bot-img" alt="Máy tính bảng">

                                <span> Máy tính bản</span>
                            </li>
                            <li class="header__navbar-bot-item">
                                <img src="../assets/img/navbar-hos/latop_1635241226.png" class="header__navbar-bot-img" alt="Láp top">
                                <span> Láp top</span>
                            </li>
                            <li class="header__navbar-bot-item">
                                <img src="../assets/img/navbar-hos/tainghe_1635241251.png" class="header__navbar-bot-img" alt="Âm thanh">
                                <span>Âm thanh</span>
                            </li>
                            <li class="header__navbar-bot-item">
                                <img src="../assets/img/navbar-hos/phukien_1635241134.png" class="header__navbar-bot-img" alt="Phụ kiện">
                                <span> Phụ kiện</span>
                            </li>
                            <li class="header__navbar-bot-item">
                                <img src="../assets/img/navbar-hos/hang-cu.svg" class="header__navbar-bot-img" alt="Hàng cũ">
                                <span>Hàng cũ</span>
                            </li>
                            <li class="header__navbar-bot-item">
                                <img src="../assets/img/navbar-hos/dongho_1635241283.png" class="header__navbar-bot-img" alt="Thu cũ">
                                <span>Thu cũ</span>
                            </li>
                            <li class="header__navbar-bot-item">
                                <img src="../assets/img/navbar-hos/icon-thu-cu-3.svg" class="header__navbar-bot-img" alt="Smartwatch">
                                <span>Smartwatch</span>
                            </li>
                            <li class="header__navbar-bot-item">
                                <img src="../assets/img/navbar-hos/home_1635241313.png" class="header__navbar-bot-img" alt="SmartHome">
                                <span>SmartHome</span>
                            </li>
                            <li class="header__navbar-bot-item">
                                <img src="../assets/img/navbar-hos/new_1635241418.png" class="header__navbar-bot-img" alt="Tin công nghệ">
                                <span>Tin công nghệ</span>
                            </li>
                        </ul>
                    </div>
                </div>  
            </div> 
     <!-- Phần footer Web -->
        
    </div>
</body>
</html>
<?php
if(isset($_GET['search']) || isset($_POST['search'])){
	if(isset($_POST['search'])){
		$search = $_POST['search'];
	}
	if(isset($_GET['search'])){
		$search = $_GET['search'];
	}
	$url_title = "http://localhost/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/PHPREST/api/search/search.php?title=".$search;
	$json_title = file_get_contents($url_title);
	$data_title = json_decode($json_title);
	if(isset($data_title->message)){
		echo "không tôn tại sản phẩm ".$search;
	}
	else {
		foreach($data_title->data as $title){
			echo '<div class="col l-2 m-4 c-6" >
				<div class="home-product-item">
						<div class="home-product-item-img" style="background-image:url(${item.img});"></div>
						<h4 class="home-product-item-name">'.$title->title.'</h4>
					<div class="home-product-item-price">
						<span class="home-product-item__price-current">'.$title->price.'</span>
						<span class="home-product-item__price-old">'.$title->discount.'</span>
					</div>
					<div class="home-product-item__sale-off">
						<span class="home-product-item__sale-off-percent">'.$title->discount.'</span>
					</div>
				</div>
			</div>';
		}
	}
}
?>






