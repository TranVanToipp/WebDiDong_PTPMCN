<?php
	ob_start();
    $title = 'chi tiết sản phẩm';
	$baseUrl = '../';
	include_once ($baseUrl.'FE/Layout/header.php');
    $fullname = "";
    $id_user = "";
	$id = $_GET['id'];
    if(isset($_SESSION['fullname']) && isset($_SESSION['id'])){
        $fullname = $_SESSION['fullname'];
        $id_user = $_SESSION['id'];
    }
	$url1 = 'http://localhost/webDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/PHPREST/api/comment/selectComment.php?product_id='.$id;
	$json1 = file_get_contents($url1);
	$data1 = json_decode($json1);
	$length=0;
	$sum_stars=0;
	$sum = 0;
	if(isset($data1->data)){
		foreach($data1->data as $item){
			$sum_stars += $item->number_stars;
			$length+=1;
		}
	$sum = $sum_stars/$length;
	}
?>
<?php 
include_once('../PHPREST/core/initialize.php');
?>
<?php
$url1 = "http://localhost/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/PHPREST/api/tinhTP/select_devvinALL.php";
$json1 = file_get_contents($url1);
$data11 = json_decode($json1);
?>

<link rel="stylesheet" href="/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/FE/Layout/css/chitiet.css">
<link rel="stylesheet" href="/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/FE/Layout/css/cart.css">
<script src = " https://code.jquery.com/jquery-3.1.1.min.js "></script>
<script src="comments_product/js/comments.js"></script>
<div class="grid wide">
    <div class="chitiet-chitiet ">
		<div class="form-active-chitiet ">
			<?php
				if(isset($_GET['id'])){
					$id = $_GET['id'];
					$_SESSION['product_id_comments'] = $id;
					$url = 'http://localhost/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/PHPREST/api/product/read_single.php?id='.$id;
					$json = file_get_contents($url);
					$data = json_decode($json);
					$name = '';
					if(isset($data->message)){
						header('Location:../../../../WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/');
						die();
					}
					foreach($data->data as $item){
						$name = $item->title;
						echo '<div class="header-chitiet-content">
									<h3>
										'.$item->title.'
									</h3>
								</div> 
								<div class="chitiet-container l-12 m-12 c-12">
									<div class="chitiet-container-img-content l-4">
										<div class="chitiet-container-img">
											<div class="chitiet-container-above">
												<img src="../assets/photos/'.$item->thumnail.'" alt="Điện thoại hình ảnh ở trên" class="chitiet-container-above-img">
											</div>
											
											<ul class="chitiet-container-below">
											<li class="chitiet-container-below-img">
												<a href="#" class="chitiet-container-link">
													<div class="chitiet-container-hinhnho">
														<img src="../assets/img/icon_hot.svg" alt="icon hot" class="chitiet-container-below-img-concon">
													</div>
													<span class = "chitiet-container-tenhinh">Điểm nổi bật</span>
												</a>
											</li>
											';
					}
								foreach($data->data as $item){
									foreach($item->img as $img){
										echo '
											
											<li class="chitiet-container-below-imgimg">
												<a href="#" class="chitiet-container-link">
													<div class="chitiet-container-hinhnho">
														<img src="../assets/photos/'.$img->img_desct.'" alt="Điện thoại hình ảnh ở dưới" class="chitiet-container-below-img-con">
													</div>
													
												</a>
											</li>
											
											';
									}
								}
						foreach($data->data as $item){
									echo '
											<li class="chitiet-container-below-img">
												<a href="#" class="chitiet-container-link">
													<div class="chitiet-container-hinhnho">
														<img src="../assets/img/icon_camera.svg" alt="icon icon_camera" class="chitiet-container-below-img-concon">
													</div>
													<span class = "chitiet-container-tenhinh">Chụp từ camera</span>
												</a>
											</li>
									</ul>
								</div>
							</div>
						<div class="chitiet-container-embrace l-5 m-12 c-12">
							<div class="chitiet-container-price">
										';
									if($_GET['sale'] == 1){
										// echo 'Giảm giá:';
										$url_sale = 'http://localhost/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/PHPREST/api/sale/select_single.php?id='.$id;
										$json_sale = file_get_contents($url_sale);
										$data_sale = json_decode($json_sale);
										foreach($data_sale->data as $item_sale){
											$total_money = ($item_sale->price - $item_sale->price * $item_sale->discount_product_sale/100);
											echo '
												<div class = "flashsale">
													<div class = "top_sale">
															<img src = "../assets/img/magiamgia/flash.svg">
														<div class = "right_sale">
															<img src = "../assets/img/magiamgia/clock.svg">
															<p class = "coun_down">
																"Kết thúc trong"
																<span class = "time_coundown">
																	<span class = "number_ number_day"></span>
																	<span class = "number_ number_hour"></span>
																	<span class = "number_ number_mili"></span>
																	<span class = "number_ number_secon"></span>
																</span>
															</p>
														</div>
													</div>
													<div class="mid_sale">
														<span class = "price_now">'.$item_sale->price.'</span><sup class = "sub-chitiet">đ</sup>
														<span class = "_price">'.($item_sale->price - $item_sale->price * $item_sale->discount_product_sale/100).'đ</span>
														<span class = "discount_sale">'.$item_sale->discount_product_sale.'%</span>
													</div>
												</div>
											';
										}
									}else{
										echo '
									<h3>Giá: </h3>
										<div class="gia-chitiet">
											<h4 class = "gia-chitiet__1">'.($item->price-$item->price*$item->discount/100).'</h4><sup class = "sub-chitiet">đ</sup>
											<h4 class = "gia-chitiet__2">'.$item->price.'</h4><sup>đ</sup>
										</div>';
									}
								echo '
									</div>
									<div class="chitiet-container-nhandat">
										<span>Nhận đặt trước</span>
									</div>
							
										
											<div class="chitiet-container-chitiet-khuyenmai">
												<h4>Khuyến Mãi</h4>
												
												<ul class="chitiet-container-chitiet-khuyenmai-list">';
												foreach($data->data as $item){
													foreach($item->discount_text as $dis){
														echo '
														<li class="chitiet-container-chitiet-khuyenmai-item">
															'.$dis->discount_text.'
														</li>
														';
													}
												}
									 			foreach($data->data as $item){
													echo '
													</ul>
													</div>
													<form action="#" method ="post">
														<input type="hidden" name="Hinhanh" value="'.$item->thumnail.'" >
														<input type="hidden" name="Giasp" value="'.$item->price.'">';
														if($_GET['sale'] == 0)
															echo '
															<input type="hidden" name="Giamsale" value="'.$item->discount.'">';
														if($_GET['sale'] == 1){
															foreach($data_sale->data as $item){
																echo'
																<input type="hidden" name="Giamsale" value="'.$item->discount_product_sale.'">';
															}
														}
														echo'
														<input type="hidden" name="Tensp" value="'.$item->title.'">
														<input type="hidden" name="idSanPham" value="'.$item->id.'">';
														if (isset($_GET['sale'])) {
															if ($_GET['sale']==1){
															echo '
															<h3 class="h3_title_from--giohang">
																Thông tin mua hàng
															</h3>
															<div class="check-box__gioitinh">
																<label for="" class="gender1">
																	<input type="radio" value="male" name="gender" id="gender1" checked="checked">
																	<span>Anh</span>
																</label>
																<label for="" class="gender0">
																	<input type="radio" value="female" name="gender" id="gender0">
																	<span>Chị</span>
																</label>
															</div>
															<div class="form-input__muahang l-12 c-12">
																<div class="form-input__hoten l-6 c-12">
																	<input type="text" name="name" id="name" placeholder="Họ tên">
																	<br>
																</div>
																<div class="form-input__sdt l-6 c-12">
																	<input type="text" name="telephone" id="telephone" placeholder="Số điện thoại">
																	<br>
																</div>
															</div>

															<div class="giohang_cachthuc--mua">
																<h3 class="h3-title-cachthuc">Chọn cách thức mua hàng</h3>
																<div class="typeReceive">
																	<label class = "typeReceive-giaohangtannoi" for="" title="Giao hàng tận nơi">
																		<input type="radio" name="receive" id="receive0">
																		<span>Giao hàng tận nơi</span>
																	</label>
																	<label class = "typeReceive-giaohangtannoi" for="receive1">
																		<input type="radio" name="receive" id="receive1" value="2">
																		<span>Nhận tại cữa hàng</span>
																	</label>
																</div>

															</div>
															<div class="tabReceive">
																<div class="mainTab">
																	<p class="tab-title">
																		Chọn địa chỉ để biết thời gian và phí vận chuyển (nếu có) 
																	</p>
																	<div class="row-giohang__tab l-12 c-12">
																		<div class="l-6 c-12 select_giohang-group">
																			<select name="matp" class="select_giohang-tinh" id="matp">
																				<option value="#" class="option-giohang__tinh1">
																				Tỉnh/Thành phố    
																				</option>';
																					foreach($data11->data as $item){
																						echo '<option value="'.$item->matp.'"class="option-giohang__tinh2">'.$item->name.'</option>';
																					}
																				echo '
																			</select>
																		</div>
																		<div class="l-6 c-12 select_giohang-group">
																			<select class="select_giohang-quan" name="maqh" id="maqh">
																				<option value="#" class="option_giohang-quan">
																					Quận/Huyện
																				</option>
																			</select>
																		</div>
																	</div>
																	<div class="row-giohang__tab-Phuong l-12 c-12">
																		<div class="l-6 c-12 select_giohang-group">
																			<select name="phuongxa" id="phuongxa" class="select-giohang__phuong">
																				<option value="#" class="option-giohang__phuong">
																					Phường/Xã
																				</option>
																			</select>
																		</div>
																		<div class="l-6 c-12 select_giohang-group">
																				<input name ="note" class="option-giohang__sonha" placeholder = "Số nhà tên đường">
																				</input>
																				<!-- Chỗ này nhập -->
																		   
																		</div>
																	</div>
																</div>
															</div>
															<div class="dathang-content">
																<div class="header_dathang">
																	<span class="heading-text">Tổng tiền:</span>
																	<span class="heading-text__gia">';echo $total_money.'₫';echo '</span>
																</div>
															</div>';
															} 
														}
														if($_GET['sale'] == 0){
															echo 
																'<input class="chitiet-container-type-btn" type="submit" name="add_cart" value="Thêm vào giỏ hàng">';
														}
														if($_GET['sale'] == 1){
															echo 
																'<input class="chitiet-container-type-btn" type="submit" name="add_orders" value="Đặt Hàng">';
														}
													echo '
													</form>
													<div class="chitiet-buton-thanhtoan">
														<button class="chitiet-container-type-btn-tragop-phantram">
														<h4>Mua trả góp 0%</h4>
														<span>Duyệt hồ sơ trong 5 phút </span>
														</button>
		
														<button class="chitiet-container-type-btn-tragop-the" >
														<h4> Trả góp qua thẻ</h4>
														<span>Visa, Mastercart, JCB, Amex</span>
														</button>
													</div>
													<div class="chitiet-container-copy">
														<button class= "chitiet-container-copy-link">
															<span class="chitiet-container-boder">
																<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-link-45deg" viewBox="0 0 16 16">
																	<path d="M4.715 6.542 3.343 7.914a3 3 0 1 0 4.243 4.243l1.828-1.829A3 3 0 0 0 8.586 5.5L8 6.086a1.002 1.002 0 0 0-.154.199 2 2 0 0 1 .861 3.337L6.88 11.45a2 2 0 1 1-2.83-2.83l.793-.792a4.018 4.018 0 0 1-.128-1.287z" />
																	<path d="M6.586 4.672A3 3 0 0 0 7.414 9.5l.775-.776a2 2 0 0 1-.896-3.346L9.12 3.55a2 2 0 1 1 2.83 2.83l-.793.792c.112.42.155.855.128 1.287l1.372-1.372a3 3 0 1 0-4.243-4.243L6.586 4.672z" />
																</svg>
															</span>
															<span>Sao chép đường dẫn</span>
														</button>
														<button class= "chitiet-container-copy-thongtin">
															<span class="chitiet-container-boder">
																<svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-clipboard2" viewBox="0 0 16 16">
																	<path d="M3.5 2a.5.5 0 0 0-.5.5v12a.5.5 0 0 0 .5.5h9a.5.5 0 0 0 .5-.5v-12a.5.5 0 0 0-.5-.5H12a.5.5 0 0 1 0-1h.5A1.5 1.5 0 0 1 14 2.5v12a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 14.5v-12A1.5 1.5 0 0 1 3.5 1H4a.5.5 0 0 1 0 1h-.5Z" />
																	<path d="M10 .5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5.5.5 0 0 1-.5.5.5.5 0 0 0-.5.5V2a.5.5 0 0 0 .5.5h5A.5.5 0 0 0 11 2v-.5a.5.5 0 0 0-.5-.5.5.5 0 0 1-.5-.5Z" />
																</svg>
															</span>
															<span>Sao chép thông tin</span>
														</button>
													</div>
												</div>
												<div class="tinhtrang-content l-3 m-12 c-12">
													<div class = "header__nav-type">
														<img src="../assets/img/thongso.svg" alt="" class="header__nav-tab-img">
														<div class="header__nav-tab-vac">
															<span>Thông số kĩ thuật</span>
														</div>
													</div>
													<table class = "tinhtrang-table__cauhinh">
														<tbody>';
														foreach($data->data as $item){
															foreach($item->conf as $conf){
																echo '
																<tr class = "tr-1" > 
																	<td class = "title_charactestic">Độ phân giải</td>
																	<td class = "content_charactestic">1290 x 2796 pixels</td>
																</tr>
																<tr class = "tr-0">
																	<td class = "title_charactestic">Màn hình rộng</td>
																	<td class = "content_charactestic">'.$conf->screen.'</td>
																</tr>
																<tr class = "tr-1"> 
																	<td class = "title_charactestic">Độ phân giải camera sau</td>
																	<td class = "content_charactestic">'.$conf->rear_camera.'</td>
																</tr>
																<tr class = "tr-0">
																	<td class = "title_charactestic">Độ phân giải camera trước</td>
																	<td class = "content_charactestic">'.$conf->front_camera.'</td>
																</tr>
																<tr class = "tr-1"> 
																	<td class = "title_charactestic">Bộ nhớ trong</td>
																	<td class = "content_charactestic">'.$conf->ram.'</td>
																</tr>
																<tr class = "tr-0">
																	<td class = "title_charactestic">Dung lượng pin</td>
																	<td class = "content_charactestic">'.$conf->pin.'</td>
																</tr>
																<tr class = "tr-0">
																	<td class = "title_charactestic">Sim</td>
																	<td class = "content_charactestic">'.$conf->sim.'</td>
																</tr>
																';
																
															}
														}
															
														foreach($data->data as $item){
															echo '
															</tbody>
															</table>
															<div class= "tinhtrang-button__chitiet">
																<a href="" class="tinhtrang-button__chitiet-link">
																	Xem cấu hình chi tiết
																</a>
															</div>
															</div>
														</div>
													</div>
												</div>';	
														}	
														
													}
												}		
											}
											foreach($data->data as $item){
												echo'
													
												';
											}
										?>
									</div>
									
								</div>
							</div>
							<div class="grid wide">
								<div class="comment_content">
									<!-- Comment -->
									<div class="l-9 c-12 comment_chitiet_content">
									<span id="message"></span>
										<div class="comment_heading">
											<div class="comment_heading-name">
												Đánh giá <?php echo $name;?>
											</div>
										</div> 
										<div class="comment_form_content ">
												<div class="row l-3 c-3">
													<div class="row_cmt--1">
														<p class="row_cmt--col">
															<?php echo round($sum,1);?>
															<span>
																/5
															</span>
														</p>
														<div class="comment_1--start">
															<img src="../assets/img/Comment/star-fill.png" alt="">
															&nbsp;
															<img src="../assets/img/Comment/star-fill.png" alt="">
															&nbsp;
															<img src="../assets/img/Comment/star-fill.png" alt="">
															&nbsp;
															<img src="../assets/img/Comment/star-fill.png" alt="">
															&nbsp;
															<img src="../assets/img/Comment/star-fill.png" alt="">
														</div>
														<p class="cmt_count">
															(<?php echo $length;?> đánh giá )
														</p>
													</div>
												</div>
												<div class="l-6 c-6">
													<div class="row_cmt--2">
														<div class="row_cmt--rating">
														<?php
														if(isset($data1->data)){
															$sum_5s=0;
															$sum_4s=0;
															$sum_3s=0;
															$sum_2s=0;
															$sum_1s=0;
															$i=0;
																foreach($data1->data as $item){
																	if($item->number_stars == 5){
																		$sum_5s +=1;
																	}
																	if($item->number_stars == 4){
																		$sum_4s +=1;
																	}
																	if($item->number_stars == 3){
																		$sum_3s +=1;
																	}
																	if($item->number_stars == 2){
																		$sum_2s +=1;
																	}
																	if($item->number_stars == 1){
																		$sum_1s +=1;
																	}
																	
																}
																for($i;$i<5;$i++){
																	echo '
																	<div class="phantram_sao">
																		<div class="phantram_sao--p">
																			<img src="../assets/img/Comment/star-fill.png" alt="" class="lazy-loaded">
																		</div>
																	</div>';
																}
																$pt = ($sum_5s/$length)*100;
																echo '<div class="row_cmt--progess1">
																	<div class="progress">
																		<div class="progress-bar" style="width:'.round($pt,1).'%">

																		</div>
																	</div>
																</div>
																<p class="phantram-text">
																'.round($pt,1).'%
																</p>';
														}
														else {
															echo '
															<div class="phantram_sao">
																<div class="phantram_sao--p">
																	<img src="../assets/img/Comment/star-fill.png" alt="" class="lazy-loaded">
																</div>
															</div>
															<div class="phantram_sao">
																<div class="phantram_sao--p">
																	<img src="../assets/img/Comment/star-fill.png" alt="" class="lazy-loaded">
																</div>
															</div>
															<div class="phantram_sao">
																<div class="phantram_sao--p">
																	<img src="../assets/img/Comment/star-fill.png" alt="" class="lazy-loaded">
																</div>
															</div>
															<div class="phantram_sao">
																<div class="phantram_sao--p">
																	<img src="../assets/img/Comment/star-fill.png" alt="" class="lazy-loaded">
																</div>
															</div>
															<div class="phantram_sao">
																<div class="phantram_sao--p">
																	<img src="../assets/img/Comment/star-fill.png" alt="" class="lazy-loaded">
																</div>
															</div>
															<div class="row_cmt--progess1">
																<div class="progress">
																	<div class="progress-bar" style="width:0%">

																	</div>
																</div>
															</div>
															<p class="phantram-text">
															0%
															</p>
															';
														}
														?>
														</div>

														<!-- 2 -->
														<div class="row_cmt--rating">
														<?php
														if(isset($data1->data)){
															$i=0;
															for($i;$i<4;$i++){
																echo '
																<div class="phantram_sao">
																	<div class="phantram_sao--p">
																		<img src="../assets/img/Comment/star-fill.png" alt="" class="lazy-loaded">
																	</div>
																</div>
																';
															}
															echo '
															<div class="phantram_sao">
																<div class="phantram_sao--p">
																	<img src="../assets/img/Comment/star-empty.png" alt="" class="lazy-loaded">
																</div>
															</div>
															';
															$pt = ($sum_4s/$length)*100;
															echo '
															<div class="row_cmt--progess1">
																<div class="progress">
																	<div class="progress-bar" style="width:'.round($pt,1).'%">

																	</div>
																</div>
															</div>
															<p class="phantram-text">
															'.round($pt,1).'%
															</p>
															';
														}
														else{
															echo '
															<div class="phantram_sao">
																<div class="phantram_sao--p">
																	<img src="../assets/img/Comment/star-fill.png" alt="" class="lazy-loaded">
																</div>
															</div>
															<div class="phantram_sao">
																<div class="phantram_sao--p">
																	<img src="../assets/img/Comment/star-fill.png" alt="" class="lazy-loaded">
																</div>
															</div>
															<div class="phantram_sao">
																<div class="phantram_sao--p">
																	<img src="../assets/img/Comment/star-fill.png" alt="" class="lazy-loaded">
																</div>
															</div>
															<div class="phantram_sao">
																<div class="phantram_sao--p">
																	<img src="../assets/img/Comment/star-fill.png" alt="" class="lazy-loaded">
																</div>
															</div>
															<div class="phantram_sao">
																<div class="phantram_sao--p">
																	<img src="../assets/img/Comment/star-empty.png" alt="" class="lazy-loaded">
																</div>
															</div>
															<div class="row_cmt--progess1">
																<div class="progress">
																	<div class="progress-bar" style="width:0%">

																	</div>
																</div>
															</div>
															<p class="phantram-text">
															0%
															</p>
															';
														}
														?>
														</div>

														<div class="row_cmt--rating">
														<?php
														if(isset($data1->data)){
															$i=0;
															$j=0;
															for($i;$i<3;$i++){
																echo '
																<div class="phantram_sao">
																	<div class="phantram_sao--p">
																		<img src="../assets/img/Comment/star-fill.png" alt="" class="lazy-loaded">
																	</div>
																</div>
																';
															}
															for($j;$j<2;$j++){
																echo '
																<div class="phantram_sao">
																<div class="phantram_sao--p">
																	<img src="../assets/img/Comment/star-empty.png" alt="" class="lazy-loaded">
																</div>
															</div>
																';
															}
															$pt = ($sum_3s/$length)*100;
															echo '
															<div class="row_cmt--progess1">
																<div class="progress">
																	<div class="progress-bar" style="width:'.round($pt,1).'%">

																	</div>
																</div>
															</div>
															<p class="phantram-text">
															'.round($pt,1).'%
															</p>
															';
														}else{
															echo '
															<div class="phantram_sao">
																<div class="phantram_sao--p">
																	<img src="../assets/img/Comment/star-fill.png" alt="" class="lazy-loaded">
																</div>
															</div>
															<div class="phantram_sao">
																<div class="phantram_sao--p">
																	<img src="../assets/img/Comment/star-fill.png" alt="" class="lazy-loaded">
																</div>
															</div>
															<div class="phantram_sao">
																<div class="phantram_sao--p">
																	<img src="../assets/img/Comment/star-fill.png" alt="" class="lazy-loaded">
																</div>
															</div>
															<div class="phantram_sao">
																<div class="phantram_sao--p">
																	<img src="../assets/img/Comment/star-empty.png" alt="" class="lazy-loaded">
																</div>
															</div>
															<div class="phantram_sao">
																<div class="phantram_sao--p">
																	<img src="../assets/img/Comment/star-empty.png" alt="" class="lazy-loaded">
																</div>
															</div>
															<div class="row_cmt--progess1">
																<div class="progress">
																	<div class="progress-bar" style="width:0%">

																	</div>
																</div>
															</div>
															<p class="phantram-text">
															0%
															</p>
															';
														}
														?>
														</div>

														<div class="row_cmt--rating">
														<?php
														if(isset($data1->data)){
															$i=0;
															$j=0;
															for($i;$i<2;$i++){
																echo '
																<div class="phantram_sao">
																	<div class="phantram_sao--p">
																		<img src="../assets/img/Comment/star-fill.png" alt="" class="lazy-loaded">
																	</div>
																</div>
																';
															}
															for($j;$j<3;$j++){
																echo '
																<div class="phantram_sao">
																<div class="phantram_sao--p">
																	<img src="../assets/img/Comment/star-empty.png" alt="" class="lazy-loaded">
																</div>
															</div>
																';
															}
															$pt = ($sum_2s/$length)*100;
															echo '
															<div class="row_cmt--progess1">
																<div class="progress">
																	<div class="progress-bar" style="width:'.round($pt,1).'%">

																	</div>
																</div>
															</div>
															<p class="phantram-text">
															'.round($pt,1).'%
															</p>
															';
														}else {
															echo '
															<div class="phantram_sao">
																<div class="phantram_sao--p">
																	<img src="../assets/img/Comment/star-fill.png" alt="" class="lazy-loaded">
																</div>
															</div>
															<div class="phantram_sao">
																<div class="phantram_sao--p">
																	<img src="../assets/img/Comment/star-fill.png" alt="" class="lazy-loaded">
																</div>
															</div>
															<div class="phantram_sao">
																<div class="phantram_sao--p">
																	<img src="../assets/img/Comment/star-empty.png" alt="" class="lazy-loaded">
																</div>
															</div>
															<div class="phantram_sao">
																<div class="phantram_sao--p">
																	<img src="../assets/img/Comment/star-empty.png" alt="" class="lazy-loaded">
																</div>
															</div>
															<div class="phantram_sao">
																<div class="phantram_sao--p">
																	<img src="../assets/img/Comment/star-empty.png" alt="" class="lazy-loaded">
																</div>
															</div>
															<div class="row_cmt--progess1">
																<div class="progress">
																	<div class="progress-bar" style="width:0%">

																	</div>
																</div>
															</div>
															<p class="phantram-text">
															0%
															</p>
															';
														}
														?>
														</div>

														<div class="row_cmt--rating">
														<?php
														if(isset($data1->data)){
															$i=0;
															$j=0;
															for($i;$i<1;$i++){
																echo '
																<div class="phantram_sao">
																	<div class="phantram_sao--p">
																		<img src="../assets/img/Comment/star-fill.png" alt="" class="lazy-loaded">
																	</div>
																</div>
																';
															}
															for($j;$j<4;$j++){
																echo '
																<div class="phantram_sao">
																<div class="phantram_sao--p">
																	<img src="../assets/img/Comment/star-empty.png" alt="" class="lazy-loaded">
																</div>
															</div>
																';
															}
															$pt = ($sum_1s/$length)*100;
															echo '
															<div class="row_cmt--progess1">
																<div class="progress">
																	<div class="progress-bar" style="width:'.round($pt,1).'%">

																	</div>
																</div>
															</div>
															<p class="phantram-text">
															'.round($pt,1).'%
															</p>
															';
														}else{
															echo '
															<div class="phantram_sao">
																<div class="phantram_sao--p">
																	<img src="../assets/img/Comment/star-fill.png" alt="" class="lazy-loaded">
																</div>
															</div>
															<div class="phantram_sao">
																<div class="phantram_sao--p">
																	<img src="../assets/img/Comment/star-empty.png" alt="" class="lazy-loaded">
																</div>
															</div>
															<div class="phantram_sao">
																<div class="phantram_sao--p">
																	<img src="../assets/img/Comment/star-empty.png" alt="" class="lazy-loaded">
																</div>
															</div>
															<div class="phantram_sao">
																<div class="phantram_sao--p">
																	<img src="../assets/img/Comment/star-empty.png" alt="" class="lazy-loaded">
																</div>
															</div>
															<div class="phantram_sao">
																<div class="phantram_sao--p">
																	<img src="../assets/img/Comment/star-empty.png" alt="" class="lazy-loaded">
																</div>
															</div>
															<div class="row_cmt--progess1">
																<div class="progress">
																	<div class="progress-bar" style="width:0%">

																	</div>
																</div>
															</div>
															<p class="phantram-text">
															0%
															</p>
															';
														}
														?>
														</div>
													</div>
												</div>
												<?php if(isset($_SESSION['id'])){
													echo '<div class="row l-3 c-3">
													<div class="cmt_row--3">
														<p class="cmt_row--3-p">
															<a href="" class = "cmt_row--3-p__link">
																<span class="cmt_row--text-1">
																	Viết đánh giá
																</span>
																<span class="cmt_row--text-2">
																	Đóng đánh giá
																</span>
																<!-- <span class="cmt_row--text">
																	Đóng bình luận
																</span> -->
															</a>
														</p>
													</div>
												</div>';
												}else{
													echo '<div class="row l-3 c-3">
													<div class="cmt_row--3">
														<p class="cmt_row--3-p">
															<a href="../../../../../../WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/authen/login" class = "cmt_row--3-p__link">
																<span class="cmt_row--text">
																	Viết đánh giá
																</span>
															</a>
														</p>
													</div>
												</div>';
												}
												?>
										</div>
										<form method="POST" class="comment-form" id="commentForm">
											<div class="comments-content__container">
												<div class="comment-form">
													<div class="comment-form__content">
														<div class="comment-form__heading">
															<div class="comment-form__heading-text">
																Đánh giá của bạn về sản phẩm:
															</div>
														</div>
														<div id="rating">
															<input type="radio" id="star5" name="rating" value="5" />
															<label class = "full" for="star5" title="Awesome - 5 stars"></label>
														
															<input type="radio" id="star4" name="rating" value="4" />
															<label class = "full" for="star4" title="Pretty good - 4 stars"></label>
														
															<input type="radio" id="star3" name="rating" value="3" />
															<label class = "full" for="star3" title="Meh - 3 stars"></label>
														
															<input type="radio" id="star2" name="rating" value="2" />
															<label class = "full" for="star2" title="Kinda bad - 2 stars"></label>
														
															<input type="radio" id="star1" name="rating" value="1" />
															<label class = "full" for="star1" title="Sucks big time - 1 star"></label>
														</div>
													</div>
													<div class="comment-form__form-content">
														<div class="l-6 m-6 c-12">
															<textarea class ="form-control" placeholder="Nội dung đánh giá của bạn" name="comment" id="comment"></textarea>
														</div>
														<div class="l-6 m-6 c-12">
															<div class="row-l-6__content">
																<div class="row_form-control-1">
																	<input type="text" class ="form-control-1 row_form-control-1__input" name="fullname" id="fullname" placeholder="Họ và tên" value="<?php echo $fullname?>">
																</div>
																<div class="row_form-control-2">
																	<input type="submit" class = "btn_submit-danhgia" name="submit" id="submit" value="Gửi đánh giá">
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
										<input type="hidden" name="commentId" id="commentId" value="0" />
										</form>
										<!-- Code comment tại đây -->
										<div class="comment_chitiet--hienthi" id="showComments"></div>
										<script src = "../Javascript/comment.js"></script>
									</div>
									<!-- Tin tức -->
									<div class="l-3 tintuc-chitiet__content">
										Tin tức
									</div>
								</div>
							</div>

