<?php
	//include_once '../../../../libs/database.php';
    if (isset($_POST['taosanpham'])) {
        $tenloaisanpham = $_POST['tenloaisanpham'];
        $ngaynhap = $_POST['ngaynhap'];
        if (isset($_FILES['hinhanh'])) {
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
        if ($tenloaisanpham == "" || $ngaynhap == "") {
            echo '<script>alert("Vui lòng nhập đầy đủ trường thông tin")</script>';
        }
        else{
        	$sql ="INSERT INTO loaisanpham(MaLoaiSanPham,HinhMinhHoaLSP,TenLoaiSanPham,NgayNhap,BiXoa)
					VALUES (null,'$hinhanh','$tenloaisanpham','$ngaynhap',0)";
            $result = DataProvider::ExecuteQuery($sql);
            if ($result) {
                echo '<script>alert("Tạo LSP thành công")</script>';
                //header("location: ../../Admin/dangnhapadmin.php");
            } else {
                echo '<script>alert("Tạo LSP không thành công")</script>';
            }
		}
    }
?>
<div class="container">
	<form class="form-control" method="post" enctype="multipart/form-data">
		<h4 style="color: red;border-bottom: 1px solid #0b0b0b;display: inline-block;">Tạo Loại Sản Phẩm Mới</h4>
		<div class="form-group col-md-6">
			<label for="tenloaisanpham"><strong><h6>Tên Loại Sản Phẩm</h6></strong></label>
			<input type="text" name="tenloaisanpham" class="form-control" id="tenloaisanpham" placeholder="Tên sản phẩm">
		</div>
<!--		<div class="form-group col-md-6">-->
<!--			<label for="maloaisanpham"><strong><h6>Mã Loại Sản Phẩm</h6></strong></label>-->
<!--			<input type="text" name="maloaisanpham" class="form-control" id="maloaisanpham"-->
<!--				   placeholder="Mã loại sản phẩm">-->
<!--		</div>-->
		<div class="form-group col-md-4">
			<label for="ngaynhap"><strong><h6>Ngày Nhập</h6></strong></label>
			<input type="date" class="form-control" id="ngaynhap" name="ngaynhap">
		</div>
		<div class="form-group col-md-4">
			<label for="hinhurl"><strong><h6>Hình Đại Diện Loại Sản Phẩm</h6></strong></label>
			<input type="file" class="form-control-file" id="hinhurl" name="hinhanh">
		</div>
		<br>
		<button type="submit" class="btn btn-primary" name="taosanpham">Tạo loại sản phẩm</button>
	</form>
</div>
<br>