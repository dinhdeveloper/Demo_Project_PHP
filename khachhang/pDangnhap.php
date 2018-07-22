<?php
//session_start();
//include("../../WebHoa/libs/database.php");
//if (isset($_POST['login'])) {
//    $adminusername = $_POST['tendangnhap'];
//    $pass = $_POST['matkhau'];
//    //$sql = "SELECT MaNhanVien FROM nhanvien WHERE TenDangNhap='$ddminusername' AND MatKhau='$pass' ";
//    $sql = "SELECT * FROM nhanvien WHERE TenDangNhap = '$adminusername' AND MatKhau = '$pass'";
//    $result = DataProvider::ExecuteQuery($sql);
////        $sql1 = "SELECT MaNhanVien FROM nhanvien WHERE TenDangNhap='$ddminusername' AND MatKhau='$pass' ";
////       $result1 =  DataProvider::ExecuteQuery($sql);
//    $num = mysqli_fetch_array($result);
//    if ($num > 0) {
//        $extra = "index.php";
//        $_SESSION['SMaNhanVien'] = $num['MaNhanVien'];
//        $_SESSION['Stendangnhap'] = $_POST['tendangnhap'];
//        $_SESSION['SHoTen'] = $num['HoTen'];
//        $_SESSION['SHinh'] = $num['HinhNhanVien'];
//        $_SESSION['SEmail'] = $num['Email'];
//        $_SESSION['SSodienthoai'] = $num['SoDienThoai'];
//        $_SESSION['SQuyenNguoiDung'] = $num['QuyenNguoiDung'];
//        echo "<script>window.location.href='../Admin/" . $extra . "'</script>";
//        exit();
//    } else {
//        $_SESSION['action1'] = "Tên đăng nhập hoặc mật khẩu sai";
//        $extra = "index.php";
//        echo "<script>window.location.href='" . $extra . "'</script>";
//        exit();
//    }
//}
//?>
<div id="login-page">
    <div class="container">
        <form class="form-login" action="" method="post">
            <h2 class="form-login-heading"><strong>ĐĂNG NHẬP</strong></h2>
            <p style="color:#F00; padding-top:20px;"
               align="center"></p> <!--<?php //echo $_SESSION['action1']; ?><?php //echo $_SESSION['action1'] = ""; ?>-->
            <div class="login-wrap">
                <input type="text" name="tendangnhap" class="form-control" id="username" placeholder="Tên đăng nhập" autofocus>
                <br>
                <div id="kiemtrauser"></div>
                <br>
                <input type="password" name="matkhau" class="form-control" id="password" placeholder="Mật khẩu"><br>
                <div id="kiemtrapass"></div><br>
                <button type="submit" class="btn btn-primary" name="login"
                        style="margin-left: 190px">Đăng Nhập</button>
                <!--				<a href="../pages/taikhoan/pTaotaikhoanadmin.php" style="text-align: center">Tạo tài khoản</a>-->
            </div>
        </form>

    </div>
</div>
<script src="../assets/js/jquery.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../assets/js/jquery.backstretch.min.js"></script>
