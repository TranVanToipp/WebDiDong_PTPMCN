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


function rdMaHD($length = 7){
	$s='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
	$sLength= strlen($s);
	$randomMXN='';
	for($i=0;$i<$length;$i++){
		$randomMXN.=$s[rand(0,$sLength-1)];
	}
	return $randomMXN;
}

function layMaHD(){
	$url="http://localhost/webDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/PHPREST/api/orders/select_order_id.php";
	$json = file_get_contents($url);
	$data = json_decode($json);
	if(isset($data->message)){
		$mahd="HD_".rdMaHD();
		return $mahd;
	}
	else {
		$mahd="";
		while($mahd==""){
			$mahd="HD_".rdMaHD();
			foreach($data->data as $row){
			if($row->maHD == $mahd)
				$mahd="";
			}
		}
		return $mahd;
	}
}
$maHD = layMaHD();
$_SESSION['maHD'] = $maHD;

$orders->user_id = $_SESSION['id'];
$orders->user_name = $_SESSION['name'];
$orders->maHD = $maHD;
$orders->gender = $_SESSION['gender'];
$orders->phone_number = $_SESSION['telephone'];
$orders->tinh_tp = $_SESSION['matp'];
$orders->quan_huyen = $_SESSION['maqh'];
$orders->xa_phuong = $_SESSION['phuongxa'];
$orders->note = $_SESSION['note'];
$orders->status = 1;
foreach ($_SESSION['cart'] as $sanpham){
	$product->id = $sanpham[4];
	$product_update->id = $sanpham[4];
	$product->read_single();
	$product_update->num = $product->num - $sanpham[5];
	if($product_update->num >= 0){
		if($product_update->update_num_product()){
			$orders->product = $sanpham[4];
			$orders->num = $sanpham[5];
			$orders->money = $sanpham[2]-($sanpham[2]*$sanpham[3]/100);
			$orders->create();
		}
	}else {
			echo 'Số lượng của Sản phẩm '.$sanpham[1].' không đủ để thực hiện giao dịch';
			die();
		}
}
unset($_SESSION['cart']);
header("Location:../../../cart/cartThanhCong.php");
?>