<!-- Model chi tiết sản phẩm -->
<?php 
	foreach($data->data	as $item ){

?>

<div class="modal-chitiet m-12 c-12">
	<div class="model-container__chitiet m-10">
		<div class="model-heading">
			<span class="model-heading__text">
				THÔNG SỐ KỸ THUẬT CHI TIẾT <?php echo $item->title?>
			</span>
			<button class="close-model-chitiet">×</button>
		</div>
		<div class="model-container__content">
			<table class="model-content-detail">
				<tbody>
				<?php
					foreach ($item->conf as $conf){
						echo '
					<tr>
						<td class="group_field">Kiểu màn hình</td>
					</tr>
					<tr>
						<td class="model-content-detail__title">Màn hình rộng</td>
						<td class="model-content-detail__charactestic">'.$conf->screen.'</td>
					</tr>
					<tr >
						<td class="model-content-detail__title">Hệ điều hành</td>
						<td class="model-content-detail__charactestic">'.$conf->operating_system.'</td>
					</tr>
					<tr>
						<td class="group_field">Camera trước</td>
					</tr>
					<tr >
						<td class="model-content-detail__title">Độ phân giải camera trước</td>
						<td class="model-content-detail__charactestic">'.$conf->front_camera.'</td>
					</tr>
					<tr>
						<td class="group_field">Camera sau</td>
					</tr>
					<tr >
						<td class="model-content-detail__title">Độ phân giải camera sau</td>
						<td class="model-content-detail__charactestic">'.$conf->rear_camera.'</td>
					</tr>
					<tr>
						<td class="group_field">Hệ điều hành & CPU</td>
					</tr>
					<tr>
						<td class="model-content-detail__title">Chip xử lý</td>
						<td class="model-content-detail__charactestic">'.$conf->chip.'</td>
					</tr>
					<tr>
						<td class="group_field">Bộ nhớ và lưu trữ</td>
					</tr>
					<tr >
						<td class="model-content-detail__title">RAM</td>
						<td class="model-content-detail__charactestic">'.$conf->ram.'</td>
					</tr>
					<tr>
						<td class="group_field">Kết nối</td>
					</tr>
					<tr >
						<td class="model-content-detail__title">Sim</td>
						<td class="model-content-detail__charactestic">'.$conf->sim.'</td>
					</tr>
					<tr>
						<td class="group_field">Pin & Sạc</td>
					</tr>
					<tr >
						<td class="model-content-detail__title">Pin</td>
						<td class="model-content-detail__charactestic">'.$conf->pin.'</td>
					</tr>';
					}
					foreach($item->ttchung as $ttchung){
						echo '
						<tr>
							<td class="group_field">Thông tin chung</td>
						</tr>
						<tr>
							<td class="model-content-detail__title">Thời điểm ra mắt</td>
							<td class="model-content-detail__charactestic">'.$ttchung->thoidiemramat.'</td>
						</tr>
						';
					}
					foreach($item->tienich as $tienich){
						echo '
						<tr>
							<td class="group_field">Tiện ích</td>
						</tr>
						<tr>
							<td class="model-content-detail__title">Bảo mật nâng cao</td>
							<td class="model-content-detail__charactestic">'.$tienich->baomatnangcao.'</td>
						</tr>
						<tr>
							<td class="model-content-detail__title">Ghi âm</td>
							<td class="model-content-detail__charactestic">'.$tienich->ghiam.'</td>
						</tr>
						';
					}

					foreach($item->ttsp as $ttsp){
						echo '
						<tr>
							<td class="group_field">Thông tin sản phẩm</td>
						</tr>
						<tr>
							<td class="model-content-detail__title">Thương hiệu</td>
							<td class="model-content-detail__charactestic">'.$ttsp->thuonghieu.'</td>
						</tr>
						';
					}
				?>
				</tbody>
			</table>
		</div>
	</div>
	<?php
		}
	?>
