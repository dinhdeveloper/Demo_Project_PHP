<?php
if(isset($_GET["id"])){
    $maNhanVien = $_GET["id"];
    $sql = "UPDATE NhanVien SET matkhau = '123' WHERE manhanvien = $maNhanVien";
    DataProvider::ExecuteQuery($sql);
    DataProvider::ChangeURL("main?c=102");
} else {
    DataProvider::ChangeURL("main.php?c=404");
}
?>