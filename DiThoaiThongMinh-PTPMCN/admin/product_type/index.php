<?php
	include_once ("../check_adm.php");
?>
<?php
	$title = 'Loại danh mục';
	$baseUrl = '../';
	require_once($baseUrl.'layouts/header.php');
	
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loại sản phẩm</title>
</head>
<body>
    <div class="row">
        <div class="col-md-12">
            <h1>Quản lí loại sản phẩm</h1>
            <a href="editor.php"><button type="submit" class="btn btn-success" style="margin-top: 10px;">Thêm</button></a>
        </div>
        <div class="col-md-7">
            <table class = "table table-bordered table-hover">
                <tr>
                    <th>STT</th>
                    <th>Tên loại sản phẩm</th>
                </tr>
<?php
    $url = "http://localhost/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/PHPREST/api/product/product_type.php";
    $json=file_get_contents($url);
    $data = json_decode($json);
    $STT= 1;
    foreach($data -> data as $item) {
        echo '<tr>
                <td>'.$STT++.'</td>
                <td>'.$item->name.'</td>
            </tr>';
        }
?>
            </table>
        </div>
    </div>
</body>
</html>
<?php
	
	require_once($baseUrl.'layouts/footer.php');
?>