</div>
<script src = "../Javascript/index.js"></script>
<script src = "../Javascript/chitietsanpham.js"></script>

<?php
if(!isset($_SESSION['cart']))$_SESSION['cart'] = array();
if(isset($_POST['add_cart'])) {
	if (count($_SESSION['cart'])>0){
		$i = 0;
		foreach ($_SESSION['cart'] as $sanpham){
			if($sanpham[4] == $_POST['idSanPham']){
				$hinh = $sanpham[0];
				$tensp = $sanpham[1];
				$soLuong = $sanpham[5]+1;
				$gia = $sanpham[2] * $soLuong;
				$sale = $sanpham[3];
				$idSP = $sanpham[4];
				$sanpham = array($hinh, $tensp, $gia, $sale, $idSP, $soLuong);
				array_push($_SESSION['cart'], $sanpham);
				header('location:../cart/deleteCart.php?id='.$i);
				die();
			}
			$i++;
		}
	}
	$hinh = "../../../../../WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/assets/photos/".$_POST['Hinhanh'];
	$tensp = $_POST['Tensp'];
	$gia = $_POST['Giasp'];
	$sale = $_POST['Giamsale'];
	$idSP = $_POST['idSanPham'];
	$soLuong = 1;
	$sanpham = array($hinh, $tensp, $gia, $sale, $idSP, $soLuong);
	array_push($_SESSION['cart'], $sanpham);
	header('location: ../cart/index.php');
}
if(isset($_POST['add_orders'])){
	$u = 'http://localhost/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/PHPREST/api/sale/select.php?id='.$_GET['id'];
	$j = file_get_contents($u);
	$d = json_decode($j);
	
	$discount_sale = new discount_sale($db);
	
	$discount_sale->id_product_sale = $_GET['id'];
	foreach($d->data as $item){
		$num = $item->num_buy + 1;
		if($num < $item->number_sale){
			$discount_sale->num_buy = $num;
			$discount_sale->status = 1;
			$discount_sale->update(0);//0 là chỉ update num_buy
		}else if($num == $item->number_sale){
			$discount_sale->num_buy = $num;
			$discount_sale->status = 0;
			$discount_sale->update(1);//1 là update num_buy and status
		}
	}
	if(!isset($_SESSION['cart']))$_SESSION['cart'] = array();
	$hinh = "../../../../../WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/assets/photos/".$_POST['Hinhanh'];
	$tensp = $_POST['Tensp'];
	$gia = $_POST['Giasp'];
	$sale = $_POST['Giamsale'];
	$idSP = $_POST['idSanPham'];
	$soLuong = 1;
	$sanpham = array($hinh, $tensp, $gia, $sale, $idSP, $soLuong);
	array_push($_SESSION['cart'], $sanpham);
	if(isset($_SESSION['id'])){
		if(isset($_POST['gender']) && isset($_POST['name']) && isset($_POST['telephone']) && isset($_POST['matp']) && isset($_POST['maqh']) && isset($_POST['phuongxa']) && isset($_POST['note'])){
			$_SESSION['total_money'] = $total_money;
			$_SESSION['gender'] = $_POST['gender'];
			$_SESSION['name'] = $_POST['name'];
			$_SESSION['telephone'] = $_POST['telephone'];
			$_SESSION['matp'] = $_POST['matp'];
			$_SESSION['maqh'] = $_POST['maqh'];
			$_SESSION['phuongxa'] = $_POST['phuongxa'];
			$_SESSION['note'] = $_POST['note'];
			header('Location:../../../../../WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/PHPREST/api/orders/create_orders.php');
		}
	}else{
		header('Location:../../../../../WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/authen/login');
	}
}
?>

