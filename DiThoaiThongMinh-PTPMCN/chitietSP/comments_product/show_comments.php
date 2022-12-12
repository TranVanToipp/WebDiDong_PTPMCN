
<?php
session_start();
$path ="../../../../../";
$product_id = $_SESSION['product_id_comments'];
$role_id = 0;
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
	$i=0;
	$j=0;
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
				for($i;$i<$item->number_stars;$i++){
					$commentHTML .= '
						<img src="../assets/img/Comment/star-fill.png" alt="">';
				}
				$stars = 5 - $item->number_stars;
				if($stars > 0){
					for($j;$j<$stars;$j++){
					$commentHTML .= '
						<img src="../assets/img/Comment/star-empty.png" class = "img-sao__danhgia" alt="">';
					}
				}
				$commentHTML .='
				</div>
					<span class="comment_item--thoigian">
					'.$item->time_comment.'
					</span>
				</div>';
				if($role_id == 1){
					$commentHTML .='
						<div class = "comment_item--admin__group">
							<a href="'.$path.'WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/PHPREST/api/comment/deleteComment.php?id='.$item->id.'" class = "comment_item--admin__xoa">Xóa</a>
							<button class = "comment_item--admin__traloi reply" id="'.$item->id.'">Trả lời</button>
						</div>';
				}
				$commentHTML .='
						<div class="comment_content--noidung">
						
							'.$item->content_comment.'
						</div>';
	$commentHTML .= getCommentReply($product_id, $item->id);
}
echo $commentHTML;

function getCommentReply($product_id,$parentId = 0, $marginLeft = 0) {
	$url_reply = 'http://localhost/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/PHPREST/api/comment/selectCommentReply.php?product_id='.$product_id.'&parent_id='.$parentId;
	$json_reply = file_get_contents($url_reply);
	$data_reply = json_decode($json_reply);
	$path ="../../../../../";
	$product_id = $_SESSION['product_id_comments'];
	$role_id = 0;
	if(isset($_SESSION['role_id'])){
		$role_id =  $_SESSION['role_id'];
	}
	$commentHTML = '';
	if(isset($data_reply->data)) {
		foreach($data_reply->data as $reply){
			$i=0;
			$j=0;
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
							<div class = "comment_item--admin__group">';
							if($role_id == 1){
								$commentHTML .='
									<a href="'.$path.'WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/PHPREST/api/comment/deleteComment.php?id='.$reply->id.'" class = "comment_item--admin__xoa">Xóa</a>';
							}
							$commentHTML .='
								<button class = "comment_item--admin__traloi reply" id="'.$reply->id.'">Trả lời</button>
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
							for($i;$i<$item->number_stars;$i++){
								$commentHTML .= '
									<img src="../assets/img/Comment/star-fill.png" alt="">';
							}
							$stars = 5 - $item->number_stars;
							if($stars > 0){
								for($j;$j<$stars;$j++){
								$commentHTML .= '
									<img src="../assets/img/Comment/star-empty.png" class = "img-sao__danhgia" alt="">';
								}
							}
							$commentHTML .= '
							</div>
							<span class="comment_item--thoigian">
								'.$reply->time_comment.'
							</span>
						</div>';
						if($role_id == 1){
							$commentHTML .='
							<div class = "comment_item--admin__group">
								<a href="'.$path.'WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/PHPREST/api/comment/deleteComment.php?id='.$item->id.'" class = "comment_item--admin__xoa">Xóa</a>
								<button class = "comment_item--admin__traloi reply" id="'.$item->id.'">Trả lời</button>
							</div>';
						}
						$commentHTML .='
							<div class="comment_content--noidung">
								'.$item->content_comment.'
							</div>';
			}
			$commentHTML .= getCommentReply($product_id, $reply->id, $marginLeft);
		}
	}
	return $commentHTML;
}
?>
