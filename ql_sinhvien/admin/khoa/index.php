<?php
	$title = "Quản Lý tai-khoan - ";
	include_once('../../header.php');
 ?>
<div class="container-fluid">
	<?php
		if($_SESSION["taikhoan"] == NULL){ ?>
			<script>
				window.location.href="../../tai-khoan/dang-nhap.php";
			</script>
		<?php } elseif($_SESSION["nhomtk"] != 1){ ?>
			<div class="alert alert-danger fade in" role="alert" style="max-width:400px;margin:0 auto">
		      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
		      <strong>ERROR!</strong> Bạn không đủ quyền để truy cập trang này, trở lại trang chủ sau 3s.
		      <script>
	    	window.setTimeout(function(){window.location.href="/index.php";}, 3000);
	    	</script>
		    </div>
		<?php }else {
			include_once('quan-tri.php');
		}
	 ?>
</div>
 <?php
	include_once('../../footer.php');
 ?>