<?php 
	include_once('../../../config/config.php');
 ?>

<?php 
	$lopmoi = $_POST["lopmoi"];
	$thuockhoa = $_POST["thuockhoa"];

	if($lopmoi == NULL || $thuockhoa == NULL){ ?>
		<div class="alert alert-warning fade in" role="alert">
      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      	<strong>ERROR!</strong> Các trường nhập không được để trống.
    	</div>
	<?php } else{
		 mysqli_query($conn,"INSERT INTO `lop` (`id_khoa`, `ten_lop`) VALUES ('$thuockhoa', '$lopmoi')"); ?>
		 <div class="alert alert-success fade in" role="alert">
      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      	<strong>GOOD!</strong> Thêm Lớp mới thành công, mời <strong><a id="rfpage" title="Tải lại" style="color: #FFF">TẢI LẠI TRANG</a></strong>.
    	</div>
    	<script>
    		$('#rfpage').click(function(event) {
    			   location.reload();
    		});
    		
    		$('#themlopmoi').hide();
    	</script>

	<?php }
 ?>

