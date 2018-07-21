<div class="container">
    <?php
        $id = 1;
        if (isset($_GET["id"])) {
			$id = $_GET["id"];
            settype($id,"int");
        }
        $sql = "SELECT MaSanPham,TenSanPham,MaLoaiSanPham,Gia,SoLuongBan,SoLuotXem,
 				BiXoa,MoTa, HinhURL FROM sanpham WHERE masanpham =$id";
        $result = DataProvider::ExecuteQuery($sql);
        while ($row = mysqli_fetch_array($result)) {
            ?>
			<div class="row">
				<div class="col-md-4">
					<img src="images/sanpham/<?php echo $row["HinhURL"]; ?>"
						 class="img-thumbnail border border-warning"
						 style="width: 245px;height: 300px">
				</div>
				<div class="col-md-5 border-bottom-0">
					<div class="alert alert-warning" role="alert">
						<h4 style="text-align: center"><strong><?php echo $row["TenSanPham"]; ?></strong></h4>
					</div>
					<div style="padding-left: 50px">
						<h4>Giá: <strong><?php echo number_format($row["Gia"]) ?></strong>  đồng</h4>
						<h5>Loại Sản Phẩm:
                            <?php
                                switch ($row["MaLoaiSanPham"])
                                {
                                    case 1:
                                        echo '<strong>Hoa Hồng</strong>';
                                        break;
                                    case 2:
                                        echo '<strong>Hoa Ly</strong>';
                                        break;
                                    case 3:
                                        echo '<strong>Hoa Lan</strong>';
                                        break;
                                    case 4:
                                        echo '<strong>Hoa Sen</strong>';
                                        break;
                                    case 5:
                                        echo '<strong>Hoa Hướng Dương</strong>';
                                        break;
                                    case 6:
                                        echo '<strong>Hoa Mẫu Đơn</strong>';
                                        break;
                                    case 7:
                                        echo '<strong>Hoa Cẩm Chướng</strong>';
                                        break;
                                    case 8:
                                        echo '<strong>Gấu Bông</strong>';
                                        break;
                                    case 9:
                                        echo '<strong>Socola</strong>';
                                        break;
                                    case 10:
                                        echo '<strong>Bánh Kem</strong>';
                                        break;
                                    case 11:
                                        echo '<strong>Hoa Khai Trương</strong>';
                                        break;
                                    case 12:
                                        echo '<strong>Hoa Chúc Mừng</strong>';
                                        break;
                                    case 13:
                                        echo '<strong>Hoa Sinh Nhật</strong>';
                                        break;
                                }
                            ?>
						</h5>
                        <?php
                            $sql = "UPDATE sanpham SET SoLuotXem = SoLuotXem +1 WHERE MaSanPham = $id";
                            $result = DataProvider::ExecuteQuery($sql);
                        ?>
						<h5>Số Lượt Xem: <strong><?php echo $row["SoLuotXem"] ?></strong></h5>
						<h5>Mô Tả: <?php echo $row["MoTa"] ?></h5>
                        <a href="index.php?c=101&id=<?php echo $id;?>">
                            <button type="button" class="btn btn-success">Đặt Hàng</button>
                        </a>
<!--                        <a href="index.php?c=101&id=--><?php //echo $id;?><!--">Đặt Hàng</a>-->
					</div>
				</div>
				<div class="col-md-3">
                    <?php
                        $id = 1;
                        if (isset($_GET["id"])) {
                            $id = $_GET["id"];
                            settype($id,"int");
                        }
                        //$sql = "SELECT * FROM sanpham ORDER BY MaLoaiSanPham = $a DESC LIMIT 0,6";
                        $sql = "SELECT * FROM sanpham ORDER BY RAND() LIMIT 0,2";
                        $result = DataProvider::ExecuteQuery($sql);
                        while ($row = mysqli_fetch_array($result)) {
                            ?>
							<div class="view overlay z-depth-1-half">
								<a href="index.php?c=2&id=<?php echo $row["MaSanPham"]?>"><img src="images/sanpham/<?php echo $row["HinhURL"]; ?>"
												 class="img-thumbnail border border-warning"></a>
								<div class="mask rgba-white-slight"></div>
							</div>
							<div style="text-align: center">
								<h5 class="my-4 font-weight-bold" style="color: #04569A"><a
											href="#"
											style="text-decoration: none;"><?php echo $row["TenSanPham"]; ?></a></h5>
								<p class="grey-text">Giá: <?php echo number_format($row["Gia"]); ?> đ</p>
							</div>
                            <?php
                        }
                    ?>
				</div>
			</div>
            <?php
        }
    ?>
</div>
</div>