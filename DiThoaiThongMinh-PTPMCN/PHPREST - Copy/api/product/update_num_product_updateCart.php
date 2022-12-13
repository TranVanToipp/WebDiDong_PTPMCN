<?php
session_start();
header('Access-Control-Allow-Origin:*');//cho phép yêu cầu HTTP
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type, Access-Control-Allow-Methods,Authorization,X-Requested-With');


include_once('../../core/initialize.php');

$cart = new cart($db);
$product = new product($db);
$product_update = new product($db);
$product->id = isset($_GET['id']) ? $_GET['id'] : die();
$product_update->id = isset($_GET['id']) ? $_GET['id'] : die();
isset($_GET['num']) ? $_GET['num'] : die();
isset($_GET['id_cart']) ? $_GET['id_cart'] : die();
$url='http://localhost/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/PHPREST/api/cart/select_num.php?id='.$_GET['id_cart'];
$json = file_get_contents($url);
$data = json_decode($json);
//product query
$product->read_single();
$product_update->num = $product->num + $data->num - $_GET['num'];
if($product_update->num > 0){
	if($product_update->update_num_product()){
		update();
		header('Location:../../../../../../WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/cart');
	}
} else if($product_update->num == 0){
	if($product_update->update_num_product()){
		update();
		//delete sản phẩm
		header('Location:../../../../../../WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/PHPREST/api/product/delete_product.php?id='.$product_update->id);
	}
}else {
	echo 'số lượng không hợp lệ';
}
function update(){
	//lấy dữ liệu
	
	$cart->id = $data->id;
	$cart->price = $data->price * $_GET['num'];
	$cart->num = $_GET['num'];
	$cart->update();
}
?>