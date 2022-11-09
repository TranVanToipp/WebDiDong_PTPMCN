<?php
session_start();
$product_id = $_SESSION['product_id_comments'];
$role_id=0;
if(isset($_SESSION['role_id'])){
	$role_id =  $_SESSION['role_id'];
}

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
	<div class="comment_item--hienthi">
		<div class="comment_item-content">
			<div class="comment_item--info">
				<span class="comment_item--name">
					<strong class="comment_item--name-text">
					'.$item->fullname.'
					</strong>
				</span>
				<div class="comment_item--sao_hienthi">
				';
				if ($item->number_stars == 1) {
					$commentHTML .= '
						<img src="../assets/img/Comment/star-fill.png" alt="">
						<img src="../assets/img/Comment/star-empty.png" class = "img-sao__danhgia" alt="">
						<img src="../assets/img/Comment/star-empty.png" class = "img-sao__danhgia" alt="">
						<img src="../assets/img/Comment/star-empty.png" class = "img-sao__danhgia" alt="">
						<img src="../assets/img/Comment/star-empty.png" class = "img-sao__danhgia" alt="">
					';
				} 
				if ($item->number_stars == 2) {
					$commentHTML .= '
						<img src="../assets/img/Comment/star-fill.png" alt="">
						<img src="../assets/img/Comment/star-fill.png" alt="">
						<img src="../assets/img/Comment/star-empty.png" class = "img-sao__danhgia" alt="">
						<img src="../assets/img/Comment/star-empty.png" class = "img-sao__danhgia" alt="">
						<img src="../assets/img/Comment/star-empty.png" class = "img-sao__danhgia" alt="">
					';
				}
				if ($item->number_stars == 3) {
					$commentHTML .= '
						<img src="../assets/img/Comment/star-fill.png" alt="">
						<img src="../assets/img/Comment/star-fill.png" alt="">
						<img src="../assets/img/Comment/star-fill.png" alt="">
						<img src="../assets/img/Comment/star-empty.png" class = "img-sao__danhgia" alt="">
						<img src="../assets/img/Comment/star-empty.png" class = "img-sao__danhgia" alt="">
					';
				}

				if ($item->number_stars == 4) {
					$commentHTML .= '
						<img src="../assets/img/Comment/star-fill.png" alt="">
						<img src="../assets/img/Comment/star-fill.png" alt="">
						<img src="../assets/img/Comment/star-fill.png" alt="">
						<img src="../assets/img/Comment/star-fill.png" alt="">
						<img src="../assets/img/Comment/star-empty.png" class = "img-sao__danhgia" alt="">
					';
				}
				if ($item->number_stars == 5) {
					$commentHTML .= '
						<img src="../assets/img/Comment/star-fill.png" alt="">
						<img src="../assets/img/Comment/star-fill.png" alt="">
						<img src="../assets/img/Comment/star-fill.png" alt="">
						<img src="../assets/img/Comment/star-fill.png" alt="">
						<img src="../assets/img/Comment/star-fill.png" alt="">
					';
				}
				$commentHTML .='
				</div>
					<span class="comment_item--thoigian">
					'.$item->time_comment.'
					</span>
				
				</div>
				<div class = "comment_item--admin__group">
					<a href="" class = "comment_item--admin__xoa">Xóa</a>
					<a href="" class = "comment_item--admin__traloi">Trả lời</a>
				</div>
				
		</div>
		<div class="comment_content--noidung">
		
			'.$item->content_comment.'
		</div>';
		if($role_id == 1){
			$commentHTML .='<a class = "comment_content--adminrep__traloi">trả lời</a>
	</div>';
		}
	$commentHTML .= getCommentReply($product_id, $item->id);
}
echo $commentHTML;

