<?php   
    $title = "Thêm/Sửa sản phẩm";
    $baseUrl = '../';
    require_once($baseUrl.'layouts/header.php');
?>

<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script src="../../ckfinder/ckfinder.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<html lang="en">
<body>
<div class="row">
	<div class="col-md-12" style="margin: 30px 0;">
		<h3>Thêm/sửa sản phẩm</h3>
        <div class="panel panel-primary">
            <div class="panel-body">
                <form method="post" action="" enctype="multipart/form-data">
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
						echo "<option value=''> --Chọn Loại Sản Phẩm--</option>";
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
                        <label for="" style="font-weight: bold;">Giá Nhập Vào:</label>
                        <input class="form-control" type="number" required="true" class="form-control" name="price" value="<?=$s_price?>">
                    </div>
                    <div class="form-group">
                        <label for="" style="font-weight: bold;">Giá Bán Ra:</label>
                        <input class="form-control" type="number" required="true" class="form-control" name="discount" value="<?=$s_discount?>">
                    </div>
					<div class="from-group">
					<label for="" style="font-weight: bold;">Giảm Giá: </label>
					<select id="disco" name="giamgia">
						<option value="0" <?php if($s_giamgia==0) echo 'selected = "selected"'; ?>>Giảm Giá 0%</option>
						<option value="1" <?php if($s_giamgia==1) echo 'selected = "selected"'; ?>>Giảm Giá 10%</option>
						<option value="2" <?php if($s_giamgia==2) echo 'selected = "selected"'; ?>>Giảm Giá 20%</option>
						<option value="3" <?php if($s_giamgia==3) echo 'selected = "selected"'; ?>>Giảm Giá 30%</option>
						<option value="4" <?php if($s_giamgia==4) echo 'selected = "selected"'; ?>>Giảm Giá 40%</option>
					</select>
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
                        <input name="avatar" type="file"><img src="<?=$s_avatar?>" style="width: 80px; height:80px;"/>
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
        filebrowserBrowseUrl: '../ckfinder/ckfinder.html'
    } );
</script>
</body>
</html>
