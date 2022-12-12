<?php
    $a_ajax1 = $_GET['a_ajax1'];
	$url = 'http://localhost/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/PHPREST/api/quanhuyen/select_quanhuyen.php?matp='.$a_ajax1;
	$json = file_get_contents($url);
	$data = json_decode($json);
	echo '<option value="#" class="option-giohang__phuong">Quận/Huyện</option>';
	if($a_ajax1 != '#'){
		foreach($data->data as $item){
			echo '<option value="'.$item->maqh.'" class="option-giohang__phuong">'.$item->name.'</option>';
		}
	}
?>