function getCommentReply($product_id,$parentId = 0, $marginLeft = 0) {
	$url_reply = 'http://localhost/webDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/PHPREST/api/comment/selectCommentReply.php?product_id='.$product_id.'&parent_id='.$parentId;
	$json_reply = file_get_contents($url_reply);
	$data_reply = json_decode($json_reply);
	$commentHTML = '';
	if(isset($data_reply->data)) {
		foreach($data_reply->data as $reply){
			if($parentId != 0){
				
				$commentHTML .='
				<div class="wrapper-admin-rep">
					<div class="wrapper_comment_content">
						<div class="comment-info__admin">
							<div class="comment-info__admin-name">
								<span class="comment-info__admin-name-text">
									'.$reply->fullname.'
								</span>
								<span class="comment-info__admin-name-title">
									QTV
								</span>
							</div>
							<div class="comment_content-noidung__admin">
								'.$reply->content_comment.'
							</div>
						</div>
					</div>
				</div>';
			}
			else{
				$commentHTML .= '
				<div class="comment_item--hienthi">
					<div class="comment_item-content">
						<div class="comment_item--info">
							<span class="comment_item--name">
								<strong class="comment_item--name-text">
								'.$reply->fullname.'
								</strong>
							</span>
							<div class="comment_item--sao_hienthi">';
							if ($reply->number_stars == 1) {
								$commentHTML .= '
								<img src="../assets/img/Comment/star-fill.png" alt="">
								<img src="../assets/img/Comment/star-empty.png" class = "img-sao__danhgia" alt="">
								<img src="../assets/img/Comment/star-empty.png" class = "img-sao__danhgia" alt="">
								<img src="../assets/img/Comment/star-empty.png" class = "img-sao__danhgia" alt="">
								<img src="../assets/img/Comment/star-empty.png" class = "img-sao__danhgia" alt="">
								';
							} 
							if ($reply->number_stars == 2) {
								$commentHTML .= '
									<img src="../assets/img/Comment/star-fill.png" alt="">
									<img src="../assets/img/Comment/star-fill.png" alt="">
									<img src="../assets/img/Comment/star-empty.png" class = "img-sao__danhgia" alt="">
									<img src="../assets/img/Comment/star-empty.png" class = "img-sao__danhgia" alt="">
									<img src="../assets/img/Comment/star-empty.png" class = "img-sao__danhgia" alt="">
								';
							}
							if ($reply->number_stars == 3) {
								$commentHTML .= '
									<img src="../assets/img/Comment/star-fill.png" alt="">
									<img src="../assets/img/Comment/star-fill.png" alt="">
									<img src="../assets/img/Comment/star-fill.png" alt="">
									<img src="../assets/img/Comment/star-empty.png" class = "img-sao__danhgia" alt="">
									<img src="../assets/img/Comment/star-empty.png" class = "img-sao__danhgia" alt="">
								';
							}

							if ($reply->number_stars == 4) {
								$commentHTML .= '
									<img src="../assets/img/Comment/star-fill.png" alt="">
									<img src="../assets/img/Comment/star-fill.png" alt="">
									<img src="../assets/img/Comment/star-fill.png" alt="">
									<img src="../assets/img/Comment/star-fill.png" alt="">
									<img src="../assets/img/Comment/star-empty.png" class = "img-sao__danhgia" alt="">
								';
							}
							if ($reply->number_stars == 5) {
								$commentHTML .= '
									<img src="../assets/img/Comment/star-fill.png" alt="">
									<img src="../assets/img/Comment/star-fill.png" alt="">
									<img src="../assets/img/Comment/star-fill.png" alt="">
									<img src="../assets/img/Comment/star-fill.png" alt="">
									<img src="../assets/img/Comment/star-fill.png" alt="">
								';
							}
							';
							</div>
							<span class="comment_item--thoigian">
								'.$reply->time_comment.'
							</span>
						</div>
					</div>
					<div class="comment_content--noidung">
						'.$reply->content_comment.'
					</div>';
				if($role_id == 1){
					$commentHTML .='<div>trả lời</div>
					</div>';
				}
			}
			$commentHTML .= getCommentReply($product_id, $reply->id, $marginLeft);
		}
	}
	return $commentHTML;
}
?>
