<?php
session_start();
//headers
header('Access-Control-Allow-Origin:*');//cho phép yêu cầu HTTP
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type, Access-Control-Allow-Methods,Authorization,X-Requested-With');


include_once('../../core/initialize.php');

//create orders
$orders = new orders($db);
$product = new product($db);
$product_update = new product($db);



$orders->user_id = $_SESSION['id'];
$orders->user_name = $_SESSION['name'];
$orders->gender = $_SESSION['gender'];
$orders->phone_number = $_SESSION['telephone'];
$orders->tinh_tp = $_SESSION['matp'];
$orders->quan_huyen = $_SESSION['maqh'];
$orders->xa_phuong = $_SESSION['phuongxa'];
$orders->note = $_SESSION['note'];
$orders->status = "Đợi Kiểm duyệt";
foreach ($_SESSION['cart'] as $sanpham){
	$product->id = $sanpham[4];
	$product_update->id = $sanpham[4];
	$product->read_single();
	$product_update->num = $product->num - $sanpham[5];
	if($product_update->num >= 0){
		if($product_update->update_num_product()){
			$orders->product = $sanpham[4];
			$orders->num = $sanpham[5];
			$orders->money = $sanpham[2]-$sanpham[2]*$sanpham[3];
			$orders->create();
		}
	}else {
			echo 'Số lượng của Sản phẩm '.$sanpham[1].' không đủ để thực hiện giao dịch';
			die();
		}
}
unset($_SESSION['cart']);
header("Location:../../../chuyen_den_trang_dat_hang_thanh_cong");
?>