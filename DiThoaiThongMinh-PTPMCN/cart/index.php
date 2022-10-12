<?php
    $title = 'Giỏ hàng';
	$baseUrl = '../';
    include_once ($baseUrl.'FE/Layout/header.php');
?>
<link rel="stylesheet" href="/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/FE/Layout/css/cart.css">

<div class="grid wide ">
    <div class="cart-box__content l-8">
        <div class="cart-heading__text">
            <a href="../" class="cart-heading__text-link">
            <i class="fa-solid fa-angle-left fa-angle-left-color"></i>
                Mua thêm sản phẩm khác
            </a>
            <span>Giỏ hàng của bạn</span>
        </div>

        <div class="cart-container">
            <ul class="cart-container__list">
                
            </ul>
        </div>
    </div>
</div>



<script>
    // var dataSPGH = JSON.parse(localStorage.getItem('SanPhamGioHang'));
    // var arr = Object.entries(dataSPGH); 
    var id_user = localStorage.getItem('id_user');
    console.log(id_user);
    var ApiCart = "http://localhost/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/PHPREST/api/cart/read_cart.php?user_id=1";
    function start(){
        getCart(handleCart);
    }
start();
    function getCart(callback){
        fetch(ApiCart)
            .then(function (respon){
                return respon.json();
            })
            .then(callback);
    }

    function handleCart(data) {
        var itemCart = document.querySelector('.cart-container__list');
        var html = data.data.map( (item) => {
            return `
                <li class="cart-container__item">
                    <div class="cart-container__item-check">
                        <input type="checkbox" name="" id="" class = "cart-container__item">
                    </div>
                    <div class="cart-container__item-box ">
                        <a href="" class="cart-container__box-img-link">
                            <img src="${item.thumnail}" alt="Đây là sản phẩm">
                        </a>
                        <div class="cart-container__item-xoa">
                        <i class="fa-solid fa-angle-left fa-angle-left-color"></i>
                            <span>Xóa</span>
                        </div>
                    </div>
                    <div class="cart-container__item-content ">
                        <div class="cart-container__item-title">
                            ${item.title}
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
                                ${item.price}
                            </div>
                            <div class="cart-container__item-oulprice">
                                ${item.discount}
                            </div>
                        </div>
                        <div class="cart-container__item-update-SP">
                            <input type="button" class= "tru" value= "-" name="" id="">
                            <input type="number" class= "value-quantity" value = "${item.num}" name="" id="">
                            <input type="button" class = "cong" value = "+" name="" id="">
                        </div>
                    </div>
                </li>
            `;
        });
        itemCart.innerHTML = html.join('');

        // Xử lí tăng, giảm số lượng
        const $ = document.querySelector.bind(document);
        const $$ = document.querySelectorAll.bind(document);
        console.log('đây là log')
        for(let  i = 0; i < $$('.cong').length; i++){
            let a1 = $$('.value-quantity')[i].value;
            a1 = parseInt(a1);
            $$('.cong')[i].onclick = () => {
                a1++;
                $$('.value-quantity')[i].value = a1;
            }
            $$('.tru')[i].onclick = () => {
                if(a1 < 2) {
                    return;
                }else {
                    a1--;
                    $$('.value-quantity')[i].value = a1;
                }
            }
        }

    }   
</script>

