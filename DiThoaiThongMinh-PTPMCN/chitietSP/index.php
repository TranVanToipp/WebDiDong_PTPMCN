<?php
    $title = 'chi tiết sản phẩm';
	$baseUrl = '../';
    include_once ($baseUrl.'FE/Layout/header.php');
?>
<link rel="stylesheet" href="/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/FE/Layout/css/chitiet.css">
<?php

    $url_chitiet = "http://localhost/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/PHPreST/api/product/read_single.php?id=2";


?>

<div class="grid wide">
    <div class="chitiet-chitiet ">

    </div>
</div>
<script>
    var data = localStorage.getItem('idSP');
    var ApiHinhSP = "http://localhost/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/PHPreST/api/product/read_single.php?id="+data;
    function start() {
    
    getChiTietSP(handleSP);
}
start();

function getChiTietSP(callback) {
    fetch(ApiHinhSP)
        .then(function (response) {
            return response.json();
        })
        .then(callback);
}
function handleSP(data) {
    var chitiet = document.querySelector('.chitiet-chitiet')
    var html = data.data.map(function (product) {
        console.log(product.img);
        return `
        <div class="form-active-chitiet ">
                <div class="header-chitiet-content">
                    <h3>
                        ${product.title}
                    </h3>
                </div> 
                   <!-- <i class="form-active-chitiet-close fa-solid fa-xmark"></i> -->
                 <div class="chitiet-container l-12 m-12 c-12">
                    <div class="chitiet-container-img-content l-4">
                        <div class="chitiet-container-img">
                            <div class="chitiet-container-above">
                                 <img src="/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/assets/img/iphone22.jpg" alt="Điện thoại hình ảnh ở trên" class="chitiet-container-above-img">
                            </div>
                            <div class="chitiet-icon-nav">
                            <div class="chitiet-icon-nav-left">
                                <i class="fa-solid fa-angle-left fa-angle-left-color"></i>
                            </div>
                            <div class="chitiet-icon-nav-right">
                                <i class="fa-solid fa-angle-right"></i>
                            </div>
                        </div>
                            <ul class="chitiet-container-below">
                            
                                
                            </ul>
                        </div>
                        
                    </div>
                    <div class="chitiet-container-embrace l-5">
                        <div class="chitiet-container-price">
                            <h4>Giá: ${product.price}</h4><sup>đ</sup>
                        </div>
                        <div class="chitiet-container-nhandat">
                            <span>Nhận đặt trước</span>
                        </div>
            
                        <ul class="chitiet-container-list">
                            <li class="chitiet-container-type-item">
                                <img src="/WebDiiThongMinh-PTPMCN/assets/img/iphone22.jpg" alt="" class="chitiet-container-type-item-img">
                                <div class="chitiet-container-type-item-blow">
                                    <span class="chitiet-container-type-item-tyle">Đen</span>
                                    <span class="chitiet-container-type-item-price">
                                        40.990.000
                                    <sup>đ</sup>
                                </span>
                                </div>
                            </li>
                            <li class="chitiet-container-type-item">
                                <img src="PTPMCN/ass alt="" class="chitiet-container-type-item-img">
                                <div class="chitiet-container-type-item-blow">
                                    <span class="chitiet-container-type-item-tyle">Đen</span>
                                    <span class="chitiet-container-type-item-price">
                                        40.990.000
                                    <sup>đ</sup>
                                </span>
                                </div>
                            </li>
                            <li class="chitiet-container-type-item">
                                <img src="/WeThongMins/img/iphone22.jpg" alt="" class="chitiet-container-type-item-img">
                                <div class="chitiet-container-type-item-blow">
                                    <span class="chitiet-container-type-item-tyle">Đen</span>
                                    <span class="chitiet-container-type-item-price">
                                        40.990.000
                                    <sup>đ</sup>
                                </span>
                                </div>
                                </li>
                            </ul>

                            <div class="chitiet-container-chitiet-khuyenmai">
                                <h4>Khuyến Mãi</h4>
                                <ul class="chitiet-container-chitiet-khuyenmai-list">
                                    <li class="chitiet-container-chitiet-khuyenmai-item">
                                        Mã ưu đãi giảm đến 500.000đ khi thanh toán
                                    </li>
                                    <li class="chitiet-container-chitiet-khuyenmai-item">
                                        Mã ưu đãi giảm đến 500.000đ khi thanh toán
                                    </li>
                                    <li class="chitiet-container-chitiet-khuyenmai-item">
                                        Mã ưu đãi giảm đến 500.000đ khi thanh toán
                                    </li>
                                    <li class="chitiet-container-chitiet-khuyenmai-item">
                                        Mã ưu đãi giảm đến 500.000đ khi thanh toán
                                    </li>
                                </ul>
                            </div>
                            <button class="chitiet-container-type-btn">
                                Thêm vào giỏ hàng
                            </button>

                            <div class="chitiet-buton-thanhtoan">
                                <button class="chitiet-container-type-btn-tragop-phantram">
                                <h4>Mua trả góp 0%</h4>
                                <span>Duyệt hồ sơ trong 5 phút </span>
                                </button>

                                <button class="chitiet-container-type-btn-tragop-the" >
                                <h4> Trả góp qua thẻ</h4>
                                <span>Visa, Mastercart, JCB, Amex</span>
                                </button>
                            </div>

                            <div class="chitiet-container-copy">
                                <button class= "chitiet-container-copy-link">
                                    <span class="chitiet-container-boder">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-link-45deg" viewBox="0 0 16 16">
                                            <path d="M4.715 6.542 3.343 7.914a3 3 0 1 0 4.243 4.243l1.828-1.829A3 3 0 0 0 8.586 5.5L8 6.086a1.002 1.002 0 0 0-.154.199 2 2 0 0 1 .861 3.337L6.88 11.45a2 2 0 1 1-2.83-2.83l.793-.792a4.018 4.018 0 0 1-.128-1.287z" />
                                            <path d="M6.586 4.672A3 3 0 0 0 7.414 9.5l.775-.776a2 2 0 0 1-.896-3.346L9.12 3.55a2 2 0 1 1 2.83 2.83l-.793.792c.112.42.155.855.128 1.287l1.372-1.372a3 3 0 1 0-4.243-4.243L6.586 4.672z" />
                                        </svg>
                                    </span>
                                    <span>Sao chép đường dẫn</span>
                                </button>

                                <button class= "chitiet-container-copy-thongtin">
                                    <span class="chitiet-container-boder">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-clipboard2" viewBox="0 0 16 16">
                                            <path d="M3.5 2a.5.5 0 0 0-.5.5v12a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5v-12a.5.5 0 0 0-.5-.5H12a.5.5 0 0 1 0-1h.5A1.5 1.5 0 0 1 14 2.5v12a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 14.5v-12A1.5 1.5 0 0 1 3.5 1H4a.5.5 0 0 1 0 1h-.5Z" />
                                            <path d="M10 .5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5.5.5 0 0 1-.5.5.5.5 0 0 0-.5.5V2a.5.5 0 0 0 .5.5h5A.5.5 0 0 0 11 2v-.5a.5.5 0 0 0-.5-.5.5.5 0 0 1-.5-.5Z" />
                                        </svg>
                                    </span>
                                    <span>Sao chép thông tin</span>
                                </button>
                            </div>
                        </div>
                        <div class="tinhtrang-content l-3">
                                khuyến mãi đỉnh
                        </div>
                    </div>
                </div>
            
        </div>
            `;
    });
    chitiet.innerHTML = html.join('');
    var listSPNho = document.querySelector('.chitiet-container-below');
    data.data.forEach(function(dataSP) {
        var html1 = dataSP.img.map(function (item) {
            console.log(item.img_desct);
            return `
                <li class="chitiet-container-below-img">
                        <a href="#" class="chitiet-container-link">
                            <div class="chitiet-container-hinhnho">
                                <img src="../assets/photos/${item.img_desct}" alt="Điện thoại hình ảnh ở dưới" class="chitiet-container-below-img-con">
                            </div>
                        <span class = "chitiet-container-tenhinh">Đỏ</span>
                    </a>
                </li>
            `;
        });
        listSPNho.innerHTML = html1.join('');
    });

    // Xử lí thêm sản phẩm 
    var btnThemSP = document.querySelector('.chitiet-container-type-btn');


    btnThemSP.onclick = () => {
        var titleSP = document.querySelector('.header-chitiet-content h3').innerText;
        var imgSPC = document.querySelector('.chitiet-container-above-img').getAttribute('src');
        var priceSP = document.querySelector('.chitiet-container-price h4').innerText;

        console.log(titleSP, imgSPC, priceSP);
        var objectSP = {
            title: titleSP,
            img: imgSPC,
            price: priceSP
        }

        localStorage.setItem('SanPhamGioHang', JSON.stringify(objectSP));
        
        
    }
    function handleThemSP() {

    }
}

