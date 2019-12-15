<?php 
	include_once('../../../config/config.php');
 ?>

<?php 
	$hockymoi = $_POST["hockymoi"];
	$cualop = $_POST["cualop"];

	if($hockymoi == NULL || $cualop == NULL){ ?>
		<div class="alert alert-warning fade in" role="alert">
      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      	<strong>ERROR!</strong> Các trường nhập không được để trống.
    	</div>
	<?php } else{
		 mysqli_query($conn,"INSERT INTO `hoc_ky` (`ten_hoc_ky`, `ten_lop`) VALUES ('$hockymoi', '$cualop')"); ?>
		 <div class="alert alert-success fade in" role="alert">
      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      	<strong>GOOD!</strong> Thêm học kỳ mới thành công, mời <strong><a id="rfpage" title="Tải lại" style="color: #FFF">TẢI LẠI TRANG</a></strong>.
    	</div>
    	<script>
    		$('#rfpage').click(function(event) {
    			   location.reload();
    		});
    		
    		$('#themhockymoi').hide();
    	</script>

	<?php }
 ?>

