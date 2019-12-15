<?php 
	include_once('header.php');
?>
<?php 
	if($_SESSION["taikhoan"] == NULL){ ?>
		<script>
			window.location.href="tai-khoan/dang-nhap.php";
		</script>
	<?php } else { ?>
		<script>
			window.location.href="thong-tin.php";
		</script>
	<?php }
 ?>

<?php 
	include_once('footer.php');
?>