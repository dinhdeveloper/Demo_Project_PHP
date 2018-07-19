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
	<h4 style="color: red">Danh Sách Loại Sản Phẩm</h4>
	<table class="table">
		<thead class="thead-light">
		<tr>
			<th scope="col">Mã Loại Sản Phẩm</th>
			<th scope="col">Hình Ảnh</th>
			<th scope="col">Tên Loại Sản Phẩm</th>
			<th scope="col">Ngày Nhập</th>
			<th scope="col">Tình Trạng</th>
			<th scope="col">Chi Tiết</th>
		</tr>
		</thead>
        <?php
            $sql = "SELECT MaLoaiSanPham, HinhMinhHoaLSP,NgayNhap,TenLoaiSanPham,BiXoa FROM loaisanpham";
            $result = DataProvider::ExecuteQuery($sql);
            while ($row = mysqli_fetch_array($result)) {
                ?>
				<tr>
					<th scope="row" style="padding-left: 50px"><?php echo $row["MaLoaiSanPham"]; ?></th>
					<td><img src="images/sanpham/<?php echo $row["HinhMinhHoaLSP"]; ?>"
							 style="width: 80px;height: 80px"></td>
					<td><a href="main.php?c=204&id=<?php echo $row["MaLoaiSanPham"]?>"><?php echo $row["TenLoaiSanPham"]; ?></a></td>
					<td><?php echo $row["NgayNhap"]; ?></td>
					<td style="padding-left: 30px"><img src="modules/logo/active.png"><?php //echo $row["BiXoa"]; ?></td>
					<td><a href="main.php?c=204&id=<?php echo $row["MaLoaiSanPham"]?>"><img src="modules/logo/edit.png"></a></td>
				</tr>
                <?php
            }
        ?>
	</table>
</form>
</body>
</html>
