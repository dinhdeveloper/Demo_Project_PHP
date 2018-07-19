
<body>
<form method="post" style="padding: 25px">
	<?php
        $id =1;
        if(isset($_GET['id'])){
            $id = $_GET['id'];
        }
        $sql = "SELECT TenLoaiSanPham FROM loaisanpham WHERE MaLoaiSanPham = $id";
        $result = DataProvider::ExecuteQuery($sql);
        while($row1 = mysqli_fetch_array($result)) {
            ?>
			<h4 style="color: red"><?php echo $row1["TenLoaiSanPham"]?></h4>
            <?php
        }
	?>
    <table class="table">
        <thead class="thead-light">
        <tr>
            <th scope="col">Mã Sản Phẩm</th>
            <th scope="col">Tên Sản Phẩm</th>
            <th scope="col">Loại Sản Phẩm</th>
			<th scope="col">Hình Ảnh</th>
            <th scope="col">Giá</th>
            <th scope="col">Ngày Nhập</th>
            <th scope="col">Số Lượng Tồn</th>
            <th scope="col">Số Lượng Bán</th>
            <th scope="col">Số Lượt Xem</th>
            <th scope="col">Trạng Thái</th>
            <th scope="col">Mô Tả</th>
            
        </tr>
        </thead>
        <?php
            $sql = "SELECT * FROM sanpham WHERE MaLoaiSanPham = $id";
            $result = DataProvider::ExecuteQuery($sql);
            while($row = mysqli_fetch_array($result)){
                ?>
                <tr>
                    <th scope="row"><?php echo $row["MaSanPham"];?></th>
                    <td><?php echo $row["TenSanPham"]; ?></td>
                    <td><?php
                            switch ($row["MaLoaiSanPham"])
                            {
                                case 1:
                                    echo 'Hoa Hồng';
                                    break;
                                case 2:
                                    echo 'Hoa Ly';
                                    break;
                                case 3:
                                    echo 'Hoa Lan';
                                    break;
                                case 4:
                                    echo 'Hoa Sen';
                                    break;
                                case 5:
                                    echo 'Hoa Hướng Dương';
                                    break;
                                case 6:
                                    echo 'Hoa Mẫu Đơn';
                                    break;
                                case 7:
                                    echo 'Hoa Cẩm Chướng';
                                    break;
                                case 8:
                                    echo 'Gấu Bông';
                                    break;
                                case 9:
                                    echo 'Socola';
                                    break;
                                case 10:
                                    echo 'Bánh Kem';
                                    break;
                                    case 11:
									echo 'Hoa Khai Trương';
									break;
                                case 12:
                                    echo 'Hoa Chúc Mừng';
                                    break;
                                case 13:
                                    echo 'Hoa Sinh Nhật';
                                    break;
                            }
                        ?></td>
					<td><a href="#"><img src="images/sanpham/<?php echo $row["HinhURL"]; ?>"
										 style="height: 80px;width: 80px"></a></td>
                    <td><?php echo number_format ($row["Gia"]); ?> đ</td>
                    <td><?php echo $row["NgayNhap"]; ?></td>
                    <td style="text-align: center"><?php echo $row["SoLuongTon"]; ?></td>
                    <td style="text-align: center"><?php echo $row["SoLuongBan"]; ?></td>
                    <td style="text-align: center"><?php echo $row["SoLuotXem"]; ?></td>
                    <td style="text-align: center"><img src="modules/logo/active.png" alt=""><?php //echo $row["BiXoa"]; ?></td>
                    <td><a href="#"><img src="modules/logo/edit.png"></a></td>
                </tr>
                <?php
            }
        ?>
    </table>
	<a href="main.php?c=201">Quay lại</a>
</form>
<br>
<br>


