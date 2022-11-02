<?php

//headers
header('Access-Control-Allow-Origin:*');//cho phép yêu cầu HTTP
header('Content-Type: application/json; charset=utf8');


include_once('../../core/initialize.php');

//khởi tạo comments
$comment = new comment($db);

$comment->product_id = isset($_GET['product_id']) ? $_GET['product_id'] : die();

$result = $comment->selectAllComment();

//lấy số hàng
$num = $result->rowCount();
if($num >0){
	$comment_arr = array();
	$comment_arr['data'] = array();
	//tìm nạp hàng tiếp theo dưới dạng một mảng được lập chỉ mục theo tên cột
	while($row = $result->fetch(PDO::FETCH_ASSOC)){
		extract($row);
		$comment_item = array(
			'id' 	=>$id,
			'parent_id' =>$parent_id,
			'user_id' =>$user_id,
			'fullname' =>$fullname,
			'product_id' =>$product_id,
			'content_comment' =>html_entity_decode($content_comment),
			'number_stars' =>$number_stars,
			'time_comment' =>$time_comment
		);
		array_push($comment_arr['data'],$comment_item);
	}
	//chuyển đổi sang dạng JSON
	$json = json_encode($comment_arr,JSON_UNESCAPED_UNICODE);
	echo $json;
}else{
	echo json_encode(array('message' => 'No product found.'));
}
?>