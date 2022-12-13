<?php
session_start();
include_once("config.php");
include_once("class_comment.php");
$comment = new comment($db);
$comment_reply = new comment($db);
if(!empty($_POST["comment"]) && !empty($_POST["fullname"])){

	$parent_id		= $_POST['commentId'];
    $user_id		= $_SESSION['id'];
    $product_id		= $_SESSION['product_id_comments'];
    $content_comment=  $_POST['comment'];
	if(isset($_POST['rating'])){
		$number_stars	= $_POST['rating'];
	}
	else{
		$number_stars	= 0;
	}
	
	$comment->parent_id		= $parent_id;
	$comment->user_id		= $user_id;
	$comment->product_id 	= $product_id;
	$comment->content_comment = $content_comment;
	$comment->number_stars 	= $number_stars;
	if($comment->insertComment()){
		$url = 'http://localhost/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/PHPREST/api/comment/selectCommentNewDate.php';
		$json = file_get_contents($url);
		$data = json_decode($json);
		$url_id = 'http://localhost/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/PHPREST/api/user/select_user_id.php';
		$json_id = file_get_contents($url_id);
		$data_id = json_decode($json_id);
		$user_id_admin = 0;
		foreach($data_id->data as $admin){
			$user_id_admin = $admin->id;
		}
		if($number_stars>3){
			foreach($data->data as $item){
				$comment_reply->parent_id		= $item->id;
				$comment_reply->user_id		= $user_id_admin;
				$comment_reply->product_id 	= $product_id;
				$comment_reply->content_comment = "Cảm ơn bạn đã ủng hộ shop";
				$comment_reply->number_stars 	= 0;
				
				if($user_id == $user_id_admin){
				}
				else{
					$comment_reply->insertComment();
				}
			}
		}else{
			foreach($data->data as $item){
				$comment_reply->parent_id		= $item->id;
				$comment_reply->user_id		= $user_id_admin;
				$comment_reply->product_id 	= $product_id;
				$comment_reply->content_comment = "Nếu Bạn có chỗ nào không hài lòng về sản phẩm của chúng tôi, Vui lòng liên hệ số điện thoại: 0123456789 của chúng tôi để được tư vấn trực tiếp";
				$comment_reply->number_stars 	= 0;
				
				if($user_id == $user_id_admin){
				}
				else{
					$comment_reply->insertComment();
				}
			}
		}
	}
	$message = '<label class="text-success">Comment posted Successfully.</label>';
	$status = array(
		'error'  => 0,
		'message' => $message
	);
	echo json_encode($status);
} else {
	$message = '<label class="text-danger">Error: Comment not posted.</label>';
	$status = array(
		'error'  => 1,
		'message' => $message
	);
	echo json_encode($status);
}

?>