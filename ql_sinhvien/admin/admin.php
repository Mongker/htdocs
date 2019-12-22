<?php
	include_once('../config/config.php');
	$title = "Admin - ";
	include_once('../header.php');
 ?>
<?php
		if($_SESSION["taikhoan"] == NULL){ ?>
			<script>
				window.location.href="../tai-khoan/dang-nhap.php";
			</script>
		<?php } elseif($_SESSION["nhomtk"] != 1){ ?>
			<div class="alert alert-danger fade in" role="alert" style="max-width:400px;margin:0 auto">
		      <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
		      <strong>ERROR!</strong> Bạn không đủ quyền để truy cập trang này, trở lại trang chủ sau 3s.
		      <script>
	    	window.setTimeout(function(){window.location.href="../index.php";}, 3000);
	    	</script>
		    </div>
		<?php }else {?>
	<!-- Navbar -->
	<div class="hidden-lg hidden-md hidden-md hidden-sm navbar navbar-default navbar-fixed-top " role="navigation">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand">
           ADMIN
          </a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav">
            <li><a href="../admin/?menu=bangdk" id="bangdk">
            <span class="glyphicon glyphicon-dashboard"></span>
            Bảng Điều Khiển
            </a></li>
            <li><a href="../admin/?menu=them" id="themsv">
            <span class="glyphicon glyphicon-plus"></span>
            Thêm Sinh Viên
            </a></li>
            <li><a href="../admin/?menu=quanlykhoa" id="quanlykhoa">
            <span class="glyphicon glyphicon-cog"></span>
            Quản Lý Khoa
            </a></li>
            <li><a href="../admin/?menu=quanlysv" id="quanlysv">
            <span class="glyphicon glyphicon-wrench"></span>
            Quản Lý Sinh viên
            </a></li>
          </ul>
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="../images/<?php echo $_SESSION["avatar"]; ?>" alt="Ảnh đại diện" style="width:40px; height:40px; border-radius:3px; padding:3px; border: 1px solid #CCC">
              <?php echo $_SESSION["tensv"]; ?> <span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
                <li><a href="../">
                <span class="glyphicon glyphicon-user"></span>
                Trang Cá Nhân</a></li>
                <li><a href="../tai-khoan/dang-xuat.php">
                <span class="glyphicon glyphicon-log-out"></span>
                Đăng Xuất</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
    <!-- End Navbar -->

    <div class="row" id="thongtinad" style="margin:0">
    <div class="hidden-xs col-sm-3 col-md-3 col-lg-3">
    	<div class="thongtinad">
    		<img src="../images/logo.jpg" alt="Ảnh bìa">
    		<img src="../images/<?php echo $_SESSION["avatar"]; ?>" class="avatar" alt="Ảnh đại diện">
    		<a href="../index.php"><p><?php echo $_SESSION["tensv"]; ?></p></a>
    	</div>

    	<div class="menu">
    		<div class="list-group">
			  <a href="../admin/?menu=bangdk" id="bangdk" class="list-group-item" style="text-align:center">
			  <span style="font-size:50px;" class="glyphicon glyphicon-dashboard"></span> <br>
			  Bảng Điều Khiển
			  </a>
			  <a href="../admin/?menu=them" id="themsv" class="list-group-item" style="text-align:center">
			  <span style="font-size:50px;" class="glyphicon glyphicon-plus"></span> <br>
			  Thêm Sinh Viên
			  </a>
			  <a href="../admin/?menu=quanlykhoa" id="quanlykhoa" class="list-group-item" style="text-align:center">
			  <span style="font-size:50px;" class="glyphicon glyphicon-cog"></span> <br>
			  Quản Lý Khoa
			  </a>
        <a href="../admin/?menu=quanlysv" id="quanlysv" class="list-group-item" style="text-align:center">
        <span style="font-size:50px;" class="glyphicon glyphicon-wrench"></span> <br>
        Quản Lý Sinh Viên
			  <a href="../tai-khoan/dang-xuat.php" class="list-group-item" style="text-align:center">
			  <span style="font-size:50px;" class="glyphicon glyphicon-log-out"></span> <br>
			  Đăng Xuất
			  </a>
			</div>
    	</div>
    </div>
    <div style="color:#FFF" class="col-xs-12 col-sm-9 col-md-9 col-lg-9 adminhihi">
		<div class="list-group-item">
		<?php
			$sql = "SELECT * FROM `tai_khoan` WHERE `nhom_tai_khoan` = 1";
			$qr = mysqli_query($conn, $sql);
		 ?>
			<div class="caption">
			Tài khoản Quản Trị
			</div>
			<hr>
			<div class="row">
				<table class="table table-bordered table-responsive">
					<tr class="chimuc">
						<th>ID</th>
						<th>Tên Tài Khoản</th>
						<th>Tên Hiển Thị</th>
						<th>Quản Trị Khoa</th>
						<th>Số Điện Thoại</th>
						<th>Ngày Sinh</th>
						<th>Quản Lý</th>
					</tr>
					<tbody>
					<?php while($row = mysqli_fetch_assoc($qr)){ ?>
						<tr>
							<td><?php echo $row["id_tai_khoan"]?></td>
							<td>
							<?php echo $row["ten_tai_khoan"]; ?>
							</td>
							<td><?php echo $row["ten_sinh_vien"]?></td>
							<td><?php echo $row["khoa_sinh_vien"]?></td>
							<td><?php echo $row["sdt"]?></td>
							<td><?php echo $row["ngay_sinh"]?></td>
							<td align="center">
								<button type="button" id="sua" class="btn btn-warning btn-xs" title="Sửa" tad="<?php echo $row["ten_tai_khoan"]?>" tadht="<?php echo $row["ten_sinh_vien"]?>" sdt="<?php echo $row["sdt"]?>" ns="<?php echo $row["ngay_sinh"]?>" ids="<?php echo $row["id_tai_khoan"]?>"><span class="glyphicon glyphicon-edit"></span>
								</button>
  								<button type="button" id="xoa" xoa="<?php echo $row["id_tai_khoan"]?>" class="btn btn-danger btn-xs" title="Xóa"><span class="glyphicon glyphicon-trash"></span>
  								</button>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
<br>
<center>
	<button type="button" class="btn btn-success"  data-toggle="modal" data-target="#themadmin">THÊM ADMIN</button>
</center>
			</div>

		</div>
    </div>
    <!-- Thông tin Admin -->
    <?php } ?>

</div>
 <?php 
	include_once('../footer.php');
 ?>


<!-- Modal Thêm Admin -->
<div class="modal fade" id="themadmin" style="color: #FFF">
	<div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title">THÊM ADMIN MỚI</h4>
        </div><div class="container"></div>
        <div class="modal-body">
          <div id="thongbaothemadmin"></div>
				Tên Tài Khoản:
				<div class="form-group">
			    <div class="input-group">
			    <div class="input-group-addon">
			    <span class="glyphicon glyphicon-barcode"></span>
			    </div>
			    <input class="form-control" id="tenadmin" type="text" autofocus="autofocus" placeholder="Tên Tài Khoản...">
			    </div>
			    </div>

			    Tên Hiển Thị:
				<div class="form-group">
			    <div class="input-group">
			    <div class="input-group-addon">
			    <span class="glyphicon glyphicon-user"></span>
			    </div>
			    <input class="form-control" id="tenadminht" type="text" placeholder="Tên Hiển Thị...">
			    </div>
			    </div>
			    
			    Quản Trị Khoa:
				<div class="form-group">
			    <div class="input-group">
			    <div class="input-group-addon">
			    <span class="glyphicon glyphicon-th-large"></span>
			    </div>
			    	<select id="quantrikhoa" class="form-control">
		    		<option value="">Chọn Khoa</option>
		    		<?php
		    		$sqlkhoa = "SELECT * FROM `khoa`";
		    		$chaykhoa = mysqli_query($conn,$sqlkhoa);
		    		while($xemkhoa = mysqli_fetch_assoc($chaykhoa)){
		    		 ?>
		    		<option value="<?php echo $xemkhoa["ten_khoa"];?>">
		    			<?php echo $xemkhoa["ten_khoa"]; ?>
		    		</option>
		    		<?php } ?>
		    	</select>
			    </div>
			    </div>

			    Số Điện Thoại:
				<div class="form-group">
			    <div class="input-group">
			    <div class="input-group-addon">
			    <span class="glyphicon glyphicon-phone"></span>
			    </div>
			    <input class="form-control" id="sdt" type="text" placeholder="Số Điện Thoại...">
			    </div>
			    </div>

			    Ngày Sinh:
				<div class="form-group">
			    <div class="input-group">
			    <div class="input-group-addon">
			    <span class="glyphicon glyphicon-calendar"></span>
			    </div>
			    <input class="form-control" id="ngaysinh" type="text" placeholder="Ngày Sinh...">
			    </div>
			    </div>

			    <center>
					<button type="button" id="themadminmoi" class="btn btn-success">THÊM ADMIN</button>
				</center>
		   </div>
        </div>
      </div>
    </div>
</div>
<!-- End Modal -->

<!-- Modal Sửa Admin-->
<div class="modal fade" id="ModalSuaAdmin" style="color: #FFF">
	<div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title">SỬA ADMIN</h4>
        </div><div class="container"></div>
        <div class="modal-body">
          	<div id="thongbaosuaadmin"></div>
				Tên Tài Khoản:
				<div class="form-group">
			    <div class="input-group">
			    <div class="input-group-addon">
			    <span class="glyphicon glyphicon-barcode"></span>
			    </div>
			    <input type="text" id="idsua" class="hidden">
			    <input class="form-control" id="tenadmins" type="text" autofocus="autofocus" placeholder="Tên Tài Khoản...">
			    </div>
			    </div>

			    Tên Hiển Thị:
				<div class="form-group">
			    <div class="input-group">
			    <div class="input-group-addon">
			    <span class="glyphicon glyphicon-user"></span>
			    </div>
			    <input class="form-control" id="tenadminhts" type="text" placeholder="Tên Hiển Thị...">
			    </div>
			    </div>

			    Quản Trị Khoa:
				<div class="form-group">
			    <div class="input-group">
			    <div class="input-group-addon">
			    <span class="glyphicon glyphicon-th-large"></span>
			    </div>
			    	<select id="quantrikhoas" class="form-control">
		    		<option value="">Chọn Khoa</option>
		    		<?php
		    		$sqlkhoa = "SELECT * FROM `khoa`";
		    		$chaykhoa = mysqli_query($conn,$sqlkhoa);
		    		while($xemkhoa = mysqli_fetch_assoc($chaykhoa)){
		    		 ?>
		    		<option value="<?php echo $xemkhoa["ten_khoa"];?>">
		    			<?php echo $xemkhoa["ten_khoa"]; ?>
		    		</option>
		    		<?php } ?>
		    	</select>
			    </div>
			    </div>

			    Số Điện Thoại:
				<div class="form-group">
			    <div class="input-group">
			    <div class="input-group-addon">
			    <span class="glyphicon glyphicon-phone"></span>
			    </div>
			    <input class="form-control" id="sdts" type="text" placeholder="Số Điện Thoại...">
			    </div>
			    </div>

			    Ngày Sinh:
				<div class="form-group">
			    <div class="input-group">
			    <div class="input-group-addon">
			    <span class="glyphicon glyphicon-calendar"></span>
			    </div>
			    <input class="form-control" id="ngaysinhs" type="text" placeholder="Ngày Sinh...">
			    </div>
			    </div>

			    <center>
					<button type="button" id="suaadmin" class="btn btn-success">CẬP NHẬT</button>
				</center>
		   </div>
        </div>
      </div>
    </div>
</div>
<!-- End Modal Edit Admin -->



<script>
	
	$(document).ready(function() {
		$('button#xoa').click(function(event) {
			var id = $(this).attr('xoa');
			var xoa = confirm("Bạn có thực sự muốn xóa Admin có id: "+id+" ?");
			if (xoa == true) {
				if(id == 0){
					alert("Administrator Này không Thể Bị Xóa!");
				}
				else 
				{
				    $.ajax({
				    	url: 'xu-ly/admin/xoa-admin.php',
				    	type: 'POST',
				    	dataType: 'HTML',
				    	data: {id: id},
				    });
				    alert("Xóa Thành Công!");
				    location.reload();
				}
			}
		});

		$('button#themadminmoi').click(function(event) {
			$.ajax({
				url: 'xu-ly/admin/them-admin.php',
				type: 'POST',
				dataType: 'HTML',
				data: {
					tenadmin: $('#tenadmin').val(),
					tenadminht: $('#tenadminht').val(),
					quantrikhoa: $('#quantrikhoa').val(),
					sdt: $('#sdt').val(),
					ngaysinh: $('#ngaysinh').val()
				},
			success: function(data){
				$('#thongbaothemadmin').html(data);
			}
			});
		});

		$('button#sua').click(function(event) {
			var id = $(this).attr('ids');
			var tad = $(this).attr('tad');
			var tadht = $(this).attr('tadht');
			var sdt = $(this).attr('sdt');
			var ns = $(this).attr('ns');
			$('#ModalSuaAdmin').modal();
			$('#idsua').val(id);
			$('#tenadmins').val(tad);
			$('#tenadminhts').val(tadht);
			$('#sdts').val(sdt);
			$('#ngaysinhs').val(ns);
		});

		$('#suaadmin').click(function(event) {
			$.ajax({
				url: 'xu-ly/admin/sua-admin.php',
				type: 'POST',
				dataType: 'HTML',
				data: {
					idsua: $('#idsua').val(),
					tenadmins: $('#tenadmins').val(),
					tenadminhts: $('#tenadminhts').val(),
					quantrikhoas: $('#quantrikhoas').val(),
					sdts: $('#sdts').val(),
					ngaysinhs: $('#ngaysinhs').val()
				},
			success: function(data){
				$('#thongbaosuaadmin').html(data);
			}
			});
			
		});

	});

</script>