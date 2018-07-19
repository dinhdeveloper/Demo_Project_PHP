<?php
    if (isset($_POST['capnhat'])) {
        //định nghĩa
        $fullname = $_POST['hovatenmoi'];
        $username = $_POST['tendangnhapmoi'];
        $password = md5($_POST['matkhaumoi']);
        $email = $_POST['emailmoi'];
        $phone = $_POST['sodienthoaimoi'];
        //lưu session:
        $id = $_SESSION['SMaNhanVien'];
        $_SESSION['Stendangnhap'] = $_POST['tendangnhapmoi'];
        $_SESSION['SHoTen'] = $_POST['hovatenmoi'];
        $_SESSION['SEmail'] = $_POST['emailmoi'];
        $_SESSION['SSodienthoai'] = $_POST['sodienthoaimoi'];
        $_SESSION['SMatkhau'] = $_POST['matkhaumoi'];
        if (isset($_FILES['hinhanhmoi'])) { // kiểm tra file tải lên
            $errors = array();
            $file_name = $_FILES['hinhanhmoi']['name'];
            if ($file_name == "") {
                $hinhanh = $_SESSION['SHinh'];
            } else {
                $file_size = $_FILES['hinhanhmoi']['size'];
                $file_tmp = $_FILES['hinhanhmoi']['tmp_name'];
                $file_type = $_FILES['hinhanhmoi']['type'];
                if ($file_size > 2097152) {
                    $errors[] = 'Kích cỡ file lớn hơn 2 MB';
                }
                if (empty($errors) == true) {
                    move_uploaded_file($file_tmp, "modules/logo/" . $file_name);
                } else {
                    print_r($errors);
                }
                $hinhanh = $_FILES['hinhanhmoi']['name'];
            }
        }
        $_SESSION['SHinh'] = $hinhanh;
        if ($fullname == "" || $username == "" || $password == "" || $email == "" || $phone == "") {
            echo '<script>alert("Vui lòng nhập đầy đủ trường thông tin")</script>';
        } else { //update dũ liệu:
            $sql1 = "UPDATE nhanvien
SET HinhNhanVien = '$hinhanh',TenDangNhap='$username',MatKhau='$password',HoTen='$fullname',
Email='$email',SoDienThoai='$phone' WHERE MaNhanVien = '$id'";
            $result = DataProvider::ExecuteQuery($sql1);
            if ($result) {
                echo '<script>alert("Cập nhật thành công")</script>';
            } else {
                echo '<script>alert("Cập nhật không thành công")</script>';
            }
        }
    }
?>
<table>
	<div class="container">
		<form class="form-login" action="" method="post" enctype="multipart/form-data">
			<h4 class="form-login-heading" style="color: red"><strong>Cập Nhật Tài Khoản</strong></h4>
			<p style="color:#F00; padding-top:20px;"
			   align="center"></p>
			<div class="login-wrap">
				Họ Và Tên: <input type="text" value="<?php echo $_SESSION['SHoTen']; ?>" name="hovatenmoi"
								  class="form-control" id="fullname" placeholder="Họ Và Tên" autofocus>
				<br>
				<div id="kiemtraname"></div>
				<br>
				Tên Đăng Nhập: <input type="text" value="<?php echo $_SESSION['Stendangnhap']; ?>" name="tendangnhapmoi"
									  class="form-control" id="username" placeholder="Tên Đăng Nhập"
									  autofocus>
				<br>
				<div id="kiemtrauser"></div>
				<br>
				Mật Khẩu:<input type="password" value="<?php //echo $_SESSION['SMatkhau']; ?>" name="matkhaumoi"
								class="form-control" id="password" placeholder="Mật khẩu">
				<br>
				<div id="kiemtrapass"></div>
				<br>
				Email: <input type="email" value="<?php echo $_SESSION['SEmail']; ?>" name="emailmoi"
							  class="form-control" id="email" placeholder="Địa Chỉ Email" autofocus>
				<br>
				<div id="kiemtraemail"></div>
				<br>
				Số Điện Thoại: <input type="text" value="<?php echo $_SESSION['SSodienthoai']; ?>" name="sodienthoaimoi"
									  class="form-control" id="numberphone" placeholder="Số Điện Thoại"
									  autofocus>
				<br>
				<div id="kiemtraphone"></div>
				<br>
				<input type="file" name="hinhanhmoi" id="images" autofocus>
				<br>
				<div id="kiemtraimg"></div>
				<br>
				<button type="submit" class="btn btn-primary" name="capnhat">Cập Nhật
				</button>
			</div>
		</form>
		<br>
	</div>

</table>
