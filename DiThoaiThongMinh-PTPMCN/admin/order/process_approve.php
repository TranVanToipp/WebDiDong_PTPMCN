<?php 
include_once('../../PHPREST/core/initialize.php');
?>
<?php
if (isset($_POST['ID'])) {
	$orders = new orders($db);
	$orders->id = isset($_POST['ID']) ? $_POST['ID'] : die();
	$orders->status = 2;
	$url = "http://localhost/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/PHPREST/api/orders/get_order_status.php?id=".$_POST['ID'];
	$json = file_get_contents($url);
	$data = json_decode($json);
	if(isset($data->data)){
		foreach($data->data as $i){
			if($i->status == 1){
				if($orders ->update()){
					echo "Order update successfully";
				}else{
					echo "Error update Order";
				}
			}
			else{
				echo "Error update Order";
			}
		}
	}
}
?>