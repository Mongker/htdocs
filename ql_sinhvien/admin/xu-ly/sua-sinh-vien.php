<?php 
	include_once('../../config/config.php');
	$idsv = (int)$_POST["idsv"];
	$tensv = htmlspecialchars($_POST["tensv"]);
	$svkhoa = htmlspecialchars($_POST["svkhoa"]);
	$svlop = htmlspecialchars($_POST["svlop"]);
	$sdt = htmlspecialchars($_POST["sdt"]);
	$ngaysinh = htmlspecialchars($_POST["ngaysinh"]);
	$nhanxet = htmlspecialchars($_POST["nhanxet"]);

	$sqlkhoa = "SELECT `ten_khoa` FROM `khoa` WHERE `id_khoa` = '$svkhoa'";
	$qrkhoa = mysqli_query($conn, $sqlkhoa);
	$rowkhoa = mysqli_fetch_assoc($qrkhoa);
	$ten_khoa = $rowkhoa["ten_khoa"];

	$sqlmonhoc = "SELECT * FROM `mon_hoc` WHERE `ten_lop` = '$svlop' AND `id_hoc_ky` = '$hk'";
	$qrmonhoc = mysqli_query($conn, $sqlmonhoc);

	if($tensv == NULL || $svkhoa == NULL || $svlop == NULL || $sdt == NULL || $ngaysinh == NULL){ ?>
		<div class="alert alert-warning fade in" role="alert">
      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      	<strong>ERROR!</strong> Các trường nhập không được để trống.
    	</div>
	<?php }
	else
	{
		$suasv = "UPDATE `tai_khoan` SET `ten_sinh_vien` = '$tensv', `lop_sinh_vien` = '$svlop', `khoa_sinh_vien` = '$ten_khoa', `sdt` = '$sdt', `ngay_sinh` = '$ngaysinh', `nhan_xet` = '$nhanxet' WHERE `tai_khoan`.`id_tai_khoan` = $idsv";
		mysqli_query($conn, $suasv); ?>

			<div class="alert alert-success fade in" role="alert">
	      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
	      	<strong>GOOD!</strong> Sửa thành công cho Sinh viên <strong><?php echo $tensv;?></strong>,<br> Vui lòng <a href="#" id="rfpage" title="Tải Lại Trang" style="color: #FFF;font-weight: bold;">TẢI LẠI TRANG.</a>
	    	</div>

		<?php } ?>
<script>
	$(document).ready(function() {

		$('#rfpage').click(function(event) {
			location.reload();
		});
	});
</script>