</script>

<script>
    // var data = JSON.parse(localStorage.getItem('SanPham'));
    // var arr = Object.entries(data);
    
    if (false) {
        var productchitiet = document.querySelector('.chitiet-chitiet');
        console.log(productchitiet);
        var html = arr.map(function (product) {
            console.log(product);
            return `
            <div class="form-active-chitiet ">
                <div class="header-chitiet-content">
                <h3>
                  ${product[1].name}
                </h3>
                </div> 
                   <!-- <i class="form-active-chitiet-close fa-solid fa-xmark"></i> -->
                 <div class="chitiet-container l-12 m-12 c-12">
                    <div class="chitiet-container-img-content l-4">
                        <div class="chitiet-container-img">
                            <div class="chitiet-container-above">
                                 <img src="/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/assets/img/iphone22.jpg" alt="Điện thoại hình ảnh ở trên" class="chitiet-container-above-img">
                            </div>
                            <div class="chitiet-icon-nav">
                            <div class="chitiet-icon-nav-left">
                                <i class="fa-solid fa-angle-left fa-angle-left-color"></i>
                            </div>
                            <div class="chitiet-icon-nav-right">
                                <i class="fa-solid fa-angle-right"></i>
                            </div>
                        </div>
                            <ul class="chitiet-container-below">
                                <li class="chitiet-container-below-img">
                                    <a href="" class="chitiet-container-link">
                                        <div class="chitiet-container-hinhnho">
                                            <img src="/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/assets/img/iphone22.jpg" alt="Điện thoại hình ảnh ở dưới" class="chitiet-container-below-img-con">
                                        </div>
                                        <span class = "chitiet-container-tenhinh">Tím</span>
                                    </a>
                                </li>
                                <li class="chitiet-container-below-img">
                                    <a href="" class="chitiet-container-link">
                                        <div class="chitiet-container-hinhnho">
                                            <img src="/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/assets/img/iphone22.jpg" alt="Điện thoại hình ảnh ở dưới" class="chitiet-container-below-img-con">
                                        </div>
                                        <span class = "chitiet-container-tenhinh">Vàng</span>
                                    </a>
                                </li>
                                <li class="chitiet-container-below-img">
                                        <a href="" class="chitiet-container-link">
                                            <div class="chitiet-container-hinhnho">
                                                <img src="/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/assets/img/iphone22.jpg" alt="Điện thoại hình ảnh ở dưới" class="chitiet-container-below-img-con">
                                            </div>
                                        <span class = "chitiet-container-tenhinh">Đỏ</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                        
                    </div>
                    <div class="chitiet-container-embrace l-5">
                        <div class="chitiet-container-price">
                            <h4>Giá: ${product[1].price}</h4><sup>đ</sup>
                        </div>
                        <div class="chitiet-container-nhandat">
                            <span>Nhận đặt trước</span>
                        </div>
            
                        <ul class="chitiet-container-list">
                            <li class="chitiet-container-type-item">
                                <img src="/WebDiiThongMinh-PTPMCN/assets/img/iphone22.jpg" alt="" class="chitiet-container-type-item-img">
                                <div class="chitiet-container-type-item-blow">
                                    <span class="chitiet-container-type-item-tyle">Đen</span>
                                    <span class="chitiet-container-type-item-price">
                                        40.990.000
                                    <sup>đ</sup>
                                </span>
                                </div>
                            </li>
                            <li class="chitiet-container-type-item">
                                <img src="PTPMCN/ass alt="" class="chitiet-container-type-item-img">
                                <div class="chitiet-container-type-item-blow">
                                    <span class="chitiet-container-type-item-tyle">Đen</span>
                                    <span class="chitiet-container-type-item-price">
                                        40.990.000
                                    <sup>đ</sup>
                                </span>
                                </div>
                            </li>
                            <li class="chitiet-container-type-item">
                                <img src="/WeThongMins/img/iphone22.jpg" alt="" class="chitiet-container-type-item-img">
                                <div class="chitiet-container-type-item-blow">
                                    <span class="chitiet-container-type-item-tyle">Đen</span>
                                    <span class="chitiet-container-type-item-price">
                                        40.990.000
                                    <sup>đ</sup>
                                </span>
                                </div>
                                </li>
                            </ul>

                            <div class="chitiet-container-chitiet-khuyenmai">
                                <h4>Khuyến Mãi</h4>
                                <ul class="chitiet-container-chitiet-khuyenmai-list">
                                    <li class="chitiet-container-chitiet-khuyenmai-item">
                                        Mã ưu đãi giảm đến 500.000đ khi thanh toán
                                    </li>
                                    <li class="chitiet-container-chitiet-khuyenmai-item">
                                        Mã ưu đãi giảm đến 500.000đ khi thanh toán
                                    </li>
                                    <li class="chitiet-container-chitiet-khuyenmai-item">
                                        Mã ưu đãi giảm đến 500.000đ khi thanh toán
                                    </li>
                                    <li class="chitiet-container-chitiet-khuyenmai-item">
                                        Mã ưu đãi giảm đến 500.000đ khi thanh toán
                                    </li>
                                </ul>
                            </div>
                            <button class="chitiet-container-type-btn" onclick = 'addCart()'>
                                Thêm vào giỏ hàng
                            </button>

                            <div class="chitiet-buton-thanhtoan">
                                <button class="chitiet-container-type-btn-tragop-phantram">
                                <h4>Mua trả góp 0%</h4>
                                <span>Duyệt hồ sơ trong 5 phút </span>
                                </button>

                                <button class="chitiet-container-type-btn-tragop-the" >
                                <h4> Trả góp qua thẻ</h4>
                                <span>Visa, Mastercart, JCB, Amex</span>
                                </button>
                            </div>

                            <div class="chitiet-container-copy">
                                <button class= "chitiet-container-copy-link">
                                    <span class="chitiet-container-boder">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-link-45deg" viewBox="0 0 16 16">
                                            <path d="M4.715 6.542 3.343 7.914a3 3 0 1 0 4.243 4.243l1.828-1.829A3 3 0 0 0 8.586 5.5L8 6.086a1.002 1.002 0 0 0-.154.199 2 2 0 0 1 .861 3.337L6.88 11.45a2 2 0 1 1-2.83-2.83l.793-.792a4.018 4.018 0 0 1-.128-1.287z" />
                                            <path d="M6.586 4.672A3 3 0 0 0 7.414 9.5l.775-.776a2 2 0 0 1-.896-3.346L9.12 3.55a2 2 0 1 1 2.83 2.83l-.793.792c.112.42.155.855.128 1.287l1.372-1.372a3 3 0 1 0-4.243-4.243L6.586 4.672z" />
                                        </svg>
                                    </span>
                                    <span>Sao chép đường dẫn</span>
                                </button>

                                <button class= "chitiet-container-copy-thongtin">
                                    <span class="chitiet-container-boder">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-clipboard2" viewBox="0 0 16 16">
                                            <path d="M3.5 2a.5.5 0 0 0-.5.5v12a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5v-12a.5.5 0 0 0-.5-.5H12a.5.5 0 0 1 0-1h.5A1.5 1.5 0 0 1 14 2.5v12a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 14.5v-12A1.5 1.5 0 0 1 3.5 1H4a.5.5 0 0 1 0 1h-.5Z" />
                                            <path d="M10 .5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5.5.5 0 0 1-.5.5.5.5 0 0 0-.5.5V2a.5.5 0 0 0 .5.5h5A.5.5 0 0 0 11 2v-.5a.5.5 0 0 0-.5-.5.5.5 0 0 1-.5-.5Z" />
                                        </svg>
                                    </span>
                                    <span>Sao chép thông tin</span>
                                </button>
                            </div>
                        </div>
                        <div class="tinhtrang-content l-3">
                                khuyến mãi đỉnh
                        </div>
                    </div>
                </div>
            
        </div>
            `
        });
        productchitiet.innerHTML = html.join('');
    }
    // else {
    //     alert('Không có sản phẩm');
    // }

</script>
<!-- <script src = "../Javascript/chitietsanpham.js"></script> -->








