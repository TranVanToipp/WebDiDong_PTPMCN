<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Di Động Thông Minh</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <!-- <link rel="stylesheet" href="../FE/Layout/css/slideshow.css"> -->
    <link rel="stylesheet" href="../FE/Layout/css/base.css">
    <link rel="stylesheet" href="../FE/Layout/css/main.css">
    <link rel="stylesheet" href="../FE/Layout/css/grid.css">
    <link rel="stylesheet" href="../FE/Layout/css/responsive.css">
    <!-- <link rel="stylesheet" href="../FE/Layout/css/phantrang.css"> -->
    <!-- <link rel="stylesheet" href="./font/fontawesome-free-6.1.2-web/css/all.min.css"> -->
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
									<input type="text" name="search"  class="header__search-input" placeholder="Bạn tìm gì...">
								</div>
                                <input type="submit" id ="searchbt_simple" name="ok" value ="Search"/>
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
                        <div class="header__navbar-item-lore-shared header__navbar-item-lore-shared-hover">
                        <?php 
                            if(isset($_SESSION['fullname']) && isset($_SESSION['id'])) {
                                echo '
                                    <a href="#" class="header__navbar-item-fullName-link">'.$_SESSION['fullname'].'</a>
                                    <div class="header__navbar-item-box-user">
                                        <ul class="header__navbar-item-box-user-list">
                                            <li class="header__navbar-item-box-user-item"><a href="../../../../../WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/authen/forget/index.php" >Thông tin tài khoản</a></li>
                                            <li class="header__navbar-item-box-user-item"> <a href="../../../../../WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/authen/forget/index.php" >Đổi mật khẩu</a></li>
                                            <li class="header__navbar-item-box-user-item"><a href="'.$baseURL.'authen/logout/index.php" >Đăng xuất</a></li>
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
    <div class="grid wide">
        <div class="timkiem-nhieu">
            <div class="timkiem-3loai">
                <div class="timkiem-field__loc field_filter filterAll open">
                    <button class="dropdown-field__btn">
                        <img src="../assets/img/filter.svg" alt="" class="dropdown-field__btn--img">
                        Bộ lọc
                    </button>
                    <div class="open-drowdown-loc dropdown-menu__loc">
                        <button class="close-all-btn">
                            x
                        </button>
                        <div class="filter_content">
                            <div class="filter-exist">
                                <p class="filter-exist__title">
                                    Đã chọn
                                </p>
                                <div class="SPChon list-filter-exist">
                                    
                                </div>
                            </div>
                            <div class="filter-origin__danhmuc">
                                <p class="filter-origin__danhmuc--title">
                                    Danh mục
                                </p>
                                
                                    <lable class="checkbox-danhmuc">
                                        <input type="checkbox" onchange = "chonDanhHieu()" name="" id="">
                                        <span class="checkmark--danhmuc thuonghieu">
                                            <img src="../assets/img/iphone-1_1643084305.svg" alt="" class="checkmark--danhmuc__img">
                                        </span>
                                    </lable>
                                
                                
                                    <lable class="checkbox-danhmuc">
                                        <input type="checkbox" onchange = "chonDanhHieu()" name="" id="">
                                        <span class="checkmark--danhmuc thuonghieu">
                                            <img src="../assets/img/iphone-1_1643084305.svg" alt="" class="checkmark--danhmuc__img">
                                        </span>
                                    </lable>
                                
                                
                                    <lable class="checkbox-danhmuc">
                                        <input type="checkbox" onchange = "chonDanhHieu()" name="" id="">
                                        <span class="checkmark--danhmuc thuonghieu">
                                            <img src="../assets/img/oppo_1656947519.svg" alt="" class="checkmark--danhmuc__img">
                                        </span>
                                    </lable>
                                
                                
                                    <lable class="checkbox-danhmuc">
                                        <input type="checkbox" onchange = "chonDanhHieu()" name="" id="">
                                        <span class="checkmark--danhmuc thuonghieu">
                                            <img src="../assets/img/realme_1656947387.svg" alt="" class="checkmark--danhmuc__img">
                                        </span>
                                    </lable>
                                
                                
                                    <lable class="checkbox-danhmuc">
                                        <input type="checkbox" onchange = "chonDanhHieu()" name="" id="">
                                        <span class="checkmark--danhmuc thuonghieu">
                                            <img src="../assets/img/samsung_1656946754.svg" alt="" class="checkmark--danhmuc__img">
                                        </span>
                                    </lable>
                                    <lable class="checkbox-danhmuc">
                                        <input type="checkbox" onchange = "chonDanhHieu()" name="" id="">
                                        <span class="checkmark--danhmuc thuonghieu">
                                            <img src="../assets/img/vsmart_1656947633.svg" alt="" class="checkmark--danhmuc__img">
                                        </span>
                                    </lable>
                                
                                
                                    <lable class="checkbox-danhmuc">
                                        <input type="checkbox" onchange = "chonDanhHieu()" name="" id="">
                                        <span class="checkmark--danhmuc thuonghieu">
                                            <img src="../assets/img/xiaomi_1656947081.svg" alt="" class="checkmark--danhmuc__img">
                                        </span>
                                    </lable>
                                
                            </div>
                            <!--  -->
                            <div class="filter-detail__contenSP">
                                <div class="item-filter">
                                    <p class="title-gia">Giá</p>
                                    <ul class="ul_item">
                                        <lable class="check-box">
                                            <input type="checkbox" name="" id="">
                                            <span class="checkmark giaban">Dưới 2 triệu</span>
                                        </lable>
                                        <lable class="check-box">
                                            <input type="checkbox" name="" id="">
                                            <span class="checkmark giaban">Dưới 2 triệu</span>
                                        </lable>
                                        <lable class="check-box">
                                            <input type="checkbox" name="" id="">
                                            <span class="checkmark giaban">Từ 2 đến 4 triệu</span>
                                        </lable>
                                        <lable class="check-box">
                                            <input type="checkbox" name="" id="">
                                            <span class="checkmark giaban">Từ 4 đến 7 triệu</span>
                                        </lable>
                                        <lable class="check-box">
                                            <input type="checkbox" name="" id="">
                                            <span class="checkmark giaban">Từ 7 đến 13 triệu</span>
                                        </lable>
                                        <lable class="check-box">
                                            <input type="checkbox" name="" id="">
                                            <span class="checkmark giaban">Từ 13 đến 20 triệu</span>
                                        </lable>
                                        <lable class="check-box">
                                            <input type="checkbox" name="" id="">
                                            <span class="checkmark giaban">Trên 20 triệu</span>
                                        </lable>
                                    </ul>
                                </div>
                                <div class="item-filter">
                                    <p class="title-gia">RAM</p>
                                    <ul class="ul_item">
                                        <lable class="check-box">
                                            <input type="checkbox" name="" id="">
                                            <span class="checkmark">2 GB</span>
                                        </lable>
                                        <lable class="check-box">
                                            <input type="checkbox" name="" id="">
                                            <span class="checkmark">3 GB</span>
                                        </lable>
                                        <lable class="check-box">
                                            <input type="checkbox" name="" id="">
                                            <span class="checkmark">4 GB</span>
                                        </lable>
                                        <lable class="check-box">
                                            <input type="checkbox" name="" id="">
                                            <span class="checkmark">6 GB</span>
                                        </lable>
                                        <lable class="check-box">
                                            <input type="checkbox" name="" id="">
                                            <span class="checkmark">8 GB</span>
                                        </lable>
                                        <lable class="check-box">
                                            <input type="checkbox" name="" id="">
                                            <span class="checkmark">12 GB</span>
                                        </lable>
                                        <lable class="check-box">
                                            <input type="checkbox" name="" id="">
                                            <span class="checkmark">16 GB</span>
                                        </lable>
                                    </ul>
                                </div>
                                <div class="item-filter">
                                    <p class="title-gia">Bộ nhớ trong</p>
                                    <ul class="ul_item">
                                        <lable class="check-box">
                                            <input type="checkbox" name="" id="">
                                            <span class="checkmark">8 GB</span>
                                        </lable>
                                        <lable class="check-box">
                                            <input type="checkbox" name="" id="">
                                            <span class="checkmark">16 GB</span>
                                        </lable>
                                        <lable class="check-box">
                                            <input type="checkbox" name="" id="">
                                            <span class="checkmark">32 GB</span>
                                        </lable>
                                        <lable class="check-box">
                                            <input type="checkbox" name="" id="">
                                            <span class="checkmark">64 GB</span>
                                        </lable>
                                        <lable class="check-box">
                                            <input type="checkbox" name="" id="">
                                            <span class="checkmark">128 GB</span>
                                        </lable>
                                        <lable class="check-box">
                                            <input type="checkbox" name="" id="">
                                            <span class="checkmark">256 GB</span>
                                        </lable>
                                        <lable class="check-box">
                                            <input type="checkbox" name="" id="">
                                            <span class="checkmark">512 GB</span>
                                        </lable>
                                    </ul>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <p class="sort-total">
                    Tìm thấy
                    <b>10</b>
                    Kết quả
                </p>
                <div class="box-checkbox">
                    <a href="" class="c-checkitem activeGiamGia active">
                        <span class = "tick-checkbox"></span>
                        <p>Giảm giá</p>
                    </a>
                    <a href="" class="c-checkitem active">
                        <span class = "tick-checkbox"></span>
                        <p>Góp 0%</p>
                    </a>
                    <a href="" class="c-checkitem">
                        <span class = "tick-checkbox"></span>
                        <p>Độc quyền</p>
                    </a>
                </div>
            </div>
            
            <div class="sort-select">
                <p class="click-sort">
                    Xếp theo
                    <span class = "sort-show">Chính xác</span>
                </p>
                <div class="sort-select-main sort">
                    <p>
                        <a href=""  class="check">
                            <i></i>
                            Chính xác
                        </a>
                    </p>
                    <p>
                        <a href=""  class="checkBangChuCai">
                            <i></i>
                            Theo chữ cái (ABC)
                        </a>
                    </p>
                    <p>
                        <a href=""  class="checkGiam">
                            <i></i>
                            Giá cao đến thấp
                        </a>
                    </p>
                    <p>
                        <a href=""  class="checkTang">
                            <i></i>
                            Giá thấp đến cao
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>

    <div class = "grid wide">
        <div class="home-product">
            <div class="grid-row">

            </div>
        </div>
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
                echo '
                <a class="chitiet-item__product col l-2 m-4 c-6" >
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
                </a>';
            }
        }
    }
   

