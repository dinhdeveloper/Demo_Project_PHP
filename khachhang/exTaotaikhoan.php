<?php
session_start();
include ("../libs/database.php");
if (isset($_POST['dangky'])) {
    $fullname = $_POST['hovaten'];
    $address = $_POST['diachi'];
    $password = $_POST['matkhau'];
    $phone = $_POST['sodienthoai'];
    $_SESSION['SHoTen'] = $_POST['hovaten'];
    $_SESSION['SSodienthoai'] = $_POST['sodienthoai'];
    $_SESSION['SMatkhau'] = $_POST['matkhau'];
    $sql = "SELECT * FROM khachhang WHERE  SoDienThoai = '$phone'";
    $result = DataProvider::ExecuteQuery($sql);
    $row = mysqli_fetch_array($result);
    if ($phone==$row["SoDienThoai"] || $fullname==""||$password==""||$phone==""||$address==""){
        echo '<script>alert("Số điện thoại đã tồn tại và nhập đủ trường thông tin")</script>';
        DataProvider::ChangeURL("../khachhang/pTaotaikhoan.php");
    }
    else{
        $sql1 = "INSERT INTO khachhang (MaKhachHang,HoTen,DiaChi,SoDienThoai,MatKhau,BiXoa)
			VALUES (null,'$fullname','$address','$phone','$password','0')";
        $result = DataProvider::ExecuteQuery($sql1);
        if ($result) {
            echo '<script>alert("Đăng ký thành công")</script>';
            DataProvider::ChangeURL("../index.php");
        } else {
            echo '<script>alert("Đăng ký không thành công")</script>';
        }
    }
}
?>