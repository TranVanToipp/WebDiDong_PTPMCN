<?php

//headers
header('Access-Control-Allow-Origin:*');//cho phép yêu cầu HTTP
header('Content-Type: application/json; charset=utf8');


include_once('../../core/initialize.php');

//khởi tạo product
$product_type = new product_type($db);

//product query
$result = $product_type->read_type();

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
			'name'=>$name,
		);
		array_push($product_arr['data'],$product_item);
	}
	//chuyển đổi sang dạng JSON
	$json = json_encode($product_arr,JSON_UNESCAPED_UNICODE);
	echo $json;
}else{
	echo json_encode(array('message' => 'No product found.'));
}
?>