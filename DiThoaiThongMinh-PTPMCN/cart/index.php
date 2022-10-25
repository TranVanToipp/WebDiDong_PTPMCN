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
    if(isset($_SESSION['id'])){
        $id = $_SESSION['id'];
        $url = 'http://localhost/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/PHPREST/api/cart/read_cart.php?user_id='.$id;
        $json = file_get_contents($url);
		$data = json_decode($json);
        if(isset($data->message)){
			header('Location:../../../../WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/');
			die();
		}else{
            foreach($data->data as $item){
                echo '
                    <li class="cart-container__item">
                        <div class="cart-container__item-check">
                            <input type="checkbox" name="" id="" class = "cart-container__item">
                        </div>
                    <div class="cart-container__item-box ">
                        <a href="" class="cart-container__box-img-link">
                            <img src="../assets/photos/'.$item->thumnail.'" alt="Đây là sản phẩm">
                        </a>
                        <div class="cart-container__item-xoa">
                        <i class="fa-solid fa-angle-left fa-angle-left-color"></i>
                        <a href="http://localhost/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/PHPREST/api/cart/delete.php?id='.$item->id.'" class="">
                            <span>Xóa</span>
                        </a>
                        </div>
                    </div>
                    <div class="cart-container__item-content ">
                        <div class="cart-container__item-title">
                            '.$item->title.'
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
                                '.$item->price.'
                            </div>
                            <div class="cart-container__item-oulprice">
                            '.$item->discount.'
                            </div>
                        </div>
                        <div class="cart-container__item-update-SP">
                            <input type="button" class= "tru" value= "-" name="truSL" id="">
                            <input class= "value-quantity" value = "'.$item->num.'" name="'.$item->id.'" id="">
                            <input type="button" class = "cong" value = "+" name="congSL" id="">
                        </div>
                    </div>
                </li>
                ';
            }
        }
    }
?>
            </ul>
            
        </div>
        <!-- <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="POST">
            <div class = "update-soluong">
                <button type="submit" class = "update-soluong" name ="update" value = "Cập nhật sản phẩm">
                    Cập nhật sản phẩm
                </button>
            </div>
        </form> -->
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



