<?php
session_start();
$product_id = $_SESSION['product_id_comments'];
$role_id = $_SESSION['role_id'];
$url = 'http://localhost/webDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/PHPREST/api/comment/selectComment.php?product_id='.$product_id;
$json = file_get_contents($url);
$data = json_decode($json);
$commentHTML = '';
if(isset($data->message)){
	$commentHTML = '';
	die();
}
foreach($data->data as $item){
	$commentHTML .= '
		<div class="panel panel-primary">
		<div class="panel-heading">By <b>'.$item->fullname.'</b> <i>hiển thị sao '.$item->number_stars.'</i> on <i>'.$item->time_comment.'</i></div>
		<div class="panel-body">'.$item->content_comment.'</div>';
		if($role_id == 1){
			$commentHTML .= '<div class="panel-footer" align="right"><button type="button" class="btn btn-primary reply" id="'.$item->id.'">Trả lời</button></div>';
		}
	$commentHTML .= '</div> ';
	$commentHTML .= getCommentReply($product_id, $item->id);
}
echo $commentHTML;

function getCommentReply($product_id,$parentId = 0, $marginLeft = 0) {
	$url_reply = 'http://localhost/webDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/PHPREST/api/comment/selectCommentReply.php?product_id='.$product_id.'&parent_id='.$parentId;
	$json_reply = file_get_contents($url_reply);
	$data_reply = json_decode($json_reply);
	$commentHTML = '';
	if($parentId == 0) {
		$marginLeft = 0;
	} else {
		$marginLeft = $marginLeft + 48;
	}
	if(isset($data_reply->data)) {
		foreach($data_reply->data as $reply){
			$commentHTML .= '
				<div class="panel panel-primary" style="margin-left:'.$marginLeft.'px">
				<div class="panel-heading">By <b>'.$reply->fullname.'</b>';
				if($parentId ==0){
					$commentHTML .= ' <i>hiển thị sao '.$reply->number_stars.'</i> on <i>'.$comment["date"].'</i></div>';
				}
				else{
					$commentHTML .= ' on <i>'.$reply->time_comment.'</i></div>';
				}
				$commentHTML .= '
				<div class="panel-body">'.$reply->content_comment.'</div>
				<div class="panel-footer" align="right"><button type="button" class="btn btn-primary reply" id="'.$reply->id.'">Trả lời</button></div>
				</div>
				';
			$commentHTML .= getCommentReply($product_id, $reply->id, $marginLeft);
		}
	}
	return $commentHTML;
}
?>