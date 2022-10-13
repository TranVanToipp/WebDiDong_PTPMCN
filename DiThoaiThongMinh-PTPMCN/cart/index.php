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
                            <input class= "value-quantity" value = "'.$item->num.'" name="'.$item->id.'" id="value-quantity">
                            <input type="button" class = "cong" value = "+" name="congSL" id="">
                        </div>
                    </div>
                </li>
                ';
				if(!empty($_POST)){   
					$a = $item->id;
					//$num = $_POST[$a];
					$cart = array(
						'id' =>$item->id,
						'product_id' =>$item->product_id,
						'price' =>$item->price,
						'num' =>$num
					);
					$json = json_encode($cart);
					$fp = fopen('C:\\wamp64\\www\\WebDiDong_PTPMCN\\DiThoaiThongMinh-PTPMCN\\PHPREST\\api\\cart\\update.txt', 'w');
					fputs($fp,$json);
					fclose($fp);
				}
				echo '<form action="'.$_SERVER['PHP_SELF'].'" method="POST">
					<div class = "update-soluong">
						<button type="submit" class = "update-soluong" name ="update" value = "Cập nhật sản phẩm">
							Cập nhật sản phẩm
						</button>
					</div>
				</form>';
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



<script>
    // Xử lí tăng, giảm số lượng
    const $ = document.querySelector.bind(document);
    const $$ = document.querySelectorAll.bind(document);
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
  
</script>



