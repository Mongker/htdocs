<?php include_once('../config/config.php');
 	session_start();
		if($_SESSION["taikhoan"] == NULL){ ?>
			<script>
				window.location.href="../tai-khoan/dang-nhap.php";
			</script>
		<?php } elseif($_SESSION["nhomtk"] != 1){ ?>
		      <script>
	    	window.location.href="../index.php";
	    	</script>
		    </div>
		<?php }else { ?>

		<?php
			$qrad = mysqli_query($conn, "SELECT `nhom_tai_khoan` FROM `tai_khoan` WHERE `nhom_tai_khoan` = 1");

			$qrkhoa = mysqli_query($conn, "SELECT `ten_khoa` FROM `khoa`");

			$qrlop = mysqli_query($conn, "SELECT `ten_lop` FROM `lop`");

			$qrsv = mysqli_query($conn, "SELECT `nhom_tai_khoan` FROM `tai_khoan` WHERE `nhom_tai_khoan` = 0");
		?>

		<div style="font-size: 30px;">
			Bảng Điều Khiển
		</div>
		<hr><br>
			<div class="row" id="bangdk">
			<center>
				<div class="col-xs-6 col-md-6 col-md-3 col-lg-3">
					<div class="thongtindk">
					<table width="100%">
					<tr>
					<td>
						<span class="glyphicon glyphicon-tower icon"></span>
					</td>
					<td align="right">
						<span class="numdk"><?php echo mysqli_num_rows($qrad);?></span> <br>
						<span class="textdk">ADMIN</span>
					</td>
					</tr>
					</table>
					<hr>
					<a href="admin.php">
					Xem chi tiết
					<span class="glyphicon glyphicon-arrow-right" style="float: right;"></span>
					</a>
					</div>
				</div>

				<div class="col-xs-6 col-md-6 col-md-3 col-lg-3">
					<div class="thongtindk">
					<table width="100%">
					<tr>
					<td>
						<span class="glyphicon glyphicon-th-large icon"></span>
					</td>
					<td align="right">
						<span class="numdk"><?php echo mysqli_num_rows($qrkhoa);?></span> <br>
						<span class="textdk">KHOA</span>
					</td>
					</tr>
					</table>
					<hr>
					<a href="khoa/?menu=khoa">
					Xem chi tiết
					<span class="glyphicon glyphicon-arrow-right" style="float: right;"></span>
					</a>
					</div>
				</div>

				<div class="col-xs-6 col-md-6 col-md-3 col-lg-3">
					<div class="thongtindk">
					<table width="100%">
					<tr>
					<td>
						<span class="glyphicon glyphicon-th-list icon"></span>
					</td>
					<td align="right">
						<span class="numdk"><?php echo mysqli_num_rows($qrlop);?></span> <br>
						<span class="textdk">LỚP</span>
					</td>
					</tr>
					</table>
					<hr>
					<a href="khoa/?menu=lop">
					Xem chi tiết
					<span class="glyphicon glyphicon-arrow-right" style="float: right;"></span>
					</a>
					</div>
				</div>

				<div class="col-xs-6 col-md-6 col-md-3 col-lg-3">
					<div class="thongtindk">
					<table width="100%">
					<tr>
					<td>
						<span class="glyphicon glyphicon-user icon"></span>
					</td>
					<td align="right">
						<span class="numdk"><?php echo mysqli_num_rows($qrsv);?></span> <br>
						<span class="textdk">SINH VIÊN</span>
					</td>
					</tr>
					</table>
					<hr>
					<a href="?menu=quanlysv">
					Xem chi tiết
					<span class="glyphicon glyphicon-arrow-right" style="float: right;"></span>
					</a>
					</div>
				</div>
				</center>
			</div>
<?php } ?>

<script>
 	$(document).ready(function() {
 		$('a#bangdk').addClass('chon');
 		$('a#themsv').removeClass('chon');
 		$('a#quanlysv').removeClass('chon');
 		$('a#quanlykhoa').removeClass('chon');
 	});
 </script>