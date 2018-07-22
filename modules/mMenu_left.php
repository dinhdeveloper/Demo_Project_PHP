<div class="list-group" id="menu_left">
	<a class="list-group-item list-group-item-action list-group-item-success">
		<img src="images/icon/list-2x.png">&nbsp;&nbsp;<strong>DANH MỤC SẢN PHẨM</strong>
	</a>
	<?php
        $sql = "SELECT * FROM loaisanpham WHERE BiXoa = 0";
        $result = DataProvider::ExecuteQuery($sql);
        while ($row = mysqli_fetch_array($result)) {
            ?>
			<a class="list-group-item list-group-item-action" href="index.php?a=<?php echo $row["MaLoaiSanPham"]?>"><?php echo $row["TenLoaiSanPham"] ?></a>
            <?php
        }
	?>
</div>