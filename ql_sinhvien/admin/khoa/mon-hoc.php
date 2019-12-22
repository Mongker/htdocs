<?php include_once('../../config/config.php');
 session_start();
		if($_SESSION["taikhoan"] == NULL){ ?>
			<script>
				window.location.href="../../tai-khoan/dang-nhap.php";
			</script>
		<?php } elseif($_SESSION["nhomtk"] != 1){ ?>
		      <script>
	    	window.location.href="../../index.php";
	    	</script>
		    </div>
		<?php }else {
	$sql = "SELECT * FROM `mon_hoc`";
	$qr = mysqli_query($conn, $sql);
		 ?>

			<div class="caption">
			Quản Lý Môn Học
			</div>
			<hr>
			<div class="row">
				<table class="table table-bordered table-responsive">
					<tr class="chimuc">
						<th>ID</th>
						<th>Tên Môn Học</th>
						<th>Số Tín Chỉ</th>
						<th>Thuộc Lớp</th>
						<th>Thuộc Học Kỳ</th>
						<th>Quản Lý</th>
					</tr>
					<tbody>
					<?php while($row = mysqli_fetch_assoc($qr)){ ?>
						<tr>
							<td><?php echo $row["id_mon_hoc"]?></td>
							<td><?php echo $row["ten_mon_hoc"]?></td>
							<td>
							<?php echo $row["so_tin_chi"]?>
							</td>
							<td>
							<?php echo $row["ten_lop"]?>
							</td>
							<td>
								<?php 
								$idhk = $row["id_hoc_ky"];
								$sqlhk = "SELECT ten_hoc_ky FROM hoc_ky WHERE id_hoc_ky = '$idhk'";
								$qrhk = mysqli_query($conn, $sqlhk);
								$rowhk = mysqli_fetch_assoc($qrhk);
								echo $rowhk["ten_hoc_ky"]?>
							</td>
							<td align="center">
								<button type="button" id="sua" class="btn btn-warning btn-xs" title="Sửa" mh="<?php echo $row["ten_mon_hoc"]?>" idmh="<?php echo $row["id_mon_hoc"]?>"><span class="glyphicon glyphicon-edit"></span>
								</button>
  								<button type="button" class="btn btn-danger btn-xs" title="Xóa" id="xoa" xoa="<?php echo $row["id_mon_hoc"]?>"><span class="glyphicon glyphicon-trash"></span>
  								</button>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>


<?php } ?><br>
<center>
	<button type="button" class="btn btn-success" data-toggle="modal" data-target="#themmonhoc">THÊM MÔN HỌC</button>
</center>

<!-- Modal Thêm môn học -->
<div class="modal fade" id="themmonhoc">
	<div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title">THÊM MÔN HỌC MỚI</h4>
        </div><div class="container"></div>
        <div class="modal-body">
          <div id="thongbaotmh"></div>
				Tên Môn Học:
				<div class="form-group">
			    <div class="input-group">
			    <div class="input-group-addon">
			    <span class="glyphicon glyphicon-list-alt"></span>
			    </div>
			    <input class="form-control" id="tenmhmoi" type="text" autofocus="autofocus" placeholder="Tên môn học...">
			    </div>
			    </div>

			    Số Tín Chỉ:
				<div class="form-group">
			    <div class="input-group">
			    <div class="input-group-addon">
			    <span class="glyphicon glyphicon-stats"></span>
			    </div>
			    <select id="sotinchi" class="form-control">
			    	<option value="1">1</option>
			    	<option value="2">2</option>
			    	<option value="3">3</option>
			    </select>
			    </div>
			    </div>

			     Thuộc Lớp:
				<div class="form-group">
			    <div class="input-group">
			    <div class="input-group-addon">
			    <span class="glyphicon glyphicon-th-list"></span>
			    </div>
			    	<select id="thuoclop" class="form-control">
		    		<option value="">Chọn Lớp</option>
		    		<?php
		    		$sqllop = "SELECT * FROM `lop`";
		    		$chaylop = mysqli_query($conn,$sqllop);
		    		while($xemlop = mysqli_fetch_assoc($chaylop)){
		    		 ?>
		    		<option value="<?php echo $xemlop["ten_lop"];?>">
		    			<?php echo $xemlop["ten_lop"]; ?>
		    		</option>
		    		<?php } ?>
		    	</select>
			    </div>
			    </div>

			    Thuộc Học Kỳ:
				<div class="form-group">
			    <div class="input-group">
			    <div class="input-group-addon">
			    <span class="glyphicon glyphicon-th-large"></span>
			    </div>
			    	<select id="thuochk" class="form-control">
		    		<option value="">Chọn Học Kỳ</option>
		    		<?php
		    		$sqlhk = "SELECT * FROM `hoc_ky`";
		    		$chayhk = mysqli_query($conn,$sqlhk);
		    		while($xemhk = mysqli_fetch_assoc($chayhk)){
		    		 ?>
		    		<option value="<?php echo $xemhk["id_hoc_ky"];?>">
		    			<?php echo $xemhk["ten_hoc_ky"]; ?>
		    		</option>
		    		<?php } ?>
		    	</select>
			    </div>
			    </div>

			    <br>
			    <center>
					<button type="button" id="themmhmoi" class="btn btn-success">THÊM MÔN HỌC</button>
				</center>
		   </div>
        </div>
      </div>
    </div>
</div>
<!-- End Modal -->

<!-- Modal Sửa Môn học-->
<div class="modal fade" id="ModalSuaMH">
	<div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title">SỬA MÔN HỌC</h4>
        </div><div class="container"></div>
        <div class="modal-body">
          	<div id="thongbaosmh"></div>
				Tên Môn Học:
				<div class="form-group">
			    <div class="input-group">
			    <div class="input-group-addon">
			    <span class="glyphicon glyphicon-list-alt"></span>
			    </div>
			    <input type="text" id="idmh" style="display: none;">
			    <input class="form-control" id="tenmhsua" type="text" autofocus="autofocus" placeholder="Tên môn học...">
			    </div>
			    </div>

			    Số Tín Chỉ:
				<div class="form-group">
			    <div class="input-group">
			    <div class="input-group-addon">
			    <span class="glyphicon glyphicon-stats"></span>
			    </div>
			    <select id="sotinchisua" class="form-control">
			    	<option value="1">1</option>
			    	<option value="2">2</option>
			    	<option value="3">3</option>
			    </select>
			    </div>
			    </div>

			     Thuộc Lớp:
				<div class="form-group">
			    <div class="input-group">
			    <div class="input-group-addon">
			    <span class="glyphicon glyphicon-th-list"></span>
			    </div>
			    	<select id="thuoclopsua" class="form-control">
		    		<option value="">Chọn Lớp</option>
		    		<?php
		    		$sqllop = "SELECT * FROM `lop`";
		    		$chaylop = mysqli_query($conn,$sqllop);
		    		while($xemlop = mysqli_fetch_assoc($chaylop)){
		    		 ?>
		    		<option value="<?php echo $xemlop["ten_lop"];?>">
		    			<?php echo $xemlop["ten_lop"]; ?>
		    		</option>
		    		<?php } ?>
		    	</select>
			    </div>
			    </div>

			    Thuộc Học Kỳ:
				<div class="form-group">
			    <div class="input-group">
			    <div class="input-group-addon">
			    <span class="glyphicon glyphicon-th-large"></span>
			    </div>
			    	<select id="thuochksua" class="form-control">
		    		<option value="">Chọn Học Kỳ</option>
		    		<?php
		    		$sqlhk = "SELECT * FROM `hoc_ky`";
		    		$chayhk = mysqli_query($conn,$sqlhk);
		    		while($xemhk = mysqli_fetch_assoc($chayhk)){
		    		 ?>
		    		<option value="<?php echo $xemhk["id_hoc_ky"];?>">
		    			<?php echo $xemhk["ten_hoc_ky"]; ?>
		    		</option>
		    		<?php } ?>
		    	</select>
			    </div>
			    </div>

			    <center>
					<button type="button" id="suamonhoc" class="btn btn-success">CẬP NHẬT</button>
				</center>
		   </div>
        </div>
      </div>
    </div>
</div>
<!-- End Modal Edit lop -->

<script>
	$(document).ready(function() {
		$('#themmhmoi').click(function(){
			$.ajax({
			url: 'xu-ly/them-mon-hoc.php',
			type: 'POST',
			dataType: 'html',
			data: {
				tenmonhoc: $('#tenmhmoi').val(),
				sotinchi: $('#sotinchi').val(),
				thuoclop: $('#thuoclop').val(),
				thuochocky: $('#thuochk').val()
				},
			success: function(data){
				$('#thongbaotmh').html(data);
			}
			});
		});

		$('button#xoa').click(function(event) {
			var id = $(this).attr('xoa');
			var xoa = confirm("Bạn có thực sự muốn xóa Môn Học có id: "+id+" ?");
			if (xoa == true) {
		    $.ajax({
		    	url: 'xu-ly/xoa-mon-hoc.php',
		    	type: 'POST',
		    	dataType: 'HTML',
		    	data: {id: id},
		    });
		    alert("Xóa Thành Công!");
		    location.reload();
			}
		});

		$('button#sua').click(function(event) {
			var mh = $(this).attr('mh');
			var idmh = $(this).attr('idmh');
			$('#ModalSuaMH').modal();
			$('#tenmhsua').val(mh);
			$('#idmh').val(idmh);
		});

		$('#suamonhoc').click(function(event) {
			$.ajax({
				url: 'xu-ly/sua-mon-hoc.php',
				type: 'POST',
				dataType: 'HTML',
				data: {
					idmh: $('#idmh').val(),
					tenmhsua: $('#tenmhsua').val(),
					sotinchisua: $('#sotinchisua').val(),
					thuoclopsua: $('#thuoclopsua').val(),
					thuochksua: $('#thuochksua').val()
				},
			success: function(data){
				$('#thongbaosmh').html(data);
			}
			});
			
		});

	});
</script>