<?php 
include_once('../../PHPREST/core/initialize.php');
?>
<?php
if (isset($_POST['ID'])) {
	$orders = new orders($db);
	$orders->id = isset($_POST['ID']) ? $_POST['ID'] : die();
	if($orders ->delete_order()){
		echo "Order deleted successfully";
	}else{
		echo "Error deleting Order";
	}
}
?>