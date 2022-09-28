<?php

//headers
header('Access-Control-Allow-Origin:*');//cho phép yêu cầu HTTP
header('Content-Type: application/json');


include_once('../../core/initialize.php');

//khởi tạo product
$product = new product($db);

$product->id = isset($_GET['id']) ? $_GET['id'] : die();
//product query
$product->read_single();

$product_arr = array(
	'id' 	=>$product->id,
	'product_type_name' =>$product->product_type_name,
	'title' =>$product->title,
	'price' =>$product->price,
	'discount' =>$product->discount,
	'thumnail' =>$product->thumnail,
	'description' =>html_entity_decode($product->description),//chuyển đổi các kí hiệu HTML entities thành các kí tự tương ứng
	'description2' =>html_entity_decode($product->description2),
	'created_at' =>$product->created_at,
);
	//chuyển đổi sang dạng JSON
	echo json_encode($product_arr);
?>