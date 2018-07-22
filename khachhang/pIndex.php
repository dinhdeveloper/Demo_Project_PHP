<?php
$k = 1;
if(isset($_GET["k"])){
    $k = $_GET["k"];
}

switch($k){
    case 1:
        include("khachhang/pDangnhap.php");
        break;
    case 2:
        include("khachhang/pTaotaikhoan.php");
        break;

    case 201:
        include("khachhang/");
        break;
    default:
        DataProvider::ChangeURL("main.php?c=404");

}
?>