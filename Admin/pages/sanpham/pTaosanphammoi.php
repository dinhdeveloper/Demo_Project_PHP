<?php
	//include_once '../../../../libs/database.php';
    if (isset($_POST['taosanpham'])) {
        $tensanpham = $_POST['tensanpham'];
        $maloaisanpham = $_POST['maloaisanpham'];
        $gia = $_POST['gia'];
        $mota = $_POST['mota'];
        $ngaynhap = $_POST['ngaynhap'];
        if (isset($_FILES['hinhanh'])) {// kiểm tra file
            $errors = array();
            $file_name = $_FILES['hinhanh']['name'];
            $file_size = $_FILES['hinhanh']['size'];
            $file_tmp = $_FILES['hinhanh']['tmp_name'];
            $file_type = $_FILES['hinhanh']['type'];
            if ($file_size > 2097152) {
                $errors[] = 'Kích cỡ file nên là 2 MB';
            }
            if (empty($errors) == true) {
                move_uploaded_file($file_tmp, "images/sanpham/" . $file_name);
            } else {
                print_r($errors);
            }
        }
        $hinhanh = $_FILES['hinhanh']['name'];
        if ($tensanpham == "" || $maloaisanpham == "" || $gia == "" || $ngaynhap == "") {
            echo '<script>alert("Vui lòng nhập đầy đủ trường thông tin")</script>';
        } else {
     		$sql = "INSERT INTO sanpham(MaSanPham,TenSanPham,MaLoaiSanPham,Gia,MoTa,HinhURL,BiXoa)
					VALUES(null,'$tensanpham','$maloaisanpham','$gia','$mota','$hinhanh',0)";
     		$result = DataProvider::ExecuteQuery($sql);
            if ($result) {
                echo '<script>alert("Tạo SP thành công")</script>';
                //header("location: ../../Admin/dangnhapadmin.php");
            } else {
                echo '<script>alert("Tạo SP không thành công")</script>';
            }
        }
    }
?>
<div class="container">
	<form class="form-control" enctype="multipart/form-data" method="post">
		<h4 style="color:red; border-bottom: 1px solid #0b0b0b ;display: inline-block">Tạo Sản Phẩm Mới</h4>
		<div class="form-group col-md-6">
			<label for="tensanpham"><strong><h6>Tên Sản Phẩm</h6></strong></label>
			<input type="text" name="tensanpham" class="form-control" id="tensanpham" placeholder="Tên sản phẩm">
		</div>
		<div class="form-group col-md-6">
			<label for="maloaisanpham"><strong><h6>Mã Loại Sản Phẩm</h6></strong></label>
			<input type="text" name="maloaisanpham" class="form-control" id="maloaisanpham"
				   placeholder="Mã loại sản phẩm">
		</div>
		<div class="form-group col-md-4">
			<label for="gia"><strong><h6>Giá</h6></strong></label>
			<input type="text" name="gia" class="form-control" id="gia" placeholder="Giá">
		</div>
		<div class="form-group col-md-4">
			<label for="ngaynhap"><strong><h6>Ngày Nhập</h6></strong></label>
			<input type="date" name="ngaynhap" class="form-control" id="ngaynhap">
		</div>
		<div class="form-group col-md-4">
			<label for="hinhurl"><strong><h6>Hình URL</h6></strong></label>
			<input type="file" name="hinhanh" class="form-control-file" id="hinhurl">
		</div>
		<div class="form-group">
			<label for="mota"><strong><h6>Mô tả</h6></strong></label>
			<textarea class="form-control-file" id="mota" rows="3" name="mota"></textarea>
		</div>
		<br>
		<button type="submit" class="btn btn-primary" name="taosanpham">Tạo sản phẩm</button>
	</form>
</div>
<br>