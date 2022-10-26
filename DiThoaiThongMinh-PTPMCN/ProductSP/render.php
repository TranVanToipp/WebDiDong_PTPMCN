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
            echo '
				<a href ="../../WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/chitietSP/index.php?id='.$product_item->id.'" class="chitiet-item__product col l-2 m-4 c-6" style="text-decoration: none;">
                    <div class="home-product-item">
                            <div class="home-product-item-img" style="background-image:url(./assets/photos/'.$product_item->thumnail.'");"></div>
                            <h4 class="home-product-item-name">'.$product_item->title.'</h4>
                        <div class="home-product-item-price">
                            <span class="home-product-item__price-current">'.$product_item->price.'</span>
                            <span class="home-product-item__price-old">'.$product_item->discount.'</span>
                        </div>
                        <div class="home-product-item__sale-off">
                            <span class="home-product-item__sale-off-percent">'.$product_item->discount.'</span>
                        </div>
                    </div>
                </a>';
        }
        echo '</div>
            </div>';
    }
?>
