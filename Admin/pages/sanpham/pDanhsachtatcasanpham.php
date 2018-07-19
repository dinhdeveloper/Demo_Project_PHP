<style>
    #menu li {
        color: red;
        float: left;
        width: 40px;
        line-height: 30px;
    }
    #menu ul {
        list-style-type: none;
        overflow: hidden;
        width: 100%;
    }
    #menu a {
        text-decoration: none;
        color: blue;
        display: block;
    }
    #menu a:hover {
        color: red;
    }
</style>

<body>
<form method="post" style="padding: 25px">
    <h4 style="color: red">Danh Sách Tất Cả Sản Phẩm</h4>
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
		<!--phân trang-->
        <?php
            $sql = "SELECT COUNT(MaSanPham) as total FROM sanpham WHERE BiXoa =0";
            $result = DataProvider::ExecuteQuery($sql);
            $row = mysqli_fetch_array($result);
            $total_records = $row['total'];
            $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
            $limit = 10;
            $total_page = ceil($total_records / $limit);
            if ($current_page > $total_page) {
                $current_page = $total_page;
            } else if ($current_page < 1) {
                $current_page = 1;
            }
            $start = ($current_page - 1) * $limit;
            $sql = "SELECT MaSanPham,TenSanPham,MaLoaiSanPham,Gia,SoLuongTon,SoLuongBan,SoLuotXem,NgayNhap,
 				BiXoa,MoTa, HinhURL FROM sanpham LIMIT $start, $limit";
            $result = DataProvider::ExecuteQuery($sql);
        ?>
        <?php
//            $sql = "SELECT * FROM sanpham";
//            $result = DataProvider::ExecuteQuery($sql);
            while($row = mysqli_fetch_array($result)){
                ?>
                <tr>
                    <th scope="row"style="text-align: center"><?php echo $row["MaSanPham"];?></th>
                    <td><?php echo $row["TenSanPham"]; ?></td>
                    <td><?php
                            switch ($row["MaLoaiSanPham"]) // gán mã loại sản phẩm cho từng tên loại sản phẩm
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
										 style="height: 80px;width: 80px"></a>
					</td>
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
	
		<div id="menu">
            <ul class="" style="padding-left: 280px;">
				<?php
					for ($i = 1; $i <= $total_page; $i++) {
						if ($i == $current_page) {
							echo '<li class="page-item active"><a class="page-link" href="#">' . $i . '</a></li>';
						} else {
							echo '<li class="page-item"><a class="page-link" href="main.php?c=301&page=' . $i . '">' . $i . '</a></li>';
						}
					}
				?>
            </ul>
        </div>
	
</form>
