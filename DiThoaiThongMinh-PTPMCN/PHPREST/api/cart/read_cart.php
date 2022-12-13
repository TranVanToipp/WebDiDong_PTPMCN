<?php

//headers
header('Access-Control-Allow-Origin:*');//cho phép yêu cầu HTTP
header('Content-Type: application/json; charset=utf8');


include_once('../../core/initialize.php');

//khởi tạo cart
$cart = new cart($db);

$cart->user_id = isset($_GET['user_id']) ? $_GET['user_id'] : die();
//product query
$result = $cart->select();

//lấy số hàng
$num = $result->rowCount();
if($num >0){
	$cart_arr = array();
	$cart_arr['data'] = array();
	//tìm nạp hàng tiếp theo dưới dạng một mảng được lập chỉ mục theo tên cột
	while($row = $result->fetch(PDO::FETCH_ASSOC)){
		extract($row);
		$cart_item = array(
			'id' 	=>$id,
			'user_id' =>$user_id,
			'user_name' =>$user_name,
			'product_id' =>$product_id,
            'title'=>$title,
            'num'=>$num,
			'price' =>$price,
			'discount' =>$discount,
			'thumnail' =>$thumnail
		);
		array_push($cart_arr['data'],$cart_item);
	}
	//chuyển đổi sang dạng JSON
	$json = json_encode($cart_arr,JSON_UNESCAPED_UNICODE);
	echo $json;
}else{
	echo json_encode(array('message' => 'No product found.'));
}
?>