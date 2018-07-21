<form method="post" style="padding: 25px" action="main.php?c=3&k=2">
	<h4 style="color: red">Danh Sách Loại Sản Phẩm</h4>
	<table class="table">
		<thead class="thead-light">
		<tr>
			<th scope="col">Mã LSP</th>
			<th scope="col">Hình Ảnh</th>
			<th scope="col">Tên Loại Sản Phẩm</th>
			<th scope="col">Tình Trạng</th>
			<th scope="col">Thao Tác</th>
		</tr>
		</thead>
        <?php
        $sql = "SELECT * FROM LoaiSanPham";
        $result = DataProvider::ExecuteQuery($sql);
        while($row = mysqli_fetch_array($result)){
            $maLoaiSanPham = $row["MaLoaiSanPham"];
            $tenLoaiSanPham = $row["TenLoaiSanPham"];
            $biXoa = $row["BiXoa"];
            $hinhAnh = $row["HinhMinhHoaLSP"];
            include("pages/loaisanpham/tDanhsachloaisanpham.php");
        }
        ?>
	</table>
</form>