<?php
    //headers
    header('Access-Control-Allow-Origin:*');//cho phép yêu cầu HTTP
    header('Content-Type: application/json; charset=utf8');
    include_once('../../core/initialize.php');

    //khởi tạo devvn_tinhthanhpho
    $devvn_quanhuyen = new quanhuyen ($db);
	
	$devvn_quanhuyen->matp = isset($_GET['matp']) ? $_GET['matp'] : die();
	$result = $devvn_quanhuyen->getQuanHuyen();
    //lấy số hàng
    $num = $result->rowCount();
    if($num >0){
        $devvn_arr = array();
        $devvn_arr['data'] = array();
        //tìm nạp hàng tiếp theo dưới dạng một mảng được lập chỉ mục theo tên cột
        while($row = $result->fetch(PDO::FETCH_ASSOC)){
            extract($row);
            $devvn_item = array(
                'maqh' 	=>$maqh,
                'name'=>$nameQH,
                'type'=>$type,
                'matp'=>$matp
            );
            array_push($devvn_arr['data'],$devvn_item);
        }
        //chuyển đổi sang dạng JSON
        $json = json_encode($devvn_arr,JSON_UNESCAPED_UNICODE);
        echo $json;
    }else{
        echo json_encode(array('message' => 'No devvn found.'));
    }
?>