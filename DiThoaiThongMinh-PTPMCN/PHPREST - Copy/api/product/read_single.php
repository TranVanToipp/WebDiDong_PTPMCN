<?php

//headers
header('Access-Control-Allow-Origin:*');//cho phép yêu cầu HTTP
header('Content-Type: application/json');


include_once('../../core/initialize.php');

//khởi tạo product
$product = new product($db);
$product_img = new product($db);
$product_discount = new product($db);
$product_configuration = new product($db);
$product_thongtinchung = new product($db);
$product_thongtinSP = new product($db);
$product_tienich = new product($db);
$product->id = isset($_GET['id']) ? $_GET['id'] : die();
$product_img->id = isset($_GET['id']) ? $_GET['id'] : die();
$product_discount->id = isset($_GET['id']) ? $_GET['id'] : die();
$product_configuration->id = isset($_GET['id']) ? $_GET['id'] : die();
$product_thongtinchung->id = isset($_GET['id']) ? $_GET['id'] : die();
$product_thongtinSP->id = isset($_GET['id']) ? $_GET['id'] : die();
$product_tienich->id = isset($_GET['id']) ? $_GET['id'] : die();
//product query
$product->read_single();
$result = $product_img->img_desct();
$result_discount = $product_discount->discount();
$result_conf = $product_configuration->configuration();
$result_ttchung = $product_thongtinchung->thongtinchung();
$result_ttSP = $product_thongtinSP->thongtinsp();
$result_tienich = $product_tienich->tienich();
$product_arr['data'] = array();
$num = $result->rowCount();
$num2 = $result_discount->rowCount();
$num3 = $result_conf->rowCount();
$num4 = $result_ttchung->rowCount();
$num5 = $result_ttSP->rowCount();
$num6 = $result_tienich->rowCount();
$tienich_arr['tienich'] = array();
if ($num6 > 0){
	while($row = $result_tienich->fetch(PDO::FETCH_ASSOC)){
		extract($row);
		$tienich_item = array(
			'product_id' =>$id,
			'baomatnangcao' => $baomatnangcao,
			'baomatnangcao' => $baomatnangcao,
			'ghiam' => $ghiam,
		);
		array_push($tienich_arr['tienich'],$tienich_item);
	}
}
$ttsp_arr['ttsp'] = array();
if ($num5 > 0){
	while($row = $result_ttSP->fetch(PDO::FETCH_ASSOC)){
		extract($row);
		$ttsp_item = array(
			'product_id' =>$id,
			'thuonghieu' => $thuonghieu,
		);
		array_push($ttsp_arr['ttsp'],$ttsp_item);
	}	
}
$ttchung_arr['ttchung'] = array();
if ($num4 > 0){
	while($row = $result_ttchung->fetch(PDO::FETCH_ASSOC)){
		extract($row);
		$ttchung_item = array(
			'product_id' =>$id,
			'thoidiemramat' => $thoidiemramat,
		);
		array_push($ttchung_arr['ttchung'],$ttchung_item);
	}	
}
$conf_arr['conf'] = array();
if($num3 > 0){
	while($row = $result_conf->fetch(PDO::FETCH_ASSOC)){
		extract($row);
		$conf_item = array(
			'product_id' =>$id,
			'screen' => $screen,
			'operating_system' => $operating_system,
			'front_camera' => $front_camera,
			'rear_camera' => $rear_camera,
			'chip' => $chip,
			'ram' => $ram,
			'sim' => $sim,
			'pin' => $pin,
		);
		array_push($conf_arr['conf'],$conf_item);
	}
}
$dis_arr['dis'] = array();
if($num2 > 0) {
	while($row = $result_discount->fetch(PDO::FETCH_ASSOC)){
		extract($row);
		$discount_item = array(
			'product_id' =>$id,
			'discount_text' => $discount_text
		);
		array_push($dis_arr['dis'],$discount_item);
	}
}
$img_arr['img'] = array();
if($num > 0){
	while($row = $result->fetch(PDO::FETCH_ASSOC)){
		extract($row);
		$img_item = array(
			'product_id' =>$id,
			'img_desct' => $img_desct
		);
		array_push($img_arr['img'],$img_item);
	}
}
//nếu trên url người dùng nhập 1 id mà sản phẩm chưa được tạo ra thì ko hiển thị
if(isset($product->created_at)){
	$product = array (
		'id' 	=>$product->id,
		'product_type' => $product->product_type,
		'product_type_name' =>$product->product_type_name,
		'title' =>html_entity_decode($product->title),
		'price' =>$product->price,
		'discount' =>$product->discount,
		'num' =>$product->num,
		'thumnail' =>$product->thumnail,
		'description' =>html_entity_decode($product->description),//chuyển đổi các kí hiệu HTML entities thành các kí tự tương ứng
		'description2' =>html_entity_decode($product->description2),
		'created_at' =>$product->created_at,
		'img' =>$img_arr['img'],
		'discount_text' => $dis_arr['dis'],
		'conf' => $conf_arr['conf'],
		'ttchung' => $ttchung_arr['ttchung'],
		'ttsp' => $ttsp_arr['ttsp'],
		'tienich' => $tienich_arr['tienich'],
	);
	array_push($product_arr['data'],$product);
	//chuyển đổi sang dạng JSON
	echo json_encode($product_arr);
}
else{
	echo json_encode(array('message' => 'No product found.'));
}
	
?>