<?php
    ob_start();
?>
<?php
    $title = 'Giỏ hàng';
    $baseUrl = '../';
    include_once ($baseUrl.'FE/Layout/header.php');
?>
<?php
// $user_id = $_SESSION['id'];
// $url='http://localhost/webDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/PHPREST/api/orders/select_order_instant.php?user_id='.$user_id;
// $json = file_get_contents($url);
// $data = json_decode($json);
$name = $_SESSION['name'];
$maHD=$_SESSION['maHD'];
$soDT=$_SESSION['telephone'];
$tinh_tp = $_SESSION['matp'];
$quan_huyen = $_SESSION['maqh'];
$xa_phuong = $_SESSION['phuongxa'];
$note = $_SESSION['note'];
$total_money=$_SESSION['total_money'];
?>
<link rel="stylesheet" href="/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/FE/Layout/css/cart.css">
<div class="grid wide ">
    <div class="l-6 cart-box__content">
        <div class="cart_thanhcong--container">
            <div class="alertsuccess-new">
                <img src="../assets/img/success.svg" alt="">
                <strong>Đặt hàng thành công</strong>
            </div>
            <div class="order-content">
                <div class="order-content__heading">
                    <p>Cảm ơn </p><span><?php echo $name;?> </span>
                    <span>Đã đã cho Thế Giới Di Động cơ hội được phục vụ.</span>
                </div>
                <div class="content_form--order">
                    <div class="info-order-header">
                        <h4>Đơn hàng:
                            <span><?php echo $maHD;?></span>
                        </h4>
                        <div class="header-right">
                            <a href="" class = "header-right__quanli">Quản lí đơn hàng</a>
                            <a href="http://localhost/webDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/PHPREST/api/orders/huyHD.php" class = "header-right__huy">Hủy</a>
                        </div>
                    </div>
                    <div class = "row-info__userorder">
                        <span class="label_form--order">
                            <i class="info-order__dot-icon"></i>
                            <strong class="nguoi-order">
                             Người nhận hàng: 
                            </strong>
                            <span><?php echo $name;?></span>
                        </span>
                    </div>
                    <div class = "row-info__userorder">
                        <span class="label_form--order">
                            <i class="info-order__dot-icon"></i>
                            <strong class="nguoi-order">
                                Số điện thoại:  
                            </strong>
                            <span><?php echo $soDT;?></span>
                        </span>
                    </div>

                    <div class = "row-info__userorder">
                        <span class="giaodien_form--order">
                            <i class="info-order__dot-icon"></i>
                            <span class="nguoi-order__giaoden">
                                <strong>Giao đến:
                                </strong>
                                <!-- .' '.$xa_phuong.' '.$quan_huyen.' '.$tinh_tp -->
                                    <span><?php echo $note.' (nhân viên sẽ gọi xác nhận trước khi giao).';?></span>
                            </span>
                        </span>
                    </div>
                    <div class = "row-info__userorder">
                        <span class="tongtien_form--order">
                            <i class="info-order__dot-icon"></i>
                            <span class="nguoi-order__tongtien">
                                <strong>Tổng tiền: </strong>
                                <b class="red_tongtien-order"><?php echo $total_money;?><sup>đ</sup></b>
                            </span>
                        </span>
                    </div>
                </div>
                <div class="btn-donhang__order">
                    <a href="" class="btn-donhang__order-link">
                        Đơn hàng chưa được xác nhận
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>