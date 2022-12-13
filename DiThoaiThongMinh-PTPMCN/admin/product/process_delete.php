<?php
include_once('../../PHPREST/core/initialize.php');
?>

<?php

if (isset($_POST['ID'])) {
	$product = new product($db);
	$product->id = isset($_POST['ID']) ? $_POST['ID'] : die();
	if($product->delete_product()){
		echo 'delete successful';
	}
	else {echo 'error';}
}
?>