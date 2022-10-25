<?php
    ob_start();
?>
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
            <?php
                if (count($_SESSION['cart'])>0){
                    if (isset($_SESSION['cart'])) {
                        $i = 0;
                        foreach ($_SESSION['cart'] as $sanpham) {
                            echo '<li class="cart-container__item">
                                        <div class="cart-container__item-check">
                                            <input type="checkbox" name="" id="" class = "cart-container__item">
                                        </div>
                                    <div class="cart-container__item-box ">
                                        <a href="" class="cart-container__box-img-link">
                                            <img src="../assets/photos/'.$sanpham[0].'" alt="Đây là sản phẩm">
                                        </a>
                                        <div class="cart-container__item-xoa">
                                        <i class="fa-solid fa-angle-left fa-angle-left-color"></i>
                                        <a href="deleteCart.php?id='.$i.'" class="">
                                            <span>Xóa</span>
                                        </a>
                                        </div>
                                    </div>
                                    <div class="cart-container__item-content ">
                                        <div class="cart-container__item-title">
                                            '.$sanpham[1].'
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
                                                '.$sanpham[2].'
                                            </div>
                                            <div class="cart-container__item-oulprice">
                                            '.$sanpham[3].'
                                            </div>
                                        </div>
                                        <div class="cart-container__item-update-SP">
                                            <input type="button" class= "tru" value= "-" name="truSL" id="">
                                            <input class= "value-quantity" value = "1" name="" id="">
                                            <input type="button" class = "cong" value = "+" name="congSL" id="">
                                        </div>
                                    </div>
                                </li>';
                            $i++;
                        }
                       // header("Location:../../../WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/cart/index.php");
    
                    }    
                }else {
                    // header("Location:../../../WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/cart/index.php");
                    echo '
                        <div class="container_giohang_isemty">
                            <img src="../assets/img/cart/giohangis_emty.png" alt="Hình giỏ hàng trống" class="giohang_rong">
                        </div>
                        <div class="textcart_trong">Giỏ hàng của bạn còn trống</div>
                        <div class="button_cart-mua">
                            <a href="../" class="button_cart-mua__link">Về Trang Chủ</a>
                        </div>
                    ';
                }
               
             ?>
            </ul>
            <div class="total-provisional">
                <span class="total-quantity">
                    <span class="total-lable">Tạm tính</span>
                    (8 sản phẩm)
                </span>
                <span class="tem-total-product-quantity">51.520.000₫</span>
            </div>
        </div>
        <div class="infor-customer">
            <h4>Thông tin khách hàng</h4>
            <form action="" class = "form-customer">
                <div class="sex-customer">
                    <input type="radio" name="fav_language" id="" value= "Anh">
                    Anh
                    <input type="radio" name="fav_language" id="" value= "chi">
                    Chị
                </div>

                <div class="fillinform">
                   
                        <input placeholder="Họ và Tên" type="text" maxlength = "50" required= "required" name="" id="">
                   
                        <input placeholder="Số điện thoại" maxlength = "10" required= "required" name="" id="">
                    
                </div>
            </form>
        </div>

        <div class="choosegetgoods">
            <h4>Chọn cách thức nhận hàng</h4>
            <div class="click-choose">
                <div class="form-radio-check">
                    <lable class="check-giaotannoi">
                        <input type="radio" name="fav_language" id="" value= "Anh">
                        <span>Giao tận nơi</span>
                    </lable>
                    <lable class="click-nhantaicuahang">
                        <input type="radio" name="fav_language" id="" value= "chi">
                        <span>Nhận tại cữa hàng</span>
                    </lable>

                    
                </div>

                <div class="form-giaohang__content">
                   <div class="mainTab">
                   <div class="heading-giaohang">
                        <span>Chọn địa chỉ để biết thời gian và phí vận chuyển (nếu có)</span>
                    </div>
                    <div class="form-container">
                        <div class="form-content__thongtin">
                            <div class="form-content__tinh">
                                <span class="selection_form-dathang">
                                    <span class="selection-input__content">
                                        <span class="selection-input__content-text">
                                            Tỉnh/ Thành phố
                                        </span>
                                        <span class="selection-icon__dow">
                                            <!-- icon dow -->
                                        </span>
                                    </span>
                                </span>
                                <span class="select-dropdown">
                                    <span class="select-results">
                                        <ul class="select-results__options" role ="listbox" aria-expanded="true" aria-hidden="false">
                                            <li class="select2-results__option" role = "option">
                                                Tỉnh/ Thành phố 
                                            </li>
                                            <input type="text" class="option_timkiemtinh--input" name="" id="">
                                            
                                        </ul>
                                    </span>
                                </span>
                            </div>


                            

                            <!-- Quận huyện -->
                            <div class="form-content-huyen">
                                <span class="selection_form--quan">
                                    <span class="selection-input__quan">
                                        <span class="selection-input__quan-text">
                                            Quận /Huyện
                                        </span>
                                        <span class="selection-icon__dow">
                                            <!-- icon dow -->
                                        </span>
                                    </span>
                                </span>
                            </div>
                        </div>
                        

                        

                        <div class="form-content__thongxa">
                            <span class="selection_form-dathang">
                                <span class="selection-input__content">
                                    <span class="selection-input__content-text">
                                        Tỉnh/ Thành phố
                                    </span>
                                    <span class="selection-icon__dow">
                                        <!-- icon dow -->
                                    </span>
                                </span>
                            </span>

                                <!-- Quận huyện -->
                            <span class="selection_form--quan">
                                <span class="selection-input__quan">
                                    <span class="selection-input__quan-text">
                                        Quận /Huyện
                                    </span>
                                    <span class="selection-icon__dow">
                                        <!-- icon dow -->
                                    </span>
                                </span>
                            </span>
                        </div>

                    </div>
                   </div>
                </div>
            </div>
        </div>

        <div class="dathang-content">
            <div class="header_dathang">
                <span class="heading-text">Tổng tiền:</span>
                <span class="heading-text__gia">13.180.000₫</span>
            </div>
            <div class="container_dieukien">
                <span class="text-dieukien">Cần thanh toán trước 849.000₫ trong 24h sau khi đặt hàng để giữ hàng</span>
            </div>
            <div class="button-container__dathang">
                <a href="" class="button-container__dathang-link">Đặt hàng</a>
            </div>
            <div class="footer-dathang">
                <span>Bạn có thể chọn hình thức thanh toán sau khi đặt hàng</span>
            </div>
        </div>
        
    </div>
</div>
<script src="../Javascript/tinhTP.js"></script>
<script>
    // Xử lí tăng, giảm số lượng
    const $ = document.querySelector.bind(document);
    const $$ = document.querySelectorAll.bind(document);
    for(let  i = 0; i < $$('.cong').length; i++){
        let a1 = $$('.value-quantity')[i].value;
        console.log(a1);
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
  
</scrip>



