<?php
    /**
     * Created by PhpStorm.
     * User: Dinht
     * Date: 6/30/2018
     * Time: 4:51 AM
     */
    
    include '../libs/database.php';
    $un = $_GET["un"];
    $sql = "SELECT * FROM sanpham WHERE MaSanPham = $un";
    $result = DataProvider::ExecuteQuery($sql);
    $row1 = mysqli_num_rows($result); //Hàm mysqli_num_rows() sẽ trả về số hàng trong tập hợp kết quả truyền vào.
//    $row = mysqli_fetch_array($result);
//        for ($i=0;$i<=$row["MaSanPham"];$i++)
//        {
//            $i = $row["TenSanPham"];
//        }
//        echo $i;
        echo $row1;
    ?>