<?php
$makhachhang = "";
if (isset($_POST["makhachhang"]) == true) {
    //Kiểm tra Mã khách hàng có tồn tại trong hệ thống chưa?
    $maKhachHang = $_POST["makhachhang"];

    $sql = "SELECT MaKhachHang FROM khachhang WHERE BiXoa = 0 AND MaKhachHang = '$makhachhang'";
    $result = DataProvider::ExecuteQuery($sql);
    $row = mysqli_fetch_array($result);
    if ($row == null) {
        DataProvider::ChangeURL("index.php?c=404&err_id=2");
    }
} else {
    if (isset($_SESSION["makhachhang"]) == true) {
        $makhachhang = $_SESSION["makhachhang"];
    } else {
        DataProvider::ChangeURL("index.php?c=404&err_id=2");
    }
}

//Tạo thông tin đơn đặt hàng
$ngayDatHang = date('Y-m-d');
$tongThanhTien = $_SESSION["tongthanhtien"];
$maTinhTrangDonDatHang = 1; //Dòng này đang code cứng (Hard code) => Không tốt

$sql = "INSERT INTO dondathang(MaKhachHang, NgayDatHang, TongThanhTien, MaTinhTrangDonDatHang)
 			VALUES ('$makhachhang', '$ngayDatHang', '$tongThanhTien', '$maTinhTrangDonDatHang')";
DataProvider::ExecuteQuery($sql);

$sql = "SELECT MaDonDatHang FROM dondathang ORDER BY MaDonDatHang DESC LIMIT 0, 1";
$result = DataProvider::ExecuteQuery($sql);
$row = mysqli_fetch_array($result);

$maDonDatHang = $row["MaDonDatHang"];

//Tạo chi tiết đơn đặt hàng
$gioHang = unserialize($_SESSION["GioHang"]);
foreach ($gioHang->arrSanPham as $sp) {
    //Insert thông tin của một chi tiết đơn đặt hàng trong giỏ hàng vào CSDL
    $maSanPham = $sp->MaSanPham;
    $soLuong = $sp->SoLuong;
    //Lấy giá bán hiện tại của sản phẩm
    $sql = "SELECT Gia FROM sanpham WHERE MaSanPham = $maSanPham";
    $result = DataProvider::ExecuteQuery($sql);
    $row = mysqli_fetch_array($result);
    $gia = $row["Gia"];
    //Thực hiện Insert vào bảng ChiTietDonDatHang:
    $sql = "INSERT INTO chitietdondathang(MaDonDatHang, MaSanPham, SoLuong, GiaBan)
 				VALUES($maDonDatHang, $maSanPham, $soLuong, $gia)";
    DataProvider::ExecuteQuery($sql);
}
?>
    <h3 style="color:red;text-align: center">ĐƠN ĐẶT HÀNG ĐƯỢC XỬ LÝ, BẠN VUI LÒNG KIỂM TRA LẠI</h3>
<?php
$sql = "SELECT TenSanPham FROM sanpham WHERE MaSanPham = '$maSanPham'";
$result = DataProvider::ExecuteQuery($sql);
while ($row = mysqli_fetch_array($result)) {
    $tensanpham = $row["TenSanPham"];
}


$sql = "SELECT * FROM khachhang WHERE MaKhachHang = '$makhachhang'";
$result = DataProvider::ExecuteQuery($sql);
$row = mysqli_fetch_array($result);
$hoten = $row["HoTen"];
$diachi = $row["DiaChi"];
$sodienthoai = $row["SoDienThoai"];
?>
    <form action="index.php?c=7&id=<?php echo $maDonDatHang ?>" method="post"
          style="text-align: center;background-color: white">
        <h4>Tên Khách Hàng: <?php echo $hoten ?></h4>
        <h4>Địa Chỉ: <?php echo $diachi ?></h4>
        <h4>Số Điện Thoại: <?php echo $sodienthoai ?></h4>
        <?php
        $sql = "SELECT * FROM sanpham WHERE MaSanPham = '$maSanPham'";
        $result = DataProvider::ExecuteQuery($sql);
        foreach ($gioHang->arrSanPham as $sp) {
            $maSanPham = $sp->MaSanPham;
            $soLuong = $sp->SoLuong;
            $sql = "SELECT * FROM sanpham WHERE MaSanPham = '$sp->MaSanPham'";
            $result = DataProvider::ExecuteQuery($sql);
            while ($row = mysqli_fetch_array($result)) {
                ?>
                <h4>Sản Phẩm: <?php echo $row['TenSanPham'] ?></h4> <h4>Giá bán: <?php echo number_format($row['Gia']) ?></h4>
                <h4>Số Lượng: <?php echo $soLuong
                    ?></h4>
                <?php
            }
        }
        ?>
        <h4>Thành Tiền: <?php echo number_format($tongThanhTien) ?></h4>
        <button type="submit">Xong</button>
    </form>
<?php
//Xóa thông tin giỏ hàng sau khi đã đặt hàng
	unset($_SESSION["GioHang"]);
	$_SESSION["TongThanhTien"] = 0;
//DataProvider::ChangeURL("index.php?c=7&id=$maDonDatHang");
?>