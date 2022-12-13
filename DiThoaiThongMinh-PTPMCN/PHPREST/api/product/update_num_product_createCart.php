<?php
session_start();
//headers
header('Access-Control-Allow-Origin:*');//cho phép yêu cầu HTTP
header('Content-Type: application/json');


include_once('../../core/initialize.php');

//khởi tạo product
$cart = new cart($db);
$product = new product($db);
$product_update = new product($db);
$product->id = isset($_GET['id']) ? $_GET['id'] : die();
$product_update->id = isset($_GET['id']) ? $_GET['id'] : die();
isset($_GET['num']) ? $_GET['num'] : die();
$url='http://localhost//WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/PHPREST/api/cart/select_num_create.php?user_id='.$_SESSION['id'].'&product_id='.$_SESSION['product_id'];
$json = file_get_contents($url);
$data = json_decode($json);
if(isset($data->message)){
	$product->read_single();
	$product_update->num = $product->num - $_GET['num'];
	if($product_update->num > 0){
		if($product_update->update_num_product()){
			create($cart);
			header('Location:../../../../../../WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/cart');
		}
	}else if($product_update->num == 0){
		if($product_update->update_num_product()){
			create($cart);
			//delete sản phẩm
			header('Location:../../../../../../WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/PHPREST/api/product/delete_product.php?id='.$product_update->id);
		}
	}
}else{
	$product->read_single();
	$product_update->num = $product->num - $_GET['num'];
	if($product_update->update_num_product()){
		$cart->id = $data->id;
		$cart->price = $data->price * ($data->num + 1);
		$cart->num = $data->num + 1;
		$cart->update();
		header('Location:../../../../../../WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/cart');
	}
}

function create($cart){
	$cart->user_id = $_SESSION['id'];
	$cart->user_name = $_SESSION['fullname'];
	$cart->product_id = $_SESSION['product_id'];
	$cart->price = $_SESSION['price'];
	$cart->num = 1;
	$cart->create();
	unset($_SESSION['product_id']);
	unset($_SESSION['price']);
	
}
?>