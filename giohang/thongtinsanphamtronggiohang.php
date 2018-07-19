<?php
	
	$sql = "SELECT MaSanPham, TenSanPham, HinhURL, Gia FROM sanpham WHERE BiXoa = 0 AND MaSanPham = $id";
	$result = DataProvider ::ExecuteQuery ($sql);
	while ($row = mysqli_fetch_array ($result)) {
		$tenSanPham = $row["TenSanPham"];
		$hinhURL = $row["HinhURL"];
		$gia = $row["Gia"];
		?>

        <form name="frmGioHang" action="index.php?c=102" method="post">
            <tr>
                <td><?php echo $STT; ?></td>
                <td><?php echo $tenSanPham; ?></td>
                <td align="center">
                    <img src="img/<?php echo $hinhURL; ?>" width="50">
                </td>
                <td><?php echo $gia; ?></td>
                <td>
                    <input type="number" min="0" max="20" size="10" require name="txtSoLuong"
                           value="<?php echo $soLuong; ?>" width="45" size="5"/>
                    <input type="hidden" name="hdMaSanPham" value="<?php echo $id; ?>"/>
                </td>
                <td>
                    <input type="submit" value="Cập nhật số lượng"/>
                </td>
            </tr>
        </form>
		
		<?php
	}
?>
