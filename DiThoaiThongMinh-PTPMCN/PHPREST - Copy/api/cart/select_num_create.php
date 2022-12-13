<?php

//headers
header('Access-Control-Allow-Origin:*');//cho phép yêu cầu HTTP
header('Content-Type: application/json; charset=utf8');


include_once('../../core/initialize.php');

//khởi tạo cart
$cart = new cart($db);

$cart->user_id = isset($_GET['user_id']) ? $_GET['user_id'] : die();
$cart->product_id = isset($_GET['product_id']) ? $_GET['product_id'] : die();
//product query
$cart->select_num_create();
if(isset($cart->id)){
	$cart_item = array(
		'id' 	=>$cart->id,
		'user_id' =>$cart->user_id,
		'user_name' =>$cart->user_name,
		'product_id' =>$cart->product_id,
		'num' =>$cart->num,
		'price' =>$cart->price
	);
	//chuyển đổi sang dạng JSON
	$json = json_encode($cart_item,JSON_UNESCAPED_UNICODE);
	echo $json;
}else{
	echo json_encode(array('message' => 'No product found.'));
}
?>