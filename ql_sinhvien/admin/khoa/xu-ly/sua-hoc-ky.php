<?php 
	include_once('../../../config/config.php');

	$idhk = $_POST["idhk"];
	$tenhk = $_POST["suahk"];
	$cuasualop = $_POST["cuasualop"];

	if($tenhk == NULL || $cuasualop == NULL){ ?>

		<div class="alert alert-warning fade in" role="alert">
      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      	<strong>ERROR!</strong> Tên Lớp, Khoa không được để trống.
    	</div>

	<?php }
	else{
		$sql = "UPDATE `hoc_ky` SET `ten_hoc_ky` = '$tenhk', `ten_lop` = '$cuasualop' WHERE `hoc_ky`.`id_hoc_ky` = $idhk";
		mysqli_query($conn, $sql); ?>

		<div class="alert alert-success fade in" role="alert">
      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      	<strong>GOOD!</strong> Sửa học kỳ thành công, mời <strong><a id="rfpage" title="Tải lại" style="color: #FFF">TẢI LẠI TRANG</a></strong>.
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