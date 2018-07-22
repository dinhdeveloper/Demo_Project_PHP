<br>
<div class="shadow-lg p-3 mb-5 bg-white rounded">
    <h4 style="text-align: center;color: red">
        <strong>
            <img src="images/icon/hot.gif">
            SẢN PHẨM XEM NHIỀU NHẤT
            <img src="images/icon/hot.gif">
        </strong>
    </h4>
</div>
<div class="row">
    <?php
        $sql = "SELECT * FROM sanpham WHERE BiXoa = 0 ORDER BY RAND(SoLuotXem >=60) DESC LIMIT 0,6";
        //$sql = "SELECT * FROM `sanpham` WHERE SoLuotXem >=60";
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