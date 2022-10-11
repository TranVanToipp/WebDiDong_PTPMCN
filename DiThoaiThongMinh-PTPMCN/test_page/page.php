

<?php
$url_type = "http://localhost/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/PHPREST/api/product/read_type.php";
$json_type = file_get_contents($url_type);
$data_type = json_decode($json_type);
			foreach($data_type->data as $product_type){
				echo '
                <div class="header__nav-tab" > 
                    <img src="./assets/img/quangcao-containner/dienthoai_1637814357.svg" alt="" class="header__nav-tab-img">
                    <div class="header__nav-tab-vac">
                        <span>'.$product_type->product_type_name.'</span>
                    </div>
					<a href="page_index.php?page=1&product_type='.$product_type->product_type.'">xem thêm</a>
                </div>';
				$url_product = "http://localhost/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/PHPREST/api/product/read.php?product_type=".$product_type->product_type;
				$json_product=file_get_contents($url_product);
				$data_product = json_decode($json_product);
				echo '<div class="home-product">
						<div class="grid-row">';
				foreach($data_product->data as $product_item){
					echo '<div class="col l-2 m-4 c-6" >
							<div class="home-product-item">
									<div class="home-product-item-img" style="background-image:url(${item.img});"></div>
									<h4 class="home-product-item-name">'.$product_item->title.'</h4>
								<div class="home-product-item-price">
									<span class="home-product-item__price-current">'.$product_item->price.'</span>
									<span class="home-product-item__price-old">'.$product_item->discount.'</span>
								</div>
								<div class="home-product-item__sale-off">
									<span class="home-product-item__sale-off-percent">'.$product_item->discount.'</span>
								</div>
							</div>
						</div>';
				}
				echo '</div>
					</div>';
			}
        ?>