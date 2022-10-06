<html>
<head>
<title>search</title>
</head>
<body>
<div align="center">
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
Search: <input type="text" name="search" />
<input type="submit" name="ok" value ="Search"/>
</form>
</div>
<?php
if(isset($_POST['search'])){
	$url_title = "http://localhost/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/PHPREST/api/search/search.php?title=".$_POST['search'];
	$json_title = file_get_contents($url_title);
	$data_title = json_decode($json_title);
	if(isset($data_title->message)){
		echo "không tôn tại sản phẩm ".$_POST['search'];
	}
	else {
		foreach($data_title->data as $title){
			echo '<div class="col l-2 m-4 c-6" >
				<div class="home-product-item">
						<div class="home-product-item-img" style="background-image:url(${item.img});"></div>
						<h4 class="home-product-item-name">'.$title->title.'</h4>
					<div class="home-product-item-price">
						<span class="home-product-item__price-current">'.$title->price.'</span>
						<span class="home-product-item__price-old">'.$title->discount.'</span>
					</div>
					<div class="home-product-item__sale-off">
						<span class="home-product-item__sale-off-percent">'.$title->discount.'</span>
					</div>
				</div>
			</div>';
		}
	}
}
?>
</body>
</html>