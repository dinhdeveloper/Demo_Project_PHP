<tr>
    <td class="center"><strong><?php echo $maSanPham; ?></strong></td>
    <td width="100"><?php echo $tenSanPham; ?></td>
    <td><?php echo $tenLoaiSanPham; ?></td>
    <td width="100"><img src="images/sanpham/<?php echo $hinhURL; ?>" width="80px" height="80px" /></td>
    <td width="100"><?php echo number_format($gia); ?></td>
    <td><?php echo $ngayNhap; ?></td>
    <td class="center"><?php echo $soLuongBan; ?></td>
    <td class="center"><?php echo $soLuotXem; ?></td>
    <td width="100"><?php echo $moTa; ?></td>
    <td class="center">
        <?php
        if($biXoa == 0){
            echo "<a href='main.php?c=4&k=402&id=$maSanPham'><img src='images/icon/active.png' /></a>";
        } else {
            echo "<a href='main.php?c=4&k=402&id=$maSanPham'><img src='images/icon/locked.png' /></a>";
        }
        ?>
    </td>
    <td>
        <a href="main.php?c=4&k=3&id=<?php echo $maSanPham; ?>">
            <img src="images/icon/edit.png" />
        </a>
        <a href="main.php?c=4&k=401&id=<?php echo $maSanPham; ?>">
            <img src="images/icon/delete.png" />
        </a>
    </td>
</tr>