<?php
    $a = 1;
    if (isset($_GET["a"])) {
        $a = $_GET["a"];
        settype($a,"int");
    }
    $sql = "SELECT * FROM loaisanpham WHERE BiXoa = 0 AND MaLoaiSanPham =$a";
    $result = DataProvider::ExecuteQuery($sql);
    while ($row1 = mysqli_fetch_array($result)) {
        ?>
        <div class="p-3 mb-2 bg-danger text-white">
            <h5><strong><?php echo $row1["TenLoaiSanPham"]?></strong></h5>
        </div><br>
    <?php }
?>
<div class="row">
    <?php
        $a = 1;
        if (isset($_GET["a"])) {
            $a = $_GET["a"];
            settype($a,"int");
        }
        $sql = "SELECT * FROM sanpham WHERE BiXoa = 0 AND MaLoaiSanPham = $a";
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
                            href="#" style="text-decoration: none;"><?php echo $row["TenSanPham"]; ?></a></h5>
                    <p class="grey-text">Giá: <?php echo number_format ($row["Gia"]); ?> đ</p>
                    <a href="index.php?c=101&id=<?php echo $row["MaSanPham"]?>">
                        <button type="button" class="btn btn-success">Đặt Hàng</button>
                    </a>
                </div>
            </div>
            <?php
        }
    ?>
</div>