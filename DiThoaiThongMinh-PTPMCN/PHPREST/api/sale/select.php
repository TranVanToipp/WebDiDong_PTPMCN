<?php

//headers
header('Access-Control-Allow-Origin:*');//cho phép yêu cầu HTTP
header('Content-Type: application/json; charset=utf8');


include_once('../../core/initialize.php');

//khởi tạo product
$discount_sale = new discount_sale($db);
$discount_sale->id_product_sale = isset($_GET['id']) ? $_GET['id'] : die();
//product query
$result = $discount_sale->select_single();

//lấy số hàng
$num = $result->rowCount();
if($num >0){
	$sale_arr = array();
	$sale_arr['data'] = array();
	//tìm nạp hàng tiếp theo dưới dạng một mảng được lập chỉ mục theo tên cột
	while($row = $result->fetch(PDO::FETCH_ASSOC)){
		extract($row);
		$sale_item = array(
			'id' 	=>$id,
			'id_product_sale'=>$id_product_sale,
			'discount_product_sale' =>$discount_product_sale,
            'number_sale'=>$number_sale,
            'num_buy'=>$num_buy,
            'status_sale'=>$status_sale,
            'time_sale' => $time_sale,
            'time_salestop' => $time_salestop,
		);
		array_push($sale_arr['data'],$sale_item);
	}
	//chuyển đổi sang dạng JSON
	$json = json_encode($sale_arr,JSON_UNESCAPED_UNICODE);
	echo $json;
}else{
	echo json_encode(array('message' => 'No product found.'));
}
?>