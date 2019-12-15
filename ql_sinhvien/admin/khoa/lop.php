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
	$sql = "SELECT * FROM `lop`";
	$qr = mysqli_query($conn, $sql);
		 ?>

			<div class="caption">
			Quản Lý Lớp
			</div>
			<hr>
			<div class="row">
				<table class="table table-bordered table-responsive">
					<tr class="chimuc">
						<th>ID</th>
						<th>Tên Lớp</th>
						<th>Thuộc Khoa</th>
						<th>Quản Lý</th>
					</tr>
					<tbody>
					<?php while($row = mysqli_fetch_assoc($qr)){ ?>
						<tr>
							<td><?php echo $row["id_lop"]?></td>
							<td><?php echo $row["ten_lop"]?></td>
							<td>
							<?php
								$idk = $row["id_khoa"];
								$sqlk = "SELECT `ten_khoa` FROM `khoa` WHERE `id_khoa` = '$idk'";
								$qrk = mysqli_query($conn, $sqlk);
								$rowk = mysqli_fetch_assoc($qrk);
								echo $rowk["ten_khoa"];
							 ?>
								
							</td>
							<td align="center">
								<button type="button" id="sua" class="btn btn-warning btn-xs" title="Sửa" lop="<?php echo $row["ten_lop"]?>" idlop="<?php echo $row["id_lop"]?>"><span class="glyphicon glyphicon-edit"></span>
								</button>
  								<button type="button" class="btn btn-danger btn-xs" title="Xóa" id="xoa" xoa="<?php echo $row["id_lop"]?>"><span class="glyphicon glyphicon-trash"></span>
  								</button>
							</td>
						</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>


<?php } ?><br>
<center>
	<button type="button" class="btn btn-success" data-toggle="modal" data-target="#themlop">THÊM LỚP</button>
</center>


<!-- Modal Thêm Lop -->
<div class="modal fade" id="themlop">
	<div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title">THÊM LỚP MỚI</h4>
        </div><div class="container"></div>
        <div class="modal-body">
          <div id="thongbaothemlop"></div>
				Tên Lớp:
				<div class="form-group">
			    <div class="input-group">
			    <div class="input-group-addon">
			    <span class="glyphicon glyphicon-th-list"></span>
			    </div>
			    <input class="form-control" id="tenlopmoi" type="text" autofocus="autofocus" placeholder="Tên khoa...">
			    </div>
			    </div>
			    Thuộc Khoa:
				<div class="form-group">
			    <div class="input-group">
			    <div class="input-group-addon">
			    <span class="glyphicon glyphicon-th-large"></span>
			    </div>
			    	<select id="thuockhoa" class="form-control">
		    		<option value="">Chọn Khoa</option>
		    		<?php
		    		$sqlkhoa = "SELECT * FROM `khoa`";
		    		$chaykhoa = mysqli_query($conn,$sqlkhoa);
		    		while($xemkhoa = mysqli_fetch_assoc($chaykhoa)){
		    		 ?>
		    		<option value="<?php echo $xemkhoa["id_khoa"];?>">
		    			<?php echo $xemkhoa["ten_khoa"]; ?>
		    		</option>
		    		<?php } ?>
		    	</select>
			    </div>
			    </div>

			    <br>
			    <center>
					<button type="button" id="themlopmoi" class="btn btn-success">THÊM LỚP</button>
				</center>
		   </div>
        </div>
      </div>
    </div>
</div>
<!-- End Modal -->

<!-- Modal Sửa lop-->
<div class="modal fade" id="ModalSuaLop">
	<div class="modal-dialog modal-sm">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
          <h4 class="modal-title">SỬA LỚP</h4>
        </div><div class="container"></div>
        <div class="modal-body">
          	<div id="thongbaosualop"></div>
				Tên Lớp:
				<div class="form-group">
			    <div class="input-group">
			    <div class="input-group-addon">
			    <span class="glyphicon glyphicon-th-list"></span>
			    </div>
			    <input type="text" id="idlop" style="display: none">
			    <input class="form-control" id="suatenlop" type="text" placeholder="Tên khoa...">
			    </div>

			    </div>
			    Thuộc Khoa:
				<div class="form-group">
			    <div class="input-group">
			    <div class="input-group-addon">
			    <span class="glyphicon glyphicon-th-large"></span>
			    </div>
			    	<select id="thuockhoasua" class="form-control">
		    		<option value="">Chọn Khoa</option>
		    		<?php
		    		$sqlkhoa = "SELECT * FROM `khoa`";
		    		$chaykhoa = mysqli_query($conn,$sqlkhoa);
		    		while($xemkhoa = mysqli_fetch_assoc($chaykhoa)){
		    		 ?>
		    		<option value="<?php echo $xemkhoa["id_khoa"];?>">
		    			<?php echo $xemkhoa["ten_khoa"]; ?>
		    		</option>
		    		<?php } ?>
		    	</select>
			    </div>
			    </div>

			    </div>
			    <center>
					<button type="button" id="sualopmoi" class="btn btn-success">CẬP NHẬT</button>
				</center>
		   </div>
        </div>
      </div>
    </div>
</div>
<!-- End Modal Edit lop -->

<script>
	$(document).ready(function() {
		$('#themlopmoi').click(function(){
			$.ajax({
			url: 'xu-ly/them-lop.php',
			type: 'POST',
			dataType: 'html',
			data: {
				lopmoi: $('#tenlopmoi').val(),
				thuockhoa: $('#thuockhoa').val()
				},
			success: function(data){
				$('#thongbaothemlop').html(data);
			}
			});
		});

		$('button#xoa').click(function(event) {
			var id = $(this).attr('xoa');
			var xoa = confirm("Bạn có thực sự muốn xóa Lớp có id: "+id+" ?");
			if (xoa == true) {
		    $.ajax({
		    	url: 'xu-ly/xoa-lop.php',
		    	type: 'POST',
		    	dataType: 'HTML',
		    	data: {id: id},
		    });
		    alert("Xóa Thành Công!");
		    location.reload();
			}
		});

		$('button#sua').click(function(event) {
			var lop = $(this).attr('lop');
			var idlop = $(this).attr('idlop');
			$('#ModalSuaLop').modal();
			$('#suatenlop').val(lop);
			$('#idlop').val(idlop);
		});

		$('#sualopmoi').click(function(event) {
			$.ajax({
				url: 'xu-ly/sua-lop.php',
				type: 'POST',
				dataType: 'HTML',
				data: {
					idlop: $('#idlop').val(),
					sualop: $('#suatenlop').val(),
					thuockhoa: $('#thuockhoasua').val()
				},
			success: function(data){
				$('#thongbaosualop').html(data);
			}
			});
			
		});

	});
</script>