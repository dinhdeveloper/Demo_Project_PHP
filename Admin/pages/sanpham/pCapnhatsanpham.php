<?php
//include_once '../../../../libs/database.php';
if (isset($_POST['capnhatsanpham'])) {
    $sql = "SELECT * FROM sanpham";
    $result = DataProvider::ExecuteQuery($sql);
    $row = mysqli_fetch_array($result);
    $masanpham = $_POST['masanpham'];
    $tensanpham = $_POST['tensanpham'];
    $ngaynhap = $_POST['ngaynhap'];
    $gia = $_POST['gia'];
    $maloaisanpham = $_POST['maloaisanpham'];
    $mota = $_POST['mota'];
    if (isset($_FILES['hinhanh'])) {
        $errors = array();
        $file_name = $_FILES['hinhanh']['name'];
        if ($file_name=="")
        {
            $hinhanh = $row["HinhURL"];
        }
       else{
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
           $hinhanh = $_FILES['hinhanh']['name'];
       }
    }
    if ($tensanpham == "" || $ngaynhap == ""||$gia=="") {
        echo '<script>alert("Vui lòng nhập đầy đủ trường thông tin")</script>';
    }
    else{
        $sql ="UPDATE sanpham SET TenSanPham = '$tensanpham',Gia = '$gia',MaLoaiSanPham = '$maloaisanpham',
					MoTa = '$mota',NgayNhap = '$ngaynhap',HinhURL = '$hinhanh' WHERE MaSanPham = '$masanpham'";
        $result = DataProvider::ExecuteQuery($sql);
        if ($result) {
            echo '<script>alert("Cập nhật thành công")</script>';
            //header("location: ../../Admin/dangnhapadmin.php");
        } else {
            echo '<script>alert("Cập nhật không thành công")</script>';
        }
    }
}
?>
<div class="container">
    <form class="form-control" method="post" enctype="multipart/form-data">
        <h4 style="color: red;border-bottom: 1px solid #0b0b0b;display: inline-block;">Cập Nhật Sản Phẩm</h4>
        <div class="form-group col-md-6">
            <label for="tensanpham"><strong><h6>Tên Sản Phẩm</h6></strong></label>
            <input type="text" name="tensanpham" class="form-control" id="tensanpham" placeholder="Tên sản phẩm">
        </div>
        <div class="form-group col-md-6">
            <label for="masanpham"><strong><h6>Mã Sản Phẩm</h6></strong></label>
            <input type="text" name="masanpham" class="form-control" id="masanpham"
                   placeholder="Mã loại sản phẩm">
        </div>
        <div class="form-group col-md-6">
            <label for="maloaisanpham"><strong><h6>Mã Loại Sản Phẩm</h6></strong></label>
            <input type="text" name="maloaisanpham" class="form-control" id="maloaisanpham"
                   placeholder="Mã loại sản phẩm">
        </div>
        <div class="form-group col-md-6">
            <label for="gia"><strong><h6>Giá</h6></strong></label>
            <input type="text" name="gia" class="form-control" id="gia"
                   placeholder="Giá">
        </div>
        <div class="form-group col-md-4">
            <label for="ngaynhap"><strong><h6>Ngày Nhập</h6></strong></label>
            <input type="date" class="form-control" id="ngaynhap" name="ngaynhap">
        </div>
        <div class="form-group">
            <label for="mota"><strong><h6>Mô tả</h6></strong></label>
            <textarea class="form-control-file" id="mota" rows="3" name="mota" placeholder="Mô Tả Sản Phẩm"></textarea>
        </div>
        <div class="form-group col-md-4">
            <label for="hinhurl"><strong><h6>Hình Đại Diện Sản Phẩm</h6></strong></label>
            <input type="file" class="form-control-file" id="hinhurl" name="hinhanh">
        </div>
        <br>
        <button type="submit" class="btn btn-primary" name="capnhatsanpham">Cập Nhật</button>
    </form>
</div>
<br>