<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Di Động Thông Minh</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/FE/Layout/css/slideshow.css">
    <link rel="stylesheet" href="/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/FE/Layout/css/base.css">
    <link rel="stylesheet" href="/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/FE/Layout/css/main.css">
    <link rel="stylesheet" href="/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/FE/Layout/css/grid.css">
    <link rel="stylesheet" href="/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/FE/Layout/css/responsive.css">
    <link rel="stylesheet" href="../font/fontawesome-free-6.1.2-web/css/all.min.css">
    
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
                        <div class="header__search">
                            <div class="header__search-input-wrap">
                                <input type="text" name="searchInput" oninput="getProduct()" class="header__searh-input" placeholder="Bạn tìm gì...">

                            </div>
                            <a href="./search" class="header__search-btn">
                                nấm
                                <i class="header__search-btn-icon fa-solid fa-magnifying-glass"></i>
                            </a>
                            

                        </div>
                    </div>
                    <div class="header__navbar-item header__navbar-rightmenu">
                        <a href="" class="header__navbar-menu-link header__navbar-item-hotline">
                            <img src="../assets/img/call.svg" alt="" class="header__navbar-menu-img">
                            <div class="header__navbar-menu-right header__navbar-call">
                                <span>Gọi mua hàng</span>
                                <span>0392518760</span>
                            </div>
                        </a>
                        <!-- Tìm cữa hàng bị bỏ đi -->
                        <!-- <a href="" class="header__navbar-menu-link header__navbar-item-address">
                            <img src="../assets/img/map.svg" alt="" class="header__navbar-menu-img">
                            <div class="header__navbar-menu-right header__navbar-address-find">
                                <span>Tìm cữa hàng</span>
                                <span>Gần bạn</span>
                            </div>
                        </a> -->
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
                                <a href="#" class="header__navbar-item-fullName-link header__navbar-item-lore-shared-hover"></a>
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
            <!-- <div class="grid wide">
                    <div class="header__navbar-header-fill">
                        <div class="header__navbar-header-fill-home">
                            <a href="" class="header__navbar-fill-link">
                                <span>Trang chủ</span>
                            </a>
                        </div>
                        <div class="header__navbar-fill-angle">
                            <i class="fa-solid fa-angles-right"></i>
                        </div>
                        <div class="header__navbar-header-fill-home">
                            <a href="" class="header__navbar-fill-link">
                                <span>Điện thoại</span>
                            </a>
                        </div>
                    </div>
                    <div class="header__navbar-title">
                         <h1 class="header__navbar-title-heading">
                            Điện thoại tại Di Động Thông Minh
                         </h1>
                         <span class="header__navbar-title-number">
                             -359 sản phẩm
                        </span>
                    </div>
            </div> -->
              
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
    <div class="grid wide">
                <!-- render Loại sản phẩm -->
                
                <!-- Render sản phẩm -->
                <?php
    $type = $_GET["product_type"];
    $page = $_GET["page"];
    $url_type = "http://localhost/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/PHPREST/api/product/read_type.php";
    $json_type = file_get_contents($url_type);
    $data_type = json_decode($json_type);
    foreach($data_type->data as $product_type){
        if($product_type->product_type == $type){
            $type_name = $product_type->product_type_name;
        }
    }
            echo '
            <div class="header__nav-tab" > 
                <div class= "header__nav-tab-icon">
                    <img src="../assets/img/quangcao-containner/dienthoai_1637814357.svg" alt="" class="header__nav-tab-img">
                    <div class="header__nav-tab-vac">
                        <span>'.$type_name.'</span>
                    </div>
                </div>
            </div>';
            $url_product = "http://localhost/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/PHPREST/api/page_product/page.php?page=$page&product_type=$type";
            $json_product=file_get_contents($url_product);
            $data_product = json_decode($json_product);
            echo '<div class="home-product">
                    <div class="grid-row">';
            foreach($data_product->data as $product_item){
                $max_page = $product_item->max_page;
                echo '<div class="col l-2 m-4 c-6" >
                        <div class="home-product-item">
                                <div class="home-product-item-img" style="background-image:url(${item.img});"></div>
                                <h4 class="home-product-item-name">'.$product_item->title.'</h4>
                            <div class="home-product-item-price">
                                <span class="home-product-item__price-current">'.$product_item->price.'</span>
                                <span class="home-product-item__price-old">'.$product_item->discount.'</span>
                            </div>
                            <div class="home-product-item__sale-off">
                                <span class="home-product-item__sale-off-percent">'.$product_item->discount.'</span>
                            </div>
                        </div>
                    </div>';
            }   
            echo '</div>
                </div>';
			if($max_page>1){
				echo '
					<div class="home-phantrang">
						<ul class="home-phantrang--list">';
					if($page>1){
						$prev_page = $page-1;
						echo 
						'<a href="index.php?page='.$prev_page.'&product_type='.$type.'"<li class="home-phantrang--item"> << </li></a>';
					}
					$part = 1;
					$begin = $page - $part;
					if($begin <1){
						$begin = 1;
					}
					$end = $page + $part;
					if($end>$max_page){
						$end = $max_page;
					}
					for($page_item = $begin; $page_item <= $end; $page_item++){
						echo
							'<a href="index.php?page='.$page_item.'&product_type='.$type.'" class="home-phantrang--itemlink"> <li class="home-phantrang--item">'.$page_item.'</li></a>';
					}
					if($page<$max_page){
						$next_page = $page+1;
						echo
							'<a href="index.php?page='.$next_page.'&product_type='.$type.'" class="home-phantrang--itemlink"> <li class="home-phantrang--item"> >> </li></a>';
					}
					echo'
					</ul>
				</div>';
			}
            
    ?>
        </div>
        <div class="home-phantrang">
            
        </div>
    </div>
</body>
</html>







