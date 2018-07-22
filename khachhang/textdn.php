<?php
include '../../libs/database.php';
$un = $_POST["un"];
$sql = "SELECT * FROM nhanvien WHERE TenDangNhap = '$un'";
$result = DataProvider::ExecuteQuery($sql);
$dong = mysqli_num_rows($result);
echo $dong;
?>