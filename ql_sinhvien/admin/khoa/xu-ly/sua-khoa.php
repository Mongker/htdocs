<?php 
	include_once('../../../config/config.php');

	$idkhoa = $_POST["idkhoa"];
	$suakhoa = $_POST["suakhoa"];

	if($suakhoa == NULL){ ?>

		<div class="alert alert-warning fade in" role="alert">
      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      	<strong>ERROR!</strong> Tên khoa không được để trống.
    	</div>

	<?php }
	else{
		$sql = "UPDATE `khoa` SET `ten_khoa` = '$suakhoa' WHERE `khoa`.`id_khoa` = $idkhoa";
		mysqli_query($conn, $sql); ?>

		<div class="alert alert-success fade in" role="alert">
      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      	<strong>GOOD!</strong> Sửa khoa thành công, mời <strong><a id="rfpage" title="Tải lại" style="color: #FFF">TẢI LẠI TRANG</a></strong>.
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