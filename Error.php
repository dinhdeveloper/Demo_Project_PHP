<script language="JavaScript">
    alert("Quậy web bố hả mày");
</script>
<h1>Quay ha BUOI!!!</h1>
<?php
	$err_id = 1;
	if(isset($_GET["err_id"])){
		$err_id = $_GET["err_id"];
	}
	
	switch ($err_id){
		case 1:
			echo "<h3>Chức năng không tồn tại</h3>";
			break;
		case 2:
			echo "<h3>Mã khách hàng không tồn tại. Vui lòng nhập lại hoặc tạo thông tin khách hàng mới</h3>";
			break;
	}
?>