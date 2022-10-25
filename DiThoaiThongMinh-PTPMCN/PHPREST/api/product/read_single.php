<?php

//headers
header('Access-Control-Allow-Origin:*');//cho phép yêu cầu HTTP
header('Content-Type: application/json');


include_once('../../core/initialize.php');

//khởi tạo product
$product = new product($db);
$product_img = new product($db);
$product_discount = new product($db);
$product->id = isset($_GET['id']) ? $_GET['id'] : die();
$product_img->id = isset($_GET['id']) ? $_GET['id'] : die();
$product_discount->id = isset($_GET['id']) ? $_GET['id'] : die();
//product query
$product->read_single();
$result = $product_img->img_desct();
$result_discount = $product_discount->discount();
$product_arr['data'] = array();
$num = $result->rowCount();
$num2 = $result_discount->rowCount();
$dis_arr['dis'] = array();
if($num2 > 0) {
	while($row = $result_discount->fetch(PDO::FETCH_ASSOC)){
		extract($row);
		$discount_item = array(
			'product_id' =>$id,
			'discount_text' => $discount_text
		);
		array_push($dis_arr['dis'],$discount_item);
	}
}
$img_arr['img'] = array();
if($num > 0){
	while($row = $result->fetch(PDO::FETCH_ASSOC)){
		extract($row);
		$img_item = array(
			'product_id' =>$id,
			'img_desct' => $img_desct
		);
		array_push($img_arr['img'],$img_item);
	}
}
//nếu trên url người dùng nhập 1 id mà sản phẩm chưa được tạo ra thì ko hiển thị
if(isset($product->created_at)){
	$product = array (
		'id' 	=>$product->id,
		'product_type_name' =>$product->product_type_name,
		'title' =>$product->title,
		'price' =>$product->price,
		'discount' =>$product->discount,
		'num' =>$product->num,
		'thumnail' =>$product->thumnail,
		'description' =>html_entity_decode($product->description),//chuyển đổi các kí hiệu HTML entities thành các kí tự tương ứng
		'description2' =>html_entity_decode($product->description2),
		'created_at' =>$product->created_at,
		'img' =>$img_arr['img'],
		'discount_text' => $dis_arr['dis'],
	);
	array_push($product_arr['data'],$product);
	//chuyển đổi sang dạng JSON
	echo json_encode($product_arr);
}
else{
	echo json_encode(array('message' => 'No product found.'));
}
	
?>