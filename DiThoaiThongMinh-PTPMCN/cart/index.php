<?php
    $title = 'Giỏ hàng';
	$baseUrl = '../';
    include_once ($baseUrl.'FE/Layout/header.php');
?>
<link rel="stylesheet" href="/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/FE/Layout/css/cart.css">

<div class="grid wide ">
    <div class="cart-box__content l-8">
        <div class="cart-heading__text">
            <a href="#" class="cart-heading__text-link">
            <i class="fa-solid fa-angle-left fa-angle-left-color"></i>
                Mua thêm sản phẩm khác
            </a>
            <span>Giỏ hàng của bạn</span>
        </div>

        <div class="cart-container">
            <ul class="cart-container__list">
                <li class="cart-container__item">
                    <div class="cart-container__item-check">
                        <input type="checkbox" name="" id="" class = "cart-container__item">
                    </div>
                    <div class="cart-container__item-box ">
                        <a href="" class="cart-container__box-img-link">
                            <img src="/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/assets/img/iphone22.jpg" alt="Đây là sản phẩm">
                        </a>
                        <div class="cart-container__item-xoa">
                        <i class="fa-solid fa-angle-left fa-angle-left-color"></i>

                            <span>Xóa</span>
                        </div>
                    </div>
                    <div class="cart-container__item-content ">
                        <div class="cart-container__item-title">
                            Laptop Lenovo Gaming Legion 5 15ACH6 R5 5600H/8GB/512GB/4GB RTX3050/165Hz/Win11 (82JW00KLVN) 
                        </div>
                        <div class="cart-container__item-salecontent">
                            <div class="cart-container__item-sale">
                                Mua online thêm quà:
                            </div>
                            <div class="cart-container__item-salechon">
                                Chọn 1 trong 2 khuyến mãi:
                            </div>
                        </div>
                        <span class= "cart-container__textmausp" >Màu: xanh</span>
                    </div>
                    <div class="cart-container__item-price-content ">
                        <div class="cart-container__item-price-tren">
                            <div class="cart-container__item-price">
                            24.790.000
                            </div>
                            <div class="cart-container__item-oulprice">
                            28.990.000
                            </div>
                        </div>
                        <div class="cart-container__item-update-SP">
                            <input type="button" class= "tru" value= "-" name="" id="">
                            <input type="number" class= "value-quantity" name="" id="">
                            <input type="button" class = "cong" value = "+" name="" id="">
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>

<script>
    var dataSPGH = JSON.parse(localStorage.getItem('SanPhamGioHang'));
    var arr = Object.entries(dataSPGH); 
    console.log(arr);

</script>