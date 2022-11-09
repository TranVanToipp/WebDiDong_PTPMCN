<?php
  //headers
header('Access-Control-Allow-Origin:*');//cho phép yêu cầu HTTP
header('Content-Type: application/json; charset=utf8');

include_once('../../core/initialize.php');

//khởi tạo user
$user = new user($db);
//product query
$result = $user->select_user_id();
//lấy số hàng
$num = $result->rowCount();
if($num >0){
	$users_arr = array();
	$users_arr['data'] = array();
	//tìm nạp hàng tiếp theo dưới dạng một mảng được lập chỉ mục theo tên cột
	while($row = $result->fetch(PDO::FETCH_ASSOC)){
		extract($row);
		$user_item = array(
			'id' 	=>$id,
		);
		array_push($users_arr['data'],$user_item);
	}
	//chuyển đổi sang dạng JSON
	$json = json_encode($users_arr,JSON_UNESCAPED_UNICODE);
	echo $json;
}else{
	echo json_encode(array('message' => 'No product found.'));
}
?>