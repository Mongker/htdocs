<?php 
	include_once('../../../config/config.php');
	$tenadmin = htmlspecialchars($_POST["tenadmin"]);
	$matkhau = sha1(md5($tenadmin));
	$tenadminht= htmlspecialchars($_POST["tenadminht"]);
	$quantrikhoa = htmlspecialchars($_POST["quantrikhoa"]);
	$sdt = htmlspecialchars($_POST["sdt"]);
	$ngaysinh = htmlspecialchars($_POST["ngaysinh"]);

	$kiemtra = "SELECT `ten_tai_khoan` FROM `tai_khoan` WHERE `ten_tai_khoan` = '$tenadmin'";
	$chay = mysqli_query($conn, $kiemtra);
	$xem = mysqli_fetch_assoc($chay);

	if($tenadmin == NULL || $tenadminht == NULL || $quantrikhoa == NULL || $sdt == NULL || $ngaysinh == NULL){ ?>
		<div class="alert alert-warning fade in" role="alert">
      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      	<strong>ERROR!</strong> Các trường nhập không được để trống.
    	</div>
	<?php }elseif(mysqli_num_rows($chay) > 0){ ?>
		<div class="alert alert-warning fade in" role="alert">
      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      	<strong>ERROR!</strong> Tên tài khoản Admin <span style="font-weight:bold;text-transform: uppercase;text-decoration: underline;">
      	<?php echo $tenadmin;?>
      	</span> Đã tồn tại, Vui lòng chọn tên khác.
    	</div>
	<?php } else{
		$themsv = "INSERT INTO `tai_khoan` (`id_tai_khoan`, `ten_tai_khoan`, `mat_khau`, `nhom_tai_khoan`, `ten_sinh_vien`, `lop_sinh_vien`, `khoa_sinh_vien`, `sdt`, `ngay_sinh`, `anh_dai_dien`, `nhan_xet`, `ngay_tao`) VALUES (NULL, '$tenadmin', '$matkhau', '1', '$tenadminht', '', '$quantrikhoa', '$sdt', '$ngaysinh', 'avatardf.png', '', NOW())";
		mysqli_query($conn, $themsv); ?>
			<div class="alert alert-success fade in" role="alert">
	      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
	      	<strong>GOOD!</strong> Thêm thành công, Vui lòng <a href="#" id="rfpage" title="TẢI LẠI TRANG" style="color: #FFF; font-weight: bold;">TẢI LẠI TRANG</a>.
	    	</div>
		<?php } ?>
<script>
	$(document).ready(function() {
		$('#rfpage').click(function(event) {
			window.location.reload();
		});
	});
</script>