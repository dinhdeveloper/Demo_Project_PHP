<body>
<form method="post" style="padding: 25px">
    <h4 style="color: red">Danh Sách Tất Cả Sản Phẩm</h4>
    <table class="table">
        <thead class="thead-light">
        <tr>
            <th scope="col">Mã CT ĐĐH</th>
            <th scope="col">Mã Đơn Đặt Hàng</th>
            <th scope="col">Mã Sản Phẩm</th>
            <th scope="col">Số Lượng</th>
            <th scope="col">Giá Bán</th>
        </tr>
        </thead>
		<?php
            $id = $_GET['id'];
			$sql = "SELECT * FROM chitietdondathang WHERE MaDonDatHang = '$id'";
			$result = DataProvider ::ExecuteQuery ($sql);
			while ($row = mysqli_fetch_array ($result)) {
				?>
                <tr>
                    <th scope="row" style="padding-left: 40px"><?php echo $row["MaChiTietDonDatHang"]; ?></th>
                    <td style="padding-left: 50px"><?php echo $row["MaDonDatHang"]; ?></td>
                    <td style="padding-left: 40px"><?php echo $row["MaSanPham"]; ?></td>
                    <td style="padding-left: 40px"><?php echo $row["SoLuong"]; ?></td>
                    <td><?php echo number_format ($row["GiaBan"]); ?> đ</td>
                </tr>
				<?php
			}
		?>
    </table>
</form>
