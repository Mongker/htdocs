<?php 
	include_once('../../../config/config.php');

	$idlop = $_POST["idlop"];
	$tenlop = $_POST["sualop"];
	$thuockhoa = $_POST["thuockhoa"];

	if($tenlop == NULL || $thuockhoa == NULL){ ?>

		<div class="alert alert-warning fade in" role="alert">
      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      	<strong>ERROR!</strong> Tên Lớp, Khoa không được để trống.
    	</div>

	<?php }
	else{
		$sql = "UPDATE `lop` SET `ten_lop` = '$tenlop', `id_khoa` = '$thuockhoa' WHERE `lop`.`id_lop` = $idlop";
		mysqli_query($conn, $sql); ?>

		<div class="alert alert-success fade in" role="alert">
      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      	<strong>GOOD!</strong> Sửa lớp thành công, mời <strong><a id="rfpage" title="Tải lại" style="color: #FFF">TẢI LẠI TRANG</a></strong>.
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