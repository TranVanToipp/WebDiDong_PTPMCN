<?php

//headers
header('Access-Control-Allow-Origin:*');//cho phép yêu cầu HTTP
header('Content-Type: application/json');



include_once('../../core/initialize.php');

$cart = new cart($db);
$cart->id = isset($_GET['id']) ? $_GET['id'] : die();

$url = 'http://localhost/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/PHPREST/api/cart/select_num.php?id='.$cart->id;
$json = file_get_contents($url);
$data = json_decode($json);
//create User
if($cart->deletes()){
	$product = new product($db);
	$product_update = new product($db);
	$product->id = $data->product_id;
	$product_update->id = $data->product_id;
	$product->read_single();
	$product_update->num = $product->num + $data->num;
	$product_update->update_num_product();
	header('Location:../../../../../../WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/cart');
}
else {echo 'error';}

?>