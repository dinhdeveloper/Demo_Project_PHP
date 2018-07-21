<?php
if (isset($_POST['capnhatsanpham'])) {
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
            DataProvider::ChangeURL("main.php?c=4");
        } else {
            echo '<script>alert("Cập nhật không thành công")</script>';
            DataProvider::ChangeURL("main.php?c=4");
        }
    }
}
?>