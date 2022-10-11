<?php

//headers
header('Access-Control-Allow-Origin:*');//cho phép yêu cầu HTTP
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type, Access-Control-Allow-Methods,Authorization,X-Requested-With');


include_once('../../core/initialize.php');

$cart = new cart($db);
//lấy dữ liệu
$data = json_decode(file_get_contents("input.txt"));

$cart->user_id = $data->user_id;
$cart->user_name = $data->user_name;
$cart->product_id = $data->product_id;
$cart->price = $data->price;
$cart->num = $data->num;
//create User
if($cart->create()){
	header('Location:../../../../../../WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/cart');
}
else {echo 'error';}
?>