<br>
<div class="shadow-lg p-3 mb-5 bg-white rounded">
    <h4 style="text-align: center;color: red">
        <strong>
            <img src="images/icon/hot.gif">
            SẢN PHẨM BÁN CHẠY NHẤT
            <img src="images/icon/hot.gif">
        </strong>
    </h4>
</div>
<!--phan trang-->
<?php
    //	$p =1;
    //    if (isset($_GET["p"])) {
    //        $a = $_GET["p"];
    //    }
    //    $sql = "SELECT COUNT(MaSanPham) as total FROM sanpham WHERE MaLoaiSanPham = $p";
    //    $result = DataProvider::ExecuteQuery($sql);
    //    $row = mysqli_fetch_array($result);
    //    $total_records = $row['total'];
    //    $current_page = isset($_GET['page']) ? $_GET['page'] : 1;
    //    $limit = 6;
    //    $total_page = ceil($total_records / $limit);
    //    if ($current_page > $total_page) {
    //        $current_page = $total_page;
    //    } else if ($current_page < 1) {
    //        $current_page = 1;
    //    }
    //    $start = ($current_page - 1) * $limit;
    //    $sql = "SELECT MaSanPham,TenSanPham,MaLoaiSanPham,Gia,SoLuongTon,SoLuongBan,SoLuotXem,
    // 				BiXoa,MoTa, HinhURL FROM sanpham LIMIT $start, $limit";
    //    $result = DataProvider::ExecuteQuery($sql);
    //?>
<div class="row">
    <?php
        $sql = "SELECT * FROM sanpham WHERE BiXoa = 0 ORDER BY SoLuongBan >=50 DESC LIMIT 0,6 ";
        $result = DataProvider::ExecuteQuery($sql);
        while ($row = mysqli_fetch_array($result)) {
            ?>
            <div class="col-lg-4 col-md-6 mb-4">
                <div class="view overlay z-depth-1-half">
                    <a href="index.php?c=2&id=<?php echo $row["MaSanPham"]?>"><img src="images/sanpham/<?php echo $row["HinhURL"]; ?>"
                                     class="img-thumbnail border border-warning"></a>
                    <div class="mask rgba-white-slight"></div>
                </div>
                <div style="text-align: center">
                    <h5 class="my-4 font-weight-bold" style="color: #04569A"><a
                            href="index.php?c=2&id=<?php echo $row["MaSanPham"]?>" style="text-decoration: none;"><?php echo $row["TenSanPham"]; ?></a></h5>
                    <p class="grey-text">Giá: <?php echo number_format($row["Gia"]); ?> đ</p>
                    <a href="index.php?c=101&id=<?php echo $row["MaSanPham"]?>">
                        <button type="button" class="btn btn-success">Đặt Hàng</button>
                    </a>
                </div>
            </div>
            <?php
        }
    ?>
</div>
<!--<nav aria-label="Page navigation example">-->
<!--	<ul class="pagination">-->
<!--        --><?php
    //            if ($current_page > 1 && $total_page > 1) {
    //                echo '<li class="page-item"><a class="page-link" href="index.php?page=' . ($current_page - 1) . '">Previous</a></li>';
    //            }
    //            for ($i = 1; $i <= $total_page; $i++) {
    //                if ($i == $current_page) {
    //                    echo '<li class="page-item active"><a class="page-link" href="#">' . $i . '</a></li>';
    //                } else {
    //                    echo '<li class="page-item"><a class="page-link" href="index.php?page=' . $i . '">' . $i . '</a></li>';
    //                }
    //            }
    //            if ($current_page < $total_page && $total_page > 1) {
    //                echo '<li class="page-item"><a class="page-link" href="index.php?page=' . ($current_page + 1) . '">Next</a></li>';
    //            }
    //        ?>
<!--	</ul>-->
<!--</nav>-->