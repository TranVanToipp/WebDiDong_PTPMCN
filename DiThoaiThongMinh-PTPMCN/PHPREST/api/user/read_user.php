<?php
//headers
header('Access-Control-Allow-Origin:*');//cho phép yêu cầu HTTP



include_once('../../core/initialize.php');

//khởi tạo user
$user = new user($db);

//product query
$result = $user->read_User();

//lấy số hàng
$num = $result->rowCount();
if($num >0){
	$user_arr = array();
	$user_arr['data'] = array();
	//tìm nạp hàng tiếp theo dưới dạng một mảng được lập chỉ mục theo tên cột
	while($row = $result->fetch(PDO::FETCH_ASSOC)){
		extract($row);
		$user_item = array(
			'id' 	=>$id,
			'fullname' =>$fullname,
			'email' =>$email,
			'phone_number' =>$phone_number,
			'address' =>$address,
			'userName' =>$userName,
			'password' =>$password,
			'role_id' =>$role_id,
			'created_at' =>$created_at
		);
		array_push($user_arr['data'],$user_item);
	}
	$json = json_encode($user_arr,JSON_UNESCAPED_UNICODE);
	echo $json;
}
?>