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
    <div class="container-cart__order">
    <div class="l-3 left-cart">
        
        <a href="" class="cart-left_danhsachdon">
            Danh sách đơn hàng đã mua
        </a>
    </div>
    <?php
        $user_buyding_order = "http://localhost/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/PHPREST/api/user/select_user.php?id=".$_SESSION['id'];
        $json = file_get_contents($user_buyding_order);
        $data = json_decode($json);
            if (isset($data -> data)) {
                foreach($data -> data as $itemuser) {
                    echo '
                    <div class="l-9 c-12 right-cart">
                        <div class="user-dathang">
                            <div class="user-dathang__left">
                                <p class="ten-user__dathang">Chào bạn -</p>
                                <p class="ten-user__dathang">'.$itemuser -> fullname.'</p>
        
                                <p class="sodienthoai-user__dathang">'.$itemuser -> phone_number.'</p>
                            </div>
                            <div class="user-dathang__right">
                                
                            </div>
                        </div>
                    ';
                }
            }
        ?>

        <?php
        if (isset($_SESSION['id'])) {
            $urlbuying = "http://localhost/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/PHPREST/api/orders/select_order_buying.php?user=".$_SESSION['id'];
            $json = file_get_contents($urlbuying);
            $data = json_decode($json);
        if (isset($data -> data)) {
            foreach($data -> data as $item) {
                echo '
                <div class="list-danhsach__order">
                    <b>Đơn hàng đã mua gần đây</b>
                    <div class="group-list__order">
                        <i>i</i>
                        <div>Đây là danh sách đơn hàng bạn đã mua từ ngày
                        </div>
                        <b>'.$item->created_at.'</b>
                    </div>
                    <table class="bang-orer">
                        <tbody>
                            <tr>
                                <th>Mã đơn hàng</th>
                                <th>sản phẩm</th>
                                <th>giá</th>
                                <th class = "bang-orer__ngaymua">ngày đặt mua</th>
                                <th>trạng thái</th>
                            </tr>
                            <tr class="cot-order">
                                <td>
                                    <a href="" class="">'.$item -> maHD.'</a>
                                </td>
                                <td>
                                    <a href="" class="order_item">
                                        <img src="../assets/photos/'.$item -> thumnail.'" alt="hình sản phẩm đơn hàng" class="order_item-img">
                                    </a>
                                    <div class="order-content">
                                        <a href="" class="name-product__order">'.$item -> name_product.'</a>
                                        <div class="deliverytime">Dự kiến giao: Trước 10:00 27/10/2022</div>
                                    </div>
                                </td>
                                <td>
                                    <b class="price-product__order">'.$item -> money.'₫</b>
                                </td>
                                <td>
                                    <span class="date-product__order">'.$item -> created_at.'</span>
                                </td>
                                <td>
                                    <span class="data-status">'.$item -> status.'</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                
                ';
            }
        }
        
    }else {
        header('Location:../../../../WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/authen/login');
		die();
    }
?>
        

        
    </div>
    </div>
</div>

<?php 
    require_once("../FE/Layout/footer.php");
?>