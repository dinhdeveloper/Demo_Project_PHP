<?php

?>
<!doctype html>
<html lang="vn">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

</head>
<body>
<form method="post" style="padding: 25px">
	<h4 style="color: red">Danh Sách Đơn Đặt Hàng</h4>
	<table class="table">
		<thead class="thead-light">
		<tr>
			<th scope="col">Mã Đơn Đặt Hàng</th>
			<th scope="col">Mã Khách Hàng</th>
			<th scope="col">Ngày Đặt Hàng</th>
			<th scope="col">Tổng Thành Tiền</th>
			<th scope="col">Tình Trạng ĐĐH</th>
			<th scope="col">Mã Nhân Viên</th>
			<th scope="col">Chi Tiết ĐĐH</th>
		</tr>
		</thead>
		<?php
			$sql = "SELECT MaDonDatHang,MaKhachHang,NgayDatHang,TongThanhTien,MaTinhTrangDonDatHang,MaNhanVien FROM dondathang";
			$result = DataProvider::ExecuteQuery($sql);
			while ($row = mysqli_fetch_array($result)) {
				?>
				<tr>
					<th scope="row" style="padding-left: 50px"><?php echo $row["MaDonDatHang"]; ?></th>
					<td style="text-align: center"><?php echo $row["MaKhachHang"]; ?></td>
					<td><?php echo $row["NgayDatHang"]; ?></td>
					<td style="text-align: center"><?php echo number_format ($row["TongThanhTien"]); ?>  đ</td>
					<td style="text-align: center"><?php echo $row["MaTinhTrangDonDatHang"]; ?></td>
					<td><?php echo $row["MaNhanVien"]; ?></td>
					<td>
                        <a href="main.php?c=402&id=<?php echo $row["MaDonDatHang"]?>">
                            <img src="modules/logo/edit.png" style="padding-left: 30px">
                        </a>
                    </td>
				</tr>
				<?php
			}
		?>
	</table>
</form>
</body>
</html>
