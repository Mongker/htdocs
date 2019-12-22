<?php 
	include_once('../../../config/config.php');
 ?>

<?php 
	$khoamoi = $_POST["khoamoi"];

	if($khoamoi == NULL){ ?>
		<div class="alert alert-warning fade in" role="alert">
      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      	<strong>ERROR!</strong> Tên Khoa không được để trống.
    	</div>
	<?php } else{
		 mysqli_query($conn,"INSERT INTO `khoa` (`ten_khoa`) VALUES ('$khoamoi')"); ?>
		 <div class="alert alert-success fade in" role="alert">
      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      	<strong>GOOD!</strong> Thêm khoa mới thành công, mời <strong><a id="rfpage" title="Tải lại" style="color: #FFF">TẢI LẠI TRANG</a></strong>.
    	</div>
    	<script>
    		$('#rfpage').click(function(event) {
    			 location.reload();
    		});
    		
    		$('#themkhoamoi').hide();
    	</script>

	<?php }
 ?>

