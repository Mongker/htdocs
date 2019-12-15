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
		<?php }else {
		 ?>

			<div class="caption">
			Quản Lý Sinh Viên
			</div>
			<hr>
			<div class="input-group form-group">
      <span class="input-group-addon" style="width: 40%; padding: 0px; border: 0px;">
      <select class="form-control">
      	<option value="">Chọn lớp</option>
      	
      </select>
      </span>
      <input type="text" class="form-control" placeholder="Username">
    </div>
			<div class="row">
				<table class="table table-bordered table-responsive">
					<tr class="chimuc">
						<th>ID</th>
						<th>Mã Sinh Viên</th>
						<th>Tên Sinh Viên</th>
						<th>Khoa</th>
						<th>
						<select class="form-control input-sm" id="dulieulop">
							<option value="">Chọn Lớp</option>
							<?php $sqllop = "SELECT `ten_lop` FROM `lop`";
								  $qrlop = mysqli_query($conn, $sqllop); ?>
							<?php while($rowlop = mysqli_fetch_assoc($qrlop))
							{ ?>
								<option value="<?php echo $rowlop["ten_lop"]; ?>">
									<?php echo $rowlop["ten_lop"];?>
								</option>
							<?php } ?>
						</select>
						</th>
						<th>SĐT</th>
						<th>Ngày Sinh</th>
						<th>Quản Lý</th>
					</tr>
					<tbody id="hienthidulieulop">
					</tbody>
				</table>
			</div>

<!-- Start Modal -->
<div class="modal fade" id="ModalEdit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title" id="myModalLabel">SỬA THÔNG TIN SINH VIÊN</h4>
      </div>
      <div class="modal-body">
       <div id="noidungsua"></div>
      </div>
      <div class="modal-footer" style="text-align: center;">
      	<div id="thongbaothem"></div>
        <button type="button" id="suasinhvien" class="btn btn-primary">CẬP NHẬT</button>
      </div><br>
    </div>
  </div>
</div>
<!-- End Modal -->


<?php } ?>
<script>
 	$(document).ready(function() {
 		$('a#quanlysv').addClass('chon');
 		$('a#themsv').removeClass('chon');
 		$('a#bangdk').removeClass('chon');
 		$('a#quanlykhoa').removeClass('chon');

 		$('#dulieulop').change(function(event) {
 			var id = $(this).val();
			$.get('xu-ly/sinh-vien/du-lieu-lop.php',{id:id}, function(data) {
				$('#hienthidulieulop').html(data);
			});
 		});

		$.get('xu-ly/sinh-vien/du-lieu-lop.php',{id: ""}, function(data) {
			$('#hienthidulieulop').html(data);
		});
 	});
 		
 </script>