<?php 
	include_once('../../../config/config.php');
 ?>

<?php 
	$tenmonhoc = $_POST["tenmonhoc"];
	$sotinchi = $_POST["sotinchi"];
  $thuoclop = $_POST["thuoclop"];
  $thuochocky = $_POST["thuochocky"];

	if($tenmonhoc == NULL || $thuoclop == NULL || $thuochocky == NULL){ ?>
		<div class="alert alert-warning fade in" role="alert">
      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      	<strong>ERROR!</strong> Các trường nhập không được để trống.
    	</div>
	<?php }
   else{

      $sql = "INSERT INTO `mon_hoc` (`id_mon_hoc`, `ma_mon_hoc`, `ten_mon_hoc`, `so_tin_chi`, `id_hoc_ky`, `ten_lop`) VALUES (NULL, '', '$tenmonhoc', '$sotinchi', '$thuochocky', '$thuoclop')";
      mysqli_query($conn, $sql);

?>

		 <div class="alert alert-success fade in" role="alert">
      	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
      	<strong>GOOD!</strong> Thêm môn học mới thành công, mời <strong><a id="rfpage" title="Tải lại" style="color: #FFF">TẢI LẠI TRANG</a></strong>.
    	</div>

<script>
        $('#rfpage').click(function(event) {
             location.reload();
        });
        
        $('#themmhmoi').hide();
      </script>
    	
	<?php }
 ?>


