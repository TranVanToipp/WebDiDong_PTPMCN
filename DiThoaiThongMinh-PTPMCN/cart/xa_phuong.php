<?php
	$a_ajax2 = $_GET['a_ajax2'];
	$url = 'http://localhost/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/PHPREST/api/xaphuongthitran/select_xaphuong.php?maqh='.$a_ajax2;
	$json = file_get_contents($url);
	$data = json_decode($json);
    echo '<option value="#" class="option-giohang__phuong">Phường/Xã</option>';
	if($a_ajax2!='#'){
		foreach($data->data as $item){
			echo '<option value="'.$item->xaid.'" class="option_giohang-quan">'.$item->name.'</option>';
		}
	}
	echo   '</select>';
?>