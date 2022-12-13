<?php
    ob_start();
?>
<?php
    $title = 'Giỏ hàng';
    $baseUrl = '../';
    include_once ($baseUrl.'FE/Layout/header.php');
?>
<?php
$url = "http://localhost/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/PHPREST/api/tinhTP/select_devvinALL.php";
$json = file_get_contents($url);
$data = json_decode($json);
$total_money = 0;
?>
<link rel="stylesheet" href="/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/FE/Layout/css/cart.css">
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
<div class="grid wide ">
    <div class="cart-box__content l-8 c-12">
        <div class="cart-heading__text">
            <a href="../" class="cart-heading__text-link">
            <i class="fa-solid fa-angle-left fa-angle-left-color"></i>
                Mua thêm sản phẩm khác
            </a>
            <span>Giỏ hàng của bạn</span>
        </div>
        <div class="cart-container">
            <ul class="cart-container__list c-12">
            <?php
				if (isset($_SESSION['cart'])) {
					if (count($_SESSION['cart'])>0){
                        $i = 0;
                        foreach ($_SESSION['cart'] as $sanpham) {
							$total_money = $total_money + ($sanpham[2]-$sanpham[2]*$sanpham[3]/100);
                            echo '
                                <li class="cart-container__item c-12">
                                <div class="cart-container__item-check">
                                    <input type="checkbox" name="" id="" class = "cart-container__item">
                                </div>
                                <div class="cart-container__item-box c-3">
                                    <a href="" class="cart-container__box-img-link">
                                        <img src="'.$sanpham[0].'" alt="Đây là sản phẩm">
                                    </a>
                                    <div class="cart-container__item-xoa">
                                    <i class="fa-solid fa-angle-left fa-angle-left-color"></i>
                                    <a href="./deleteCart.php?id='.$i.'" class="">
                                        <span>Xóa</span>
                                    </a>
                                    </div>
                                </div>
                                <div class="cart-container__item-content c-4">
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
                                <div class="cart-container__item-price-content c-4">
                                    <div class="cart-container__item-price-tren">
                                        <div class="cart-container__item-price">
                                            '.($sanpham[2]-$sanpham[2]*$sanpham[3]/100).'
                                        </div>
                                        <div class="cart-container__item-oulprice">
                                        '.$sanpham[2].'
                                        </div>
                                    </div>
                                    <div class="cart-container__item-update-SP">
                                        <input type="button" class= "tru" value= "-" name="truSL" id="">
                                        <input class= "value-quantity" value = "'.$sanpham[5].'" name="" id="">
                                        <input type="button" class = "cong" value = "+" name="congSL" id="">
                                    </div>
                                </div>
                            </li>
                            ';
                            $i++;
                        }
						
                    }
				}
                    else {
                        echo '<div class="container_giohang_isemty">
                            <img src="../assets/img/cart/giohangis_emty.png" alt="Hình giỏ hàng trống" class="giohang_rong">
                        </div>
						<div>Giỏ hàng của bạn còn trống</div>
						<a>Mua Ngay</a>
						';
                    }
                
                ?>
            </ul>
			<?php 
			if (isset($_SESSION['cart'])) {
				if (count($_SESSION['cart'])>0){?>
                <h3 class="h3_title_from--giohang">
                    Thông tin mua hàng
                </h3>
                <div class="check-box__gioitinh">
                    <label for="" class="gender1">
                        <input type="radio" value="male" name="gender" id="gender1" checked="checked">
                        <span>Anh</span>
                    </label>
                    <label for="" class="gender0">
                        <input type="radio" value="female" name="gender" id="gender0">
                        <span>Chị</span>
                    </label>
                </div>
                <div class="form-input__muahang l-12 c-12">
                    <div class="form-input__hoten l-6 c-12">
                        <input type="text" name="name" id="name" placeholder="Họ tên">
                        <br>
                    </div>
                    <div class="form-input__sdt l-6 c-12">
                        <input type="text" name="telephone" id="telephone" placeholder="Số điện thoại">
                        <br>
                    </div>
                </div>

                <div class="giohang_cachthuc--mua">
                    <h3 class="h3-title-cachthuc">Chọn cách thức mua hàng</h3>
                    <div class="typeReceive">
                        <label class = "typeReceive-giaohangtannoi" for="" title="Giao hàng tận nơi">
                            <input type="radio" name="receive" id="receive0">
                            <span>Giao hàng tận nơi</span>
                        </label>
                        <label class = "typeReceive-giaohangtannoi" for="receive1">
                            <input type="radio" name="receive" id="receive1" value="2">
                            <span>Nhận tại cữa hàng</span>
                        </label>
                    </div>

                </div>
                <div class="tabReceive">
                    <div class="mainTab">
                        <p class="tab-title">
                            Chọn địa chỉ để biết thời gian và phí vận chuyển (nếu có) 
                        </p>
                        <div class="row-giohang__tab l-12 c-12">
                            <div class="l-6 c-12 select_giohang-group">
                                <select name="matp" class="select_giohang-tinh" id="matp">
                                    <option value="#" class="option-giohang__tinh1">
                                    Tỉnh/Thành phố    
                                    </option>
									<?php
										foreach($data->data as $item){
											echo '<option value="'.$item->matp.'"class="option-giohang__tinh2">'.$item->name.'</option>';
										}
									?>
                                </select>
                            </div>
                            <div class="l-6 c-12 select_giohang-group">
                                <select class="select_giohang-quan" name="maqh" id="maqh">
                                    <option value="#" class="option_giohang-quan">
                                        Quận/Huyện
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="row-giohang__tab-Phuong l-12 c-12">
                            <div class="l-6 c-12 select_giohang-group">
                                <select name="phuongxa" id="phuongxa" class="select-giohang__phuong">
                                    <option value="#" class="option-giohang__phuong">
                                        Phường/Xã
                                    </option>
                                </select>
                            </div>
                            <div class="l-6 c-12 select_giohang-group">
                                    <input name ="note" class="option-giohang__sonha" placeholder = "Số nhà tên đường">
                                    </input>
                                    <!-- Chỗ này nhập -->
                               
                            </div>
                        </div>
                    </div>
                </div>
				<div class="dathang-content">
					<div class="header_dathang">
						<span class="heading-text">Tổng tiền:</span>
						<span class="heading-text__gia"><?php echo $total_money.'₫';?></span>
					</div>
					<div class="container_dieukien">
						<span class="text-dieukien">Cần thanh toán trước 849.000₫ trong 24h sau khi đặt hàng để giữ hàng</span>
					</div>
					<div class="button-container__dathang">
						<input type="submit" class = "button-container__dathang__btn" name ="btnDatHang" value ="Đặt Hàng"/>
					</div>
					<div class="footer-dathang">
						<span>Bạn có thể chọn hình thức thanh toán sau khi đặt hàng</span>
					</div>
				</div>
			<?php } 
			}
			?>
        </div>
    </div>
