<?php 
	include_once('../../../config/config.php');

	$idmh = $_POST["idmh"];
	$tenmhsua = $_POST["tenmhsua"];
	$sotinchisua = $_POST["sotinchisua"];
	$thuoclopsua = $_POST["thuoclopsua"];
	$thuochksua = $_POST["thuochksua"];

	if($tenmhsua == NULL || $sotinchisua == NULL || $thuoclopsua == NULL || $thuochksua == NULL){ ?>

		<div class="alert alert-warning fade in" role="alert">
      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      	<strong>ERROR!</strong> Các trường không được để trống.
    	</div>

	<?php }
	else{
		$sql = "UPDATE `mon_hoc` SET `ten_mon_hoc` = '$tenmhsua', `so_tin_chi` = '$sotinchisua', `ten_lop` = '$thuoclopsua', `id_hoc_ky` = '$thuochksua' WHERE `mon_hoc`.`id_mon_hoc` = $idmh";
		mysqli_query($conn, $sql); ?>

		<div class="alert alert-success fade in" role="alert">
      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      	<strong>GOOD!</strong> Sửa Môn học thành công, mời <strong><a id="rfpage" title="Tải lại" style="color: #FFF">TẢI LẠI TRANG</a></strong>.
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