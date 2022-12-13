<?php
	include_once ("../check_adm.php");
?>
<?php
	$title = 'Quản lý sale sản phẩm';
	$baseUrl = '../';
	require_once($baseUrl.'layouts/header.php');
    include_once ("../../PHPREST/core/initialize.php");
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Khuyến mãi sản phẩm</title>
</head>
<style> 
	.nav-item:nth-child(7) {
		background-color: #c1c1c1;
	}

    .khuyenmaisale_top {
        margin-top: 50px;
    }

    .check-time__sale {
        display: flex;
    }

    .check-time__salestop {
        margin-left: 50px;
    }

    .btnbutton-submit {
        margin-left: 30px;
    }

</style>
<body>
    <div class="row">
        <div class= "col-md-12 table-responsive khuyenmaisale_top">
            <h3>Quản lí Khuyến mãi sản phẩm</h3>
            <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
            <div class="check-time__sale">
                <div class="check-time__salestar">
                    Thời gian bắt đầu: <input type="datetime-local" required name="timeStar"/>
                </div>
                <div class="check-time__salestop">
                    Thời gian kết thúc: <input type="datetime-local" required name="timeStop"/>
                </div>

                <div style="width: 40px; height:40px;" class="btnbutton-submit">
                    <input type="submit" class = "btn btn-warning" name="btntime" value = "Sale"/>
                </div>
            </div>
            <table class = "table table-bordered table-hover">
                <tr>
                    <th>   </th>
                    <th>STT</th>
                    <th>Tên SP</th>
					<th>Số lượng</th>
					<th>Giảm Giá</th>
                    <th>Số lượng bán</th>
					<th>Loại SP</th>
                    <th>Hình sản phẩm</th>
                </tr>
<?php
$url = 'http://localhost/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/PHPREST/api/product/selectAll.php';
$json = file_get_contents($url);
$data = json_decode($json);
$index = 1;
if(isset($data->data)){
	foreach($data->data as $item){
		echo 
		'<tr>
            <td>
                <input type="checkbox" name="check_sale[]" id="check_sale" value = "'.$item->id.'">
            </td>
			<td>'.($index++).'</td>
			<td>'.$item->title.'</td>
			<td>'.$item->num.'</td>
			<td> 
                <input type="number" placeholder="discount" name="discount'.$item->id.'" id="">
            </td>
            <td> 
                <input type="number" placeholder="số lượng sale" name="num_sale'.$item->id.'" id="">
            </td>
			<td>'.$item->product_type_name.'</td>
			<td><img src="../product/image/'.$item->thumnail.'" style="height: 120px; width: 100px;"></td>
			
		</tr>';
	}
}
?>
            </table>
            </form> 
        </div>
    </div>
</body>
</html>

<?php
	
    require_once($baseUrl.'layouts/footer.php');
?>
<?php
if(isset($_POST['check_sale'])){
    if($_POST['check_sale'] == true){
        if(isset($_POST['timeStar']) && isset($_POST['timeStop'])){
            $discount_sale = new discount_sale($db);

            $discount_sale->time_sale = $_POST['timeStar'];
            $discount_sale->time_salestop = $_POST['timeStop'];
            foreach ($_POST['check_sale'] as $value){
                if(isset($_POST['discount'.$value]) && isset($_POST['num_sale'.$value])){
					$url_dis= 'http://localhost/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/PHPREST/api/sale/select.php?id='.$value;
					$json_dis = file_get_contents($url_dis);
					$data_dis = json_decode($json_dis);
					if(isset($data_dis->data)){
						foreach($data_dis->data as $item){
							$time_salestop = $item->time_salestop;
							$time=time() + 6*60*60;
							$date= date('Y-m-d H:i:s', $time);
							if($item->status_sale == 0 || strtotime($item->time_salestop) < strtotime($date)){
								$discount_sale->id_product_sale = $value;
								$discount_sale->discount_product_sale = $_POST['discount'.$value];
								$discount_sale->number_sale = $_POST['num_sale'.$value];
								$discount_sale->num_buy = 0;
								$discount_sale->status_sale = 1;
								$discount_sale->create();
							}
						}
					}
					else {
						$discount_sale->id_product_sale = $value;
						$discount_sale->discount_product_sale = $_POST['discount'.$value];
						$discount_sale->number_sale = $_POST['num_sale'.$value];
						$discount_sale->num_buy = 0;
						$discount_sale->status_sale = 1;
						$discount_sale->create();
					}
                }
            }
        }
    }
}
?>
