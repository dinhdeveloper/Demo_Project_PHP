<?php
    /**
     * Created by PhpStorm.
     * User: Dinht
     * Date: 6/30/2018
     * Time: 7:01 AM
     */
    
    require '../../../libs/database.php';
    $sotin1trang = 6;
    $trang = $_GET["trang"];
    settype($trang, "int");
    $from = ($trang - 1) * $sotin1trang;
    $sql = "SELECT * FROM sanpham ORDER BY MaSanPham ASC
            LIMIT $from,$sotin1trang
            ";
    $result = DataProvider::ExecuteQuery($sql);
    while ($row = mysqli_fetch_array($result)) {
        ?>
        <div class="col-lg-4 col-md-6 mb-4">
            <div class="view overlay z-depth-1-half" style="box-shadow: 0 0 7px rgba(0,0,0,.4);">
                <a href="index.php?id=2&b=<?php echo $row["MaSanPham"]?>"><img src="../../images/sanpham/<?php echo $row["HinhURL"]; ?>"
                                                                               class="img-thumbnail border border-warning"></a>
                <div class="mask rgba-white-slight"></div>
            </div>
            <div style="text-align: center">
                <h5 class="my-4 font-weight-bold" style="color: #04569A"><a
                        href="#" style="text-decoration: none;"><?php echo $row["TenSanPham"]; ?></a></h5>
                <p class="grey-text">Giá: <?php echo $row["Gia"]; ?> đ</p>
                <a href="index.php?id=2&b=<?php echo $row["MaSanPham"]?>">
                    <button type="button" class="btn btn-success">Đặt Hàng</button>
                </a>
            </div>
        </div>
        <?php
    }
?>