<?php 
	include_once('../../../config/config.php');

	$idsua = $_POST["idsua"];
	$tenadmins = $_POST["tenadmins"];
	$tenadminhts = $_POST["tenadminhts"];
	$quantrikhoas = $_POST["quantrikhoas"];
	$sdts = $_POST["sdts"];
	$ngaysinhs = $_POST["ngaysinhs"];

	if($tenadmins == NULL || $tenadminhts == NULL){ ?>

		<div class="alert alert-warning fade in" role="alert">
      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      	<strong>ERROR!</strong> Tên Admin không được để trống.
    	</div>

	<?php }
	else{
		$sql = "UPDATE `tai_khoan` SET `ten_tai_khoan` = '$tenadmins', `ten_sinh_vien` = '$tenadminhts', `khoa_sinh_vien` = '$quantrikhoas', `sdt` = '$sdts', `ngay_sinh` = '$ngaysinhs' WHERE `tai_khoan`.`id_tai_khoan` = $idsua";
		mysqli_query($conn, $sql); ?>

		<div class="alert alert-success fade in" role="alert">
      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      	<strong>GOOD!</strong> Sửa Admin thành công, mời <strong><a id="rfpage" title="Tải lại" style="color: #FFF">TẢI LẠI TRANG</a></strong>.
    	</div>

<?php }
?>

<script>
	
	$(document).ready(function() {
		$('#rfpage').click(function(event) {
			location.reload();
		});
	});

</script>