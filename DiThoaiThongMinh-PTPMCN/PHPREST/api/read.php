<?php

//headers
header('Access-Control-Allow-Origin:*');//cho phép yêu cầu HTTP
header('Content-Type: application/json');


include_once('../core/initialize.php');

//khởi tạo product
$product = new product($db);

//product query
$result = $product->read();

//lấy số hàng
$num = $result->rowCount();
if($num >0){
	$product_arr = array();
	$product_arr['data'] = array();
	//tìm nạp hàng tiếp theo dưới dạng một mảng được lập chỉ mục theo tên cột
	while($row = $result->fetch(PDO::FETCH_ASSOC)){
		extract($row);
		$product_item = array(
			'id' 	=>$id,
			'product_type_name' =>$product_type_name,
			'title' =>$title,
			'price' =>$price,
			'discount' =>$discount,
			'thumnail' =>$thumnail,
			'description' =>html_entity_decode($description),//chuyển đổi các kí hiệu HTML entities thành các kí tự tương ứng
			'description2' =>$description2,
			'created_at' =>$created_at
		);
		array_push($product_arr['data'],$product_item);
	}
	//chuyển đổi sang dạng JSON
	echo json_encode($product_arr);
}else{
	echo json_encode(array('message' => 'No product found.'));
}
?>