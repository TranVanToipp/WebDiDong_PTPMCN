<?php
$type = $_GET["product_type"];
$page = $_GET["page"];
$url_type = "http://localhost/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/PHPREST/api/product/read_type.php";
$json_type = file_get_contents($url_type);
$data_type = json_decode($json_type);
foreach($data_type->data as $product_type){
	if($product_type->product_type == $type){
		$type_name = $product_type->product_type_name;
	}
}
echo '
<div class="header__nav-tab" > 
	<img src="./assets/img/quangcao-containner/dienthoai_1637814357.svg" alt="" class="header__nav-tab-img">
	<div class="header__nav-tab-vac">
		<span>'.$type_name.'</span>
	</div>
</div>';

$url_product = "http://localhost/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/PHPREST/api/page_product/page.php?page=$page&product_type=$type";
$json_product=file_get_contents($url_product);
$data_product = json_decode($json_product);
echo '<div class="home-product">
		<div class="grid-row">';
foreach($data_product->data as $product_item){
	$max_page = $product_item->max_page;
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
echo '<ul>';
		if($page>1){
			$prev_page = $page-1;
			echo 
			'<li><a href="page_index.php?page='.$prev_page.'&product_type='.$type.'"> << </a></li>';
		}
		$part = 1;
		$begin = $page - $part;
		if($begin <1){
			$begin = 1;
		}
		$end = $page + $part;
		if($end>$max_page){
			$end = $max_page;
		}
		for($page_item = $begin; $page_item <= $end; $page_item++){
			echo '<li><a href="page_index.php?page='.$page_item.'&product_type='.$type.'">'.$page_item.'</a></li>';
			
		}
		if($page<$max_page){
			$next_page = $page+1;
			echo
				'<li><a href="page_index.php?page='.$next_page.'&product_type='.$type.'"> >> </a></li>';
		}
		echo'
	</ul>';
?>