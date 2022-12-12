<?php
$url_type = "http://localhost/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/PHPREST/api/product/read_type.php";
$json_type = file_get_contents($url_type);
$data_type = json_decode($json_type);
    foreach($data_type->data as $product_type){
        $dienthoai = 'Điện thoại';
        echo '
        <div class="header__nav-tab" > 
            <div class = "header__nav-type">
                <img src="./assets/img/quangcao-containner/dienthoai_1637814357.svg" alt="" class="header__nav-tab-img">
                <div class="header__nav-tab-vac">
                    <span>'.$dienthoai.' '.$product_type->product_type_name.'</span>
                </div>
            </div>
            <div class = "header__nav-tab-xemthem">
                <a href="./moreProduct/index.php?page=1&product_type='.$product_type->product_type.'" class="header__nav-tab-xemthem-link">Xem thêm</a>
            </div>
        </div>';
        $url_product = "http://localhost/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/PHPREST/api/product/read.php?product_type=".$product_type->product_type;
        $json_product=file_get_contents($url_product);
        $data_product = json_decode($json_product);
        echo '<div class="home-product">
                <div class="grid-row">';
        foreach($data_product->data as $product_item){
			$url1 = 'http://localhost/webDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/PHPREST/api/comment/selectComment.php?product_id='.$product_item->id;
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
            echo '
				<a href ="../../WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/chitietSP/index.php?id='.$product_item->id.'&sale=0" class="chitiet-item__product col l-2-4 m-4 c-6" style="text-decoration: none;">
                    <div class="home-product-item">
                            <div class="home-product-item-img" style="background-image:url(./assets/photos/'.$product_item->thumnail.'");"></div>
                            <h4 class="home-product-item-name">'.$product_item->title.'</h4>
                        <div class="home-product-item-price">
                            <span class="home-product-item__price-current">'.($product_item->price-$product_item->price*$product_item->discount/100).'đ</span>
                            <span class="home-product-item__price-old">'.$product_item->price.'</span>
                        </div>
                        <div class="home-product-item__sale-off">
                            <span class="home-product-item__sale-off-percent">'.($product_item->discount).'%</span>
                        </div>
                        <div class="rate-like__start">
                            <div class="star-rating">';
							if(isset($data1->message)){
								$i=0;
								for($i;$i<5;$i++){
									echo '<img src="./assets/img/Comment/star-fill.png" alt="" class="lazy-loaded__starthome">';
								}
							}
							if(isset($data1->data)){
								$i=0;
								$star_empty = 5 - $sum;
								for($i; $i<$sum;$i++){
									echo '<img src="./assets/img/Comment/star-fill.png" alt="" class="lazy-loaded__starthome">';
								}
								if($star_empty >0){
									$j=0;
									for($j;$j<$star_empty;$j++){
										echo '<img src="./assets/img/Comment/star-empty.png" alt="" class="lazy-loaded">';
									}
								}
							}
                        echo'</div>
                            <div class="btn-like__starthome">
                                <svg width="16" height="15" viewBox="0 0 16 15" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M14.8571 4.76562C14.8571 6.43359 13.2054 7.98307 13.1786 8.01042L8 13.1055L2.8125 8.0013C2.79464 7.98307 1.14286 6.43359 1.14286 4.76562C1.14286 2.20443 2.83929 1.66667 4.26786 1.66667C5.59822 1.66667 7.09822 3.13411 7.5625 3.69922C7.77679 3.96354 8.22322 3.96354 8.4375 3.69922C8.90179 3.13411 10.4018 1.66667 11.7321 1.66667C13.1607 1.66667 14.8571 2.20443 14.8571 4.76562ZM16 4.76562C16 2.09505 14.4018 0.5 11.7321 0.5C10.1696 0.5 8.70536 1.75781 8 2.46875C7.29464 1.75781 5.83036 0.5 4.26786 0.5C1.59821 0.5 0 2.09505 0 4.76562C0 6.95312 1.96429 8.78516 2.03571 8.84896L7.60714 14.3359C7.71429 14.4453 7.85714 14.5 8 14.5C8.14286 14.5 8.28572 14.4453 8.39286 14.3359L13.9554 8.86719C14.0357 8.78516 16 6.95312 16 4.76562Z" fill="#FF6700"></path></svg>
                                <span>Yêu thích</span>
                            </div>
                        </div>
                    </div>
                </a>';
        }
        echo '</div>
            </div>';
    }
?>