</div>
  
    </div>
</div>
 </form>
<?php
if(!empty($_POST)) {
	if(isset($_SESSION['id'])){
        $_SESSION['total_money'] = $total_money;
		$_SESSION['gender'] = $_POST['gender'];
		$_SESSION['name'] = $_POST['name'];
		$_SESSION['telephone'] = $_POST['telephone'];
		$_SESSION['matp'] = $_POST['matp'];
		$_SESSION['maqh'] = $_POST['maqh'];
		$_SESSION['phuongxa'] = $_POST['phuongxa'];
		$_SESSION['note'] = $_POST['note'];
		header('Location:../../../../../WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/PHPREST/api/orders/create_orders.php');
	}else{
		header('Location:../../../../../WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/authen/login');
	}
}

?>
<script>
//xử lí select địa chỉ
    $(document).ready(function() {
        $('#matp').change(function() {
            var a = $(this).val()
			var a1='#'
			$.get("xa_phuong.php",{a_ajax2:a1},function(data) {
				$("#phuongxa").html(data);
			})
            $.get("quan_huyen.php",{a_ajax1:a},function(data) {
                $("#maqh").html(data);
                $('#maqh').change(function() {
					var b = $(this).val()
					$.get("xa_phuong.php",{a_ajax2:b},function(data) {
						$("#phuongxa").html(data);
					})
				})
            })
        })
    });
</script>
<script>
    // Xử lí tăng, giảm số lượng
    const $$$ = document.querySelector.bind(document);
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
</script>