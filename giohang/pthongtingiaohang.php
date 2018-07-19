<?php
	/**
	 * Created by PhpStorm.
	 * User: Dinht
	 * Date: 7/5/2018
	 * Time: 7:36 PM
	 */
	
	
	if (isset($_POST['hovaten'])== false){
		//DataProvider::ChangeURL ("index.php?c=404");
	}
	else{
		$hoten = $_POST['hovaten'];
		$diachi = $_POST['diachi'];
		$sodienthoai = $_POST['sodienthoai'];
		$sql ="INSERT INTO khachhang(HoTen,DiaChi,SoDienThoai)
				VALUES('$hoten','$diachi','$sodienthoai')";
		$result = DataProvider::ExecuteQuery ($sql);
		$sql = "SELECT MaKhachHang FROM khachhang WHERE BiXoa = 0 ORDER BY MaKhachHang DESC LIMIT 0,1";
		$result = DataProvider::ExecuteQuery ($sql);
		$row = mysqli_fetch_array($result);
		$makhachhang = $row["MaKhachHang"];
		$_SESSION["makhachhang"] = $makhachhang;
		DataProvider::ChangeURL ("index.php?c=104");
	}
?>

<div id="quanlygiohang">

    <form class="form-inline-row-m4" style="" name="thongtindathang" method="post">
        <h2>Thông Tin Giao Hàng</h2>
        <div class="form-group">
            <label for="hovaten">Họ Và Tên</label>
            <input type="text" class="form-control" name="hovaten" id="hovaten" placeholder="Họ và tên">
        </div>
        <div class="form-group">
            <label for="diachi">Địa chỉ</label>
            <input type="text" class="form-control" name="diachi" id="diachi" placeholder="Địa chỉ">
        </div>
        <div class="form-group">
            <label for="sodienthoai">Số Điện Thoại</label>
            <input type="text" class="form-control" name="sodienthoai" id="sodienthoai" placeholder="Số điện thoại">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Đăng ký</button>
        </div>
    </form>

    <form class="form-inline-row-m4" style="" action="index.php?c=104" name="thongtindathang" method="post">
        <div class="form-group">
            <label for="makhachhang">Mã Khách Hàng</label>
            <input type="text" class="form-control" name="makhachhang" id="makhachhang" placeholder="Mã Khách Hàng">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Đặt Hàng</button>
        </div>
    </form>
</div>