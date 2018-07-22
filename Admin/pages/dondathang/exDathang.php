<?php
if(isset($_GET["id"])){
    $id = $_GET["id"];
    $t = $_GET["t"];
    $maNhanVien = $_SESSION["SMaNhanVien"];

    $sql = "UPDATE DonDatHang Set MaTinhTrangDonDatHang = $t, MaNhanVien = $maNhanVien WHERE MaDonDatHang = $id";
    DataProvider::ExecuteQuery($sql);
    DataProvider::ChangeURL("main.php?c=5");
} else {
    DataProvider::ChangeURL("main.php?c=404");
}
?>