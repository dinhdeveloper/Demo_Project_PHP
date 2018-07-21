<script type="text/javascript" src="../js/jquery/jquery-3.3.1.min.js"></script>
<script type="text/javascript" src="../js/jquery/jquery-3.3.1.js"></script>
<?php
    $a = 1;
    if (isset($_GET["a"])) {
        $a = $_GET["a"];
        settype($a,"int");
    }
    $sql = "SELECT * FROM loaisanpham  WHERE BiXoa = 0 AND MaLoaiSanPham =$a";
    $result = DataProvider::ExecuteQuery($sql);
    while ($row1 = mysqli_fetch_array($result)) {
        ?>
		<div class="p-3 mb-2 bg-info text-white">
			<h5><strong><?php echo $row1["TenLoaiSanPham"]?></strong></h5>
		</div><br>
    <?php }
?>
<div class="row" style="background-color: white">
    <?php
        //$sql = "SELECT * FROM sanpham ORDER BY MaLoaiSanPham = $a DESC LIMIT 0,6";
        $sql = "SELECT * FROM sanpham WHERE BiXoa = 0 AND MaLoaiSanPham = '$a' LIMIT 0,6 ";
        $result = DataProvider::ExecuteQuery($sql);
        while ($row = mysqli_fetch_array($result)) {
            ?>
			<div class="col-lg-4 col-md-6 mb-4">
				<div class="view overlay z-depth-1-half" style="box-shadow: 0 0 7px rgba(0,0,0,.4);">
					<a href="index.php?c=2&id=<?php echo $row["MaSanPham"]?>"><img src="images/sanpham/<?php echo $row["HinhURL"]; ?>"
									 class="img-thumbnail border border-warning"></a>
					<div class="mask rgba-white-slight"></div>
				</div>
				<div style="text-align: center">
					<h5 class="my-4 font-weight-bold" style="color: #04569A"><a
								href="#" style="text-decoration: none;"><?php echo $row["TenSanPham"]; ?></a></h5>
					<p class="grey-text">Giá: <?php echo number_format($row["Gia"]); ?> đ</p>
					<a href="index.php?c=101&id=<?php echo $row["MaSanPham"]?>">
						<button type="button" class="btn btn-success">Đặt Hàng</button>
					</a>
				</div>
			</div>
            <?php
        }
    ?>
<!--	<div id="danhsach"></div>-->
<!--	<button id="" onclick="load_ajax()">Xem Thêm</button>-->
	<!--Load ajax phan trang-->
	<?php
        $sql = "SELECT * FROM sanpham WHERE BiXoa = 0 AND MaLoaiSanPham = $a";
        $result = DataProvider::ExecuteQuery($sql);
        $row = mysqli_fetch_array($result);
    ?>
			<a href="index.php?c=3&a=<?php echo $row["MaLoaiSanPham"] ?>" style="margin-left: 750px;font-size: 19px" class="text-danger">
				<strong>Xem Thêm</strong>
			</a>
</div>