?>
<script>
    function chonDanhHieu() {
        var thuonghieu = document.querySelector('.thuonghieu');
        var thuonghieuchon_arr = [];
        for(i = 0; i < thuonghieuchon_arr.length; i++) {
            if (thuonghieuchon_arr[i] == true){
                thuonghieuchon_arr.push(thuonghieu[i].value);
            }
        }

        var giaSanPham = document.querySelector('.giaban');
        var giaban_arr = [];
        for(i = 0; i < giaban_arr.length; i++) {
            if (giaban_arr[i] == true) {
                giaban_arr.push(giaSanPham[i].value);
            }
        }
    }


    function hienDT(thuonghieuchon_arr = [], giaban_arr = []){
        var SPChon = document.querySelector('.SPChon');
        console.log(SPChon)
        SPChon.innerHTML = '';
        if (thuonghieuchon_arr.length > 0) {
            for (i = 0; i< thuonghieuchon_arr.length; i++) {
                SPChon.innerHTML += `
                    <span id = "sanphamChon" class="a_exist">
                        ${thuonghieuchon_arr[i]}
                    </span>
                `;
            }
        }
    }
    hienDT();
    
     
</script>
<script>

    var checkG = document.querySelector('.checkGiam')
    checkG.onclick = function() {
        event.preventDefault();
        getProductPriceGiam();
    }

    var checkT = document.querySelector('.checkTang');
    checkT.onclick = () => {
        event.preventDefault();
        getProductPriceTang();
    }

    var checkGiamGia = document.querySelector('.activeGiamGia');
    checkGiamGia.onclick = () => {
        event.preventDefault();
        getProductdiscountGiam();
    }
   
    var checkBCC = document.querySelector('.checkBangChuCai');
    checkBCC.onclick = () => {
        event.preventDefault();
        getProductthumnail();
    }
    
    function getProductPriceGiam() {
        var url_product = "http://localhost/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/PHPREST/api/product/ProductPriceGiam.php";
        function start() {
            getproduct(hanlderProductSortReduce);
        }
        start();
        function getproduct(callback) {
            fetch(url_product)
                .then(function (response) {
                    return response.json();
                })
                .then(callback);
        }
        
        function hanlderProductSortReduce(data) {
            var itemProduct = document.querySelector('.grid-row');
            var html = data.data.map((item) => {
                return `
                <a class="col l-2 m-4 c-6" >
                    <div class="home-product-item">
                            <div class="home-product-item-img" style="background-image:url(${item.img});"></div>
                            <h4 class="home-product-item-name">${item.title}</h4>
                        <div class="home-product-item-price">
                            <span class="home-product-item__price-current">${item.price}</span>
                            <span class="home-product-item__price-old">${item.thumnail}</span>
                        </div>
                        <div class="home-product-item__sale-off">
                            <span class="home-product-item__sale-off-percent">${item.discount}</span>
                        </div>
                    </div>
                </a>'
                `;
            });
            itemProduct.innerHTML = html.join('');
        }
    }

   
    function getProductPriceTang() {
        var url_product = "http://localhost/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/PHPREST/api/product/ProductPriceTang.php";
        function start() {
            getproduct(hanlderProductSortReduce);
        }
        start();
        function getproduct(callback) {
            fetch(url_product)
                .then(function (response) {
                    return response.json();
                })
                .then(callback);
        }
        
        function hanlderProductSortReduce(data) {
            var itemProduct = document.querySelector('.grid-row');
            var html = data.data.map((item) => {
                return `
                <a class="col l-2 m-4 c-6" >
                    <div class="home-product-item">
                            <div class="home-product-item-img" style="background-image:url(${item.img});"></div>
                            <h4 class="home-product-item-name">${item.title}</h4>
                        <div class="home-product-item-price">
                            <span class="home-product-item__price-current">${item.price}</span>
                            <span class="home-product-item__price-old">${item.thumnail}</span>
                        </div>
                        <div class="home-product-item__sale-off">
                            <span class="home-product-item__sale-off-percent">${item.discount}</span>
                        </div>
                    </div>
                </a>'
                `;
            });
            itemProduct.innerHTML = html.join('');
        }
    }

    function getProductdiscountGiam() {
        var Apidiscount = "http://localhost/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/PHPREST/api/product/sortGiamGia.php";
        function start() {
            getDiscount(handelDiscount);
        }

        start();

        function getDiscount(callback) {
            fetch(Apidiscount)
            .then(function (respons) {
                return respons.json();
            })
            .then(callback)
        }

        function handelDiscount (data) {
            var itemProduct = document.querySelector('.grid-row');
            var html = data.data.map((item) => {
                return `
                <a class="col l-2 m-4 c-6" >
                    <div class="home-product-item">
                            <div class="home-product-item-img" style="background-image:url(${item.img});"></div>
                            <h4 class="home-product-item-name">${item.title}</h4>
                        <div class="home-product-item-price">
                            <span class="home-product-item__price-current">${item.price}</span>
                            <span class="home-product-item__price-old">${item.thumnail}</span>
                        </div>
                        <div class="home-product-item__sale-off">
                            <span class="home-product-item__sale-off-percent">${item.discount}</span>
                        </div>
                    </div>
                </a>'
                `;
            });
            itemProduct.innerHTML = html.join('');
        }
    }

    function getProductthumnail() {
        var APIthumnail = "http://localhost/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/PHPREST/api/product/sortBangChuCai.php";
        function start() {
            getProductBangChuCai(handelthumnail);
        }

        function getProductBangChuCai(callback) {
            fetch(APIthumnail)
            .then(function (respons) {
                return respons.json();
            })
            .then(callback);
        }

        function handelthumnail(data) {
            var itemProduct = document.querySelector('.grid-row');
            var html = data.data.map((item) => {
                return `
                <a class="col l-2 m-4 c-6" >
                    <div class="home-product-item">
                            <div class="home-product-item-img" style="background-image:url(${item.img});"></div>
                            <h4 class="home-product-item-name">${item.thumnail}</h4>
                        <div class="home-product-item-price">
                            <span class="home-product-item__price-current">${item.price}</span>
                            <span class="home-product-item__price-old">${item.title}</span>
                        </div>
                        <div class="home-product-item__sale-off">
                            <span class="home-product-item__sale-off-percent">${item.discount}</span>
                        </div>
                    </div>
                </a>'
                `;
            });
            itemProduct.innerHTML = html.join('');
        }
    }

    

    
</script>






