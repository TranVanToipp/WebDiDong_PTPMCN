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
        </div>
        <div class="col-md-7">
            <table class = "table table-bordered table-hover">
                <tr>
                    <th>STT</th>
                    <th>Loại sản phẩm</th>
                    <th>Tên loại sản phẩm</th>
                </tr>

            </table>
        </div>
    </div>
</body>
</html>
<?php
	
	require_once($baseUrl.'layouts/footer.php');
?>