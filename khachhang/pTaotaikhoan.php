<!DOCTYPE html>
<html lang="vn">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="Dashboard">
    <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
    <script type="text/javascript" src="../js/jquery/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="../js/jquery/jquery-3.3.1.js"></script>
    <title>Đăng Ký Tài Khoản</title>
    <link href="../assets/css/bootstrap.css" rel="stylesheet">
    <link href="../assets/font-awesome/css/font-awesome.css" rel="stylesheet"/>
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="../assets/css/style-responsive.css" rel="stylesheet">
    <link rel="icon" href="../images/favicon/favicon-32x32.png" sizes="32x32">
</head>
<body>
<div id="login-page">
    <div class="container">
        <form class="form-login" action="exTaotaikhoan.php" method="post" enctype="multipart/form-data">
            <h2 class="form-login-heading"><strong>ĐĂNG KÝ</strong></h2>
            <p style="color:#F00; padding-top:20px;"
               align="center"></p>
            <div class="login-wrap">
                <input type="text" name="hovaten" class="form-control" id="fullname" placeholder="Họ và tên" autofocus>
                <br>
                <div id="kiemtraname"></div>
                <br>
                <input type="text" name="diachi" class="form-control" id="diachi" placeholder="Địa Chỉ Giao Hàng"
                       autofocus>
                <br>
                <div id="kiemtrauser"></div>
                <br>
                <input type="password" name="matkhau" class="form-control" id="password" placeholder="Mật khẩu"
                       autofocus>
                <br>
                <div id="kiemtrapass"></div>
                <br>
                <input type="text" name="sodienthoai" class="form-control" id="numberphone" placeholder="Số điện thoại"
                       autofocus>
                <br>
                <div id="kiemtraphone"></div>
                <br>
                <button type="submit" class="btn btn-primary" name="dangky"
                        style="margin-left: 200px">Đăng Ký
                </button>
                <a href="../../WebHoa/khachhang/pDangnhap.php"><strong>Quay lại đăng nhập</strong></a>
            </div>
        </form>
    </div>
</div>
<script src="../assets/js/jquery.js"></script>
<script src="../assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="../assets/js/jquery.backstretch.min.js"></script>
</body>
</html>
