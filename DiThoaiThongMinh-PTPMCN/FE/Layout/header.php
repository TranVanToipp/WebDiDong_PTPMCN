<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Di Động Thông Minh</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link rel="stylesheet" href="./assets/css/slideshow.css">
    <link rel="stylesheet" href="./assets/css/base.css">
    <link rel="stylesheet" href="./assets/css/main.css">
    <link rel="stylesheet" href="./assets/css/grid.css">
    <link rel="stylesheet" href="./assets/css/responsive.css">
    <link rel="stylesheet" href="./font/fontawesome-free-6.1.2-web/css/all.min.css">
    
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,300;0,400;0,500;1,700&display=swap" rel="stylesheet"> 
</head>

<body>
    <div class="main">
        <header class="header">
            <div class="grid wide">
                <div class="header__navbar">
                    <div class="header__navbar-item header__navbar-logo">
                        <a href="" class="header__navbar-home-link">
                            <img src="./assets/img/logo.svg" alt="Hình ảnh logo home" class="header__navbar-logo-img">
                            <img src="./assets/img/responsive/logo_1648529142.svg" alt="Hình ảnh logo home" class="header__navbar-logoresponsive-img">
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
                            <img src="./assets/img/call.svg" alt="" class="header__navbar-menu-img">
                            <div class="header__navbar-menu-right header__navbar-call">
                                <span>Gọi mua hàng</span>
                                <span>0392518760</span>
                            </div>
                        </a>
                        <!-- Tìm cữa hàng bị bỏ đi -->
                        <!-- <a href="" class="header__navbar-menu-link header__navbar-item-address">
                            <img src="./assets/img/map.svg" alt="" class="header__navbar-menu-img">
                            <div class="header__navbar-menu-right header__navbar-address-find">
                                <span>Tìm cữa hàng</span>
                                <span>Gần bạn</span>
                            </div>
                        </a> -->
                        <div href="" class="header__navbar-menu-link header__navbar-item-cart header__navbar-item-hover header__navbar-item-click">
                            <img src="./assets/img/cart.svg" alt="" class="header__navbar-menu-img">
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
                            <img src="./assets/img/responsive/menu_mb.svg" alt="menu responsive mobile tablet" class="header__navbar-cart-menu-img">
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
                                <img src="./assets/img/navbar-hos/phone_1635241065.png" class="header__navbar-bot-img" alt="Điện thoại">
                                <span> Điện thoại</span>
                                </li>
                            <li class="header__navbar-bot-item">
                                <img src="./assets/img/navbar-hos/maytinhbang_1635241194.png" class="header__navbar-bot-img" alt="Máy tính bảng">

                                <span> Máy tính bản</span>
                            </li>
                            <li class="header__navbar-bot-item">
                                <img src="./assets/img/navbar-hos/latop_1635241226.png" class="header__navbar-bot-img" alt="Láp top">
                                <span> Láp top</span>
                            </li>
                            <li class="header__navbar-bot-item">
                                <img src="./assets/img/navbar-hos/tainghe_1635241251.png" class="header__navbar-bot-img" alt="Âm thanh">
                                <span>Âm thanh</span>
                            </li>
                            <li class="header__navbar-bot-item">
                                <img src="./assets/img/navbar-hos/phukien_1635241134.png" class="header__navbar-bot-img" alt="Phụ kiện">
                                <span> Phụ kiện</span>
                            </li>
                            <li class="header__navbar-bot-item">
                                <img src="./assets/img/navbar-hos/hang-cu.svg" class="header__navbar-bot-img" alt="Hàng cũ">
                                <span>Hàng cũ</span>
                            </li>
                            <li class="header__navbar-bot-item">
                                <img src="./assets/img/navbar-hos/dongho_1635241283.png" class="header__navbar-bot-img" alt="Thu cũ">
                                <span>Thu cũ</span>
                            </li>
                            <li class="header__navbar-bot-item">
                                <img src="./assets/img/navbar-hos/icon-thu-cu-3.svg" class="header__navbar-bot-img" alt="Smartwatch">
                                <span>Smartwatch</span>
                            </li>
                            <li class="header__navbar-bot-item">
                                <img src="./assets/img/navbar-hos/home_1635241313.png" class="header__navbar-bot-img" alt="SmartHome">
                                <span>SmartHome</span>
                            </li>
                            <li class="header__navbar-bot-item">
                                <img src="./assets/img/navbar-hos/new_1635241418.png" class="header__navbar-bot-img" alt="Tin công nghệ">
                                <span>Tin công nghệ</span>
                            </li>
                        </ul>
                    </div>
                </div>  
            </div>
            <div class="grid wide">
                <div class="grid-row-1">
                    <div class="grid-column-8">
                        <div class="header__slide">
                            <div class="header__slide-show">
                                <div class="header__slide-inner active">
                                    <img src="./assets/img/quangcao-header/quangcao1.webp" alt="" class="header__slide-img-show">
                                </div>
                                <div class="header__slide-inner ">
                                    <img src="./assets/img/quangcao-header/quangcao-2.webp" alt="" class="header__slide-img-show">
                                </div>
                                <div class="header__slide-inner">
                                    <img src="./assets/img/quangcao-header/quangcao3.webp" alt="" class="header__slide-img-show">
                                </div>

                                <div class="header__slide-inner ">
                                    <img src="./assets/img/quangcao-header/quangcao-4.webp" alt="" class="header__slide-img-show">
                                </div>
                                <div class="header__slide-inner">
                                    <img src="./assets/img/quangcao-header/quangcao-5.webp" alt="" class="header__slide-img-show">
                                </div>
                                <ul class="header__slide-list">
                                    <li class="header__slide-item">
                                        <div class="tab-item">Trải nghiệm Galaxy Z</div>
                                    </li>
                                    <li class="header__slide-item">
                                        <div class="tab-item">
                                            Đặt Galaxy Z Fold4
                                        </div>
                                    </li>
                                    <li class="header__slide-item">
                                        <div class="tab-item">
                                            iPhone 11
                                        </div>
                                    </li>
                                    <li class="header__slide-item">
                                        <div class="tab-item">
                                            Xả kho
                                        </div>
                                    </li>
                                    <li class="header__slide-item">
                                        <div class="tab-item">
                                            Redmi Note 11
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="grid-column-4">
                        <div class="header__slide-right">
                            <img src="./assets/img/quangcao-header/right-1.webp" alt="" class="header__slide-right-img">
                            <img src="./assets/img/quangcao-header/right-2.webp" alt="" class="header__slide-right-img">
                        </div>
                    </div>
                </div>
            </div> 

            <div class="grid wide">
                <div class="header__advertise">
                    <img src="./assets/img/quangcao-2/banner-dai_1652116489.webp" alt="">
                </div>
                <!-- Slide show products-sale -->
                <div class="product_box-slide ">
                    <div class="product_box-slide-heading">
                        <div class="product_box-slide-img">
                            <img src="./assets/img/slide_product/l_bgr.svg" alt="" class="product_box-slide-img-left">
                        </div>
                        <h2 class="title_sale-product">
                            săn sale giá sốc mỗi ngày 
                        </h2>
                        <div class="product_box-slide-img">
                            <img src="./assets/img/slide_product/r_bgr.svg" alt="" class="product_box-slide-img-right">
                        </div>
                    </div>
                    <div class="box-sale-products-content">
                        <div class="box-sale-products-item">
                        <div class="col l-2 m-4 c-6">
                            <div class="home-product-item">
                                <div class="home-product-item-img" style="background-image:url(./assets/img/iphone22.jpg);"></div>
                                <h4 class="home-product-item-name">Điện thoại thông minh sắp ra mắt</h4>
                                <div class="home-product-item-price">
                                    <span class="home-product-item__price-current">12.000.000Đ</span>
                                    <span class="home-product-item__price-old">12.000.000Đ</span>
                                </div>
                                <div class="home-product-item__sale-off">
                                    <span class="home-product-item__sale-off-percent">20%</span>
                                </div>
                                <div class="sale-time">
                                    <div class="sale_time-down">
                                        <span class="icon-sale">
                                            <img src="./assets/img/sale-time/clock_active.svg" alt="">
                                        </span>
                                        <div class="sale_time-down-content">
                                            <span class="sale_time-down-itemday">
                                                <b>0d</b>
                                            </span>
                                            <span class="sale_time-down-itemhours">
                                                <b>2h</b>
                                            </span>
                                            <span class="sale_time-down-itemminute">
                                                <b>23m</b>
                                            </span>
                                            <span class="sale_time-down-itemsecond">
                                                <b>29s</b>
                                            </span>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="box-sale-next">
                            <div class="box-sale-next-left">

                            </div>
                        <div class="box-sale-next-right">
                            
                        </div>
                    </div>
                        </div>
                    </div>
                    
                </div>
                
                <!-- render Loại sản phẩm -->
                
                <!-- Render sản phẩm -->
                    <?php
                        include_once './ProductSP/render.php';
                    ?>
                    
                </div>

            <div class="home-phantrang">
                
            </div>
            
        </div>

         
     <!-- Phần footer Web -->
        
    </div>
        <!-- MODAL MENU -->
    <div class="grid wide">
        <div class="modal ">
            <div class="form-active">
                <div class="form-active-div">
                    <i class="form-active-close fa-solid fa-xmark"></i>
                </div>
                <h3>Product điện thoại</h3>
                <div class="form-active-div">
                    <h5 class="form-active-lable" style="font-size: 1.3rem; margin-right: 10px;">ID</h5>
                    <input type="text" style="width: 400px; height: 30px;" name="form-input-ID" id="">
                </div>
                <div class="form-active-div">
                    <h5 class="form-active-lable" style="font-size: 1.3rem; margin-right: 10px; ">Image</h5>
                    <input type="text" style="width: 400px; height: 30px;" name="form-input-IMAGE" id="">
                </div>
                <div class="form-active-div">
                    <h5 class="form-active-lable" style="font-size: 1.3rem; margin-right: 10px; ">Name</h5>
                    <input type="text" style="width: 400px; height: 30px;" name="form-input-NAME" id="">
                </div>
                <div class="form-active-div">
                    <h5 class="form-active-lable" style="font-size: 1.3rem; margin-right: 10px; ">Price</h5>
                    <input type="text" style="width: 400px; height: 30px;" name="form-input-PRICE" id="">
                </div>
                <div class="form-active-div">
                    <h5 class="form-active-lable" style="font-size: 1.3rem; margin-right: 10px; ">PriceOld</h5>
                    <input type="text" style="width: 400px; height: 30px;" name="form-input-Price_OLD" id="">
                </div>
                <div class="form-active-div">
                    <h5 class="form-active-lable" style="font-size: 1.3rem; margin-right: 10px; ">percent</h5>
                    <input type="text" style="width: 400px; height: 30px;" name="form-input-PERCENT" id=""> 
                </div>

                <div class="form-active-div">
                    <button type="submit" class="form-active-div-delete">Create</button>
                    <button type="submit" class="form-active-div-update">Update</button>
                    <button type="submit">Thêm</button>
                </div>
                
            </div>
        </div>
    </div>
    <div class="over-lay"></div>
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
        <div class="modal-chitiet">
            
            <!-- Render chi tiết sản phẩm -->
            
        </div>
    </div>
    <script src="./Javascript/search.js"></script>
    <!-- <script src="./Javascript/slide.js"></script>

    <script src="./Javascript/index.js"></script>

    <script src="./Javascript/blockform.js"></script> -->
</body>
</html>
