<?php 
	include_once('../config/config.php');
	$taikhoanlg =  addslashes($_POST["taikhoanlg"]);
	$matkhaulg = sha1(md5($_POST["matkhaulg"]));

	$kiemtra = "SELECT * FROM `tai_khoan` WHERE 
	`ten_tai_khoan` = '".$taikhoanlg."' AND `mat_khau` = '".$matkhaulg."'";
	$chay = mysqli_query($conn, $kiemtra);
	$xem = mysqli_fetch_assoc($chay);

	if($taikhoanlg == NULL || $matkhaulg == NULL){ ?>
		<div class="alert alert-warning fade in" role="alert">
      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      	<strong>ERROR!</strong> Các trường nhập không được để trống.
    	</div>
	<?php } else{
	if(mysqli_num_rows($chay) > 0){
		session_start();
		$_SESSION["taikhoan"] = $xem["ten_tai_khoan"];
		$_SESSION["nhomtk"] = $xem["nhom_tai_khoan"];
		$_SESSION["tensv"] = $xem["ten_sinh_vien"];
		$_SESSION["avatar"] = $xem["anh_dai_dien"];
		$_SESSION["lopsv"] = $xem["lop_sinh_vien"];
		$_SESSION["khoasv"] = $xem["khoa_sinh_vien"];
		$_SESSION["ns"] = $xem["ngay_sinh"];
		$_SESSION["sdt"] = $xem["sdt"];
	 ?>
		<div class="alert alert-success fade in" role="alert">
      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      	<strong>GOOD!</strong> Đăng nhập thành công, trở về trang chủ sau 2s.
    	</div>
    	<script>
    	window.setTimeout(function(){window.location.href="../index.php";}, 2000);
    	</script>
	<?php } else { ?>
		<div class="alert alert-warning fade in" role="alert">
      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      	<strong>ERROR!</strong> Tài khoản or Mật khẩu không chính xác.
    	</div>
	<?php }}
	mysqli_close($conn);
 ?>