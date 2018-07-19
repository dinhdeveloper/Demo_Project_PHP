<?php
	if(isset($_POST["hdMaSanPham"]) == false){
		DataProvider::ChangeURL("index.php?c=404");
	} else {
		$id = $_POST["hdMaSanPham"];
		$soLuong = $_POST["txtSoLuong"];
		$gioHang = unserialize($_SESSION["GioHang"]);
		$gioHang->CapNhat($id, $soLuong);
		$_SESSION["GioHang"] = serialize($gioHang);
		
		DataProvider::ChangeURL("index.php?c=5");
	}
?>