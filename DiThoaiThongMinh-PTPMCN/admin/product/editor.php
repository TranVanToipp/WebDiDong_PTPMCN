<?php
	include_once ("../check_adm.php");
?>
<?php   
    $title = "Thêm/Sửa sản phẩm";
    $baseUrl = '../';
    require_once('../layouts/header.php');
	include_once('../../PHPREST/core/initialize.php');
?>

<?php

$s_id = $s_title = $s_price = $s_number = $s_description = 
	$s_avatar = $s_giamgia = $s_IDLSP = $s_giamgia = $msg ='';
	
	
if(!empty($_POST)){
	if(isset($_POST['IDLSP']) && isset($_POST['title']) && isset($_POST['price']) && isset($_POST['discount']) && isset($_POST['number'])){
		$s_id = $_POST['id'];
		$s_IDLSP = $_POST['IDLSP'];
		$s_title = $_POST['title'];
		$s_price = $_POST['price'];
		$s_giamgia = $_POST['discount'];
		$s_number = $_POST['number'];
		$s_description = $_POST['description'];
		if($s_id == ''){
			$file_path = basename($_FILES['avatar']['name']);
			$file_path1 = "image/".$file_path;
			move_uploaded_file($_FILES['avatar']['tmp_name'],$file_path1);
		}else {
			if(empty($_FILES['avatar']['error'])){
				$file_path = basename($_FILES['avatar']['name']);
				$file_path1 = "image/".$file_path;
				move_uploaded_file($_FILES['avatar']['tmp_name'],$file_path1);
			}else{
				$file_path = $_POST['avatar1'];
			}
		}
		
		$product = new product($db);
			
		$product->product_type 	= $s_IDLSP;
		$product->title			= $s_title;
		$product->price			= $s_price;
		$product->discount		= $s_giamgia;
		$product->thumnail		= $file_path;
		$product->description	= $s_description;
		$product->description2	= '';
		$product->num			= $s_number;
		
		if($s_id == ''){
			if(empty($_FILES['avatar']['error'])){
				if($s_IDLSP != 0){
					$product->create();
					header("location:index.php");
				}else{
					$msg = "Vui lòng chọn loại sản phẩm";
				}
			}
			else{
				$msg = "Vui lòng thêm ảnh cho sản phẩm";
			}
		}
		else{
			if($s_IDLSP != 0){
				$product->id = $s_id;
				$product->update();
				header("location:index.php");
			}else{
				$msg = "Vui lòng chọn loại sản phẩm";
			}
		}
	}
	else{
		$msg = "Vui lòng nhập đầy đủ thông tin của sản phẩm";
	}
	
}

$id='';
if(isset($_GET['id'])){
	$id = $_GET['id'];
	$url ="http://localhost/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/PHPREST/api/product/read_single.php?id=".$id;
	$json = file_get_contents($url);
	$data = json_decode($json);
	if(isset($data->data)){
		foreach($data->data as $item){
			$s_id = $item->id;
			$s_IDLSP = $item->product_type;
			$s_title = $item->title;
			$s_price = $item->price;
			$s_giamgia = $item->discount;
			$s_number = $item->num;
			$s_description = $item->description;
			$s_avatar = $item->thumnail;
		}
	}
	else
		$id='';
}

?>

<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script src="../../ckfinder/ckfinder.js"></script>
<script src= "../../Javascript/Toast_mes.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<html lang="en">
<body>
<div class="row">
	<div class="col-md-12" style="margin: 30px 0;">
		<h3>Thêm/sửa sản phẩm</h3>
        <div class="panel panel-primary">
            <div class="panel-body">
                <form method="post" action="" enctype="multipart/form-data">
					<div style="color: red;text-align:center;"><?=$msg?></div>
					<div class="form-group" style="display:none;">
						<input type="number" name="id" value="<?=$id?>"></input>
					</div>
                    <div class="form-group">
                        <label for="" style="font-weight: bold;">Tên sản phẩm:</label>
                        <input type="text" required="true" class="form-control" name="title" placeholder="Nhập tên sản phẩm" value="<?=$s_title?>">
                    </div>
					<div class="form-group">
                        <label for="" style="font-weight: bold;">Tên Loại Sản Phẩm:</label>
                        <td><?php
						$url = "http://localhost/WebDiDong_PTPMCN/DiThoaiThongMinh-PTPMCN/PHPREST/api/product/product_type.php";
						$json = file_get_contents($url);
						$data = json_decode($json);
						echo "<select name='IDLSP'>";
						echo "<option value='0'> --Chọn Loại Sản Phẩm--</option>";
						if(isset($data->data)){
							foreach($data->data as $item){
								$loai= $item->id;
								echo "<option value='".$item->id."'"; if($s_IDLSP == $loai) echo 'selected="selected"'; echo ">".$item->name."</option>";
							}
						}
						echo "</select>";
						?></td>
                    </div>
					<div class="form-group">
                        <label for="" style="font-weight: bold;">Giá Sản Phẩm:</label>
                        <input class="form-control" type="number" required="true" class="form-control" name="price" value="<?=$s_price?>">
                    </div>
					<div class="from-group">
						<label for="" style="font-weight: bold;">Giảm Giá: </label>
                        <input class="form-control" type="text" required="true" class="form-control" name="discount" value="<?=$s_giamgia?>">
					</div>
                    <div class="form-group">
                        <label for="" style="font-weight: bold;">Số lượng:</label>
                        <input class="form-control" type="number" required="true" class="form-control" name="number" value="<?=$s_number?>">
                    </div>
                    <div class="form-group">
                        <label for="" style="font-weight: bold;">Thông tin sản phẩm:</label>
                        <textarea class="form-group" name="description" id="" style="width: 100%;" rows="5" name="description"><?=$s_description?></textarea>
                    </div>
                    <div class="form-group">
                        <label for="" style="font-weight: bold;">Ảnh sản phẩm:</label>
                        <input name="avatar" type="file">
						<img src="image/<?=$s_avatar?>" style="width: 80px; height:80px;"/>
                    </div>
					<div class="form-group" style="display:none;">
						<input type="text" name="avatar1" value="<?=$s_avatar?>"></input>
					</div>
                    <button type="submit" class="btn btn-success">Save</button>
                </form>
            </div>
        </div>
	</div>
</div>
<script>
    
    // CKEDITOR.replace( 'description' );
    CKEDITOR.replace( 'description', {
        // filebrowserBrowseUrl: '';
        filebrowserBrowseUrl: '/ckfinder/ckfinder.html'
    } );
</script>
</body>
</html>