<script>
	var element = document.querySelector('.chitiet-container-below');
	element.onclick = function (e) {
		var elementItem = e.target.closest('.chitiet-container-below-img-con');
		var elementConCammara = document.querySelector('.chitiet-container-below-img-concon');
		// if (elementConCammara) {
		// 	var elementsrc = elementConCammara.getAttribute('src');
		// 	var cartLon = document.querySelector('.chitiet-container-above-img');
		// 	var url = '../assets/img/anh-chup-tu-iphone-14-pro-max-tim-4_1664272756_1.webp';
		// 	cartLon.src = url;
		// } else 
		if (elementItem) {
			var cartbackImg = elementItem.getAttribute('src');
			console.log(cartbackImg);
			var cartLon = document.querySelector('.chitiet-container-above-img');
			console.log(cartLon);
			cartLon.src = cartbackImg;
		}

	
	}

	
</script>

<script>
	var elementProductsale = document.querySelector('.time_coundown');
	var id = "<?php echo $_GET['id'];?>";
var APIurl_sale = 'http://localhost/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/PHPREST/api/sale/select_single.php?id='+id;

function start() {
    getProductSale(handleProductSale);
}
start();

function getProductSale (callback) {
    fetch(APIurl_sale)
        .then(function (respon) {
            return respon.json();
        })
        .then(callback);
}
function handleProductSale(data) {
    var elementProductsale = document.querySelector('.time_coundown');
    
    var html = data.data.map(function (item) {
    var noW1 = new Date().getTime();
    var timeStart = new Date(item.time_sale).getTime();
    var timeStop = new Date(item.time_salestop).getTime();//xem lấy time từ server..
        if(noW1>=timeStart && noW1 <= timeStop){
            setInterval(function () {
                var noW = new Date().getTime();
                var full = new Date(item.time_salestop).getTime();
                var D = full  -  noW;
                var Days =  Math.floor(D/(1000*60*60*24));
                var hours =  Math.floor(D/(1000*60*60));
                var minutes =  Math.floor(D/(1000*60));
                var seconds =  Math.floor(D/(1000));
                hours %=24
                minutes %=60
                seconds %= 60
                
                document.querySelector(".number_day").innerText = Days
                document.querySelector(".number_hour").innerText = hours
                document.querySelector(".number_mili").innerText = minutes
                document.querySelector(".number_secon").innerText = seconds
                
            },1000);
            
        }
    });

}
</script>

<script>
//xử lí select địa chỉ
    $(document).ready(function() {
        $('#matp').change(function() {
            var a = $(this).val()
			var a1='#'
			$.get("xa_phuong.php",{a_ajax2:a1},function(data) {
				$("#phuongxa").html(data);
			})
            $.get("quan_huyen.php",{a_ajax1:a},function(data) {
                $("#maqh").html(data);
                $('#maqh').change(function() {
					var b = $(this).val()
					$.get("xa_phuong.php",{a_ajax2:b},function(data) {
						$("#phuongxa").html(data);
					})
				})
            })
        })
    });
</script>
<?php require_once("../FE/Layout/footer.php");?>

