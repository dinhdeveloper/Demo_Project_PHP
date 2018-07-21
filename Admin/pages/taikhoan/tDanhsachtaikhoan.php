<tr>
    <td><?php echo $maNhanVien; ?></td>
    <td><?php echo "<img src='images/avatar/$hinhAnh' style='width: 70px;height: 70px' />"; ?></td>
    <td><?php echo $tenDangNhap; ?></td>
    <td><?php echo $hoTen; ?></td>
    <td><?php echo $email; ?></td>
    <td><?php echo $soDienThoai; ?></td>
    <td class="center">
        <?php
        $hinhBiXoa = ($biXoa == 0) ? "active.png" : "locked.png";
        echo "<img src='images/icon/$hinhBiXoa' />";
        ?>
    </td>
    <td>
        <a href="main.php?c=2&k=101&id=<?php echo $maNhanVien; ?>">
            <img src="images/icon/lock.png" />
        </a>
        <a href="main.php?c=2&k=102&id=<?php echo $maNhanVien; ?>">
            <img src="images/icon/resetkey.jpg" style="width: 30px; height: 30px" />
        </a>
    </td>
</tr>