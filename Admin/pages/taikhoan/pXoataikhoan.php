<?php
if(isset($_GET["id"])){
    $maNhanVien = $_GET["id"];
    $sql = "UPDATE nhanvien SET BiXoa = 1 - BiXoa WHERE MaNhanVien = $maNhanVien";
    DataProvider::ExecuteQuery($sql);
    DataProvider::ChangeURL("main.php");
} else {
    DataProvider::ChangeURL("main.php?c=404");
}
?>