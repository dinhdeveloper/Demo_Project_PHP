<?php
    session_start ();
    include 'libs/database.php';
	include("libs/GioHang.php");
// session_destroy();
	if(isset($_SESSION["GioHang"]) == false){
		$gioHang = new GioHang();
		$_SESSION["GioHang"] = serialize($gioHang);
	}
?>
<!doctype html>
<html lang="vn">
<head>
	<meta charset="UTF-8">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Shop Flower Corner</title>
	<link rel="icon" href="images/favicon/favicon-32x32.png" sizes="32x32">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css"
		  integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">
	<link rel="stylesheet" href="css/style.css">
	<script type="text/javascript" src="js/jquery/jquery-3.3.1.min.js"></script>
	<script type="text/javascript" src="js/jquery/jquery-3.3.1.js"></script>
</head>
<body style="overflow-x: hidden;">
<?php include 'modules/mHeader.php'; ?>
<div class="main-header">
	<a href="index.php"><img src="images/icon/backroungh.jpg" class="img-backrounght"></a>
</div>
<br>
<div class="container">
	<div class="row">
		<div class="col-md-3">
            <?php
                include 'modules/mMenu_left.php';
            ?>
		</div><!-- menu-left-->
		<div class="col-md-9">
            <?php
                $c = 1;
                if (isset($_GET['c'])) {
                    $c = $_GET['c'];
                }
                switch ($c) {
                    case 1:
                        include 'pages/pDanhmucsanpham.php';
                        break;
                    case 2:
                        include 'pages/pChitietsanpham.php';
                        break;
                    case 3:
                        include 'pages/pXemthemsanpham.php';
                        break;
                    case 4:
                        include 'modules/mHotrokhachhang.php';
                        break;
                    case 5:
                        include 'giohang/quanlygiohang.php';
                        break;
                    case 6:
                        include 'giohang/pthongtingiaohang.php'; // thông tin khách hàng
                        break;
                    case 7:
                        include 'giohang/thongbaothanhcong.php';
                        break;
                        //khách hàng:
                    case 10:
                        include ("khachhang/pIndex.php"); //xử lý khách hàng
                    break;
                    case 101:
                        include 'giohang/themsanphamvaogiohang.php';
                        break;
                    case 102:
                        include 'giohang/capnhatsoluongsanpham.php';
                        break;
                    case 103:
                        include 'giohang/exThongTinGiaoHang.php'; // tạo thông tin
                        break;
					case 104:
						include 'giohang/pdathang.php'; // đặt hàng
						break;
                    default:
                        include("Error.php");
                }
            ?>
		</div><!-- danh sách sản phẩm-->
	</div>
	<div>
        <?php
            include 'pages/pSanphambannhieunhat.php';
            include 'pages/pSanphamxemnhieunhat.php';
            include 'modules/mHotrokhachhang.php';
        ?>
	</div>
</div>
<?php
include 'modules/mFooter.php';
?>
<!--nút cuộn lên đầu trang-->
<script type="text/javascript">
	(function () {
		$('#cuon').click(function () {
			$('body,html').animate({scrollTop: 0}, 600);
			return false;
		})
	})(jQuery);
</script>
<a href="#"><p><img src="images/icon/cuon.png" id="cuon"></p></a>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
		integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
		crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
		integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49"
		crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"
		integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T"
		crossorigin="anonymous"></script>
</body>
</html>
