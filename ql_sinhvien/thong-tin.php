<?php
	$title = "Thông Tin Sinh Viên - ";
	include_once('header.php');
  include_once('config/config.php');
  if($_SESSION["taikhoan"] == NULL){?>
    <script>
      window.location.href="tai-khoan/dang-nhap.php";
    </script>
  <?php } else{
 ?>
<div class="container-fluid">
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
          <a class="navbar-brand" href="#">sinh viên</a>
        </div>
        <div class="navbar-collapse collapse">
          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <img src="images/<?php echo $_SESSION["avatar"]; ?>" alt="Ảnh đại diện" style="width:40px; height:40px; border-radius:3px; padding:3px; border: 1px solid #CCC">
              <?php echo $_SESSION["tensv"]; ?> <span class="caret"></span>
              </a>
              <ul class="dropdown-menu">
              <?php if($_SESSION["nhomtk"] == 1){ ?>
                <li><a href="admin">
                <span class="glyphicon glyphicon-tower"></span>
                Trang Quản Trị</a></li>
                <?php } else {} ?>
                <li><a href="thong-tin.php">
                <span class="glyphicon glyphicon-user"></span>
                Trang Cá Nhân</a></li>
                <li><a href="tai-khoan/dang-xuat.php">
                <span class="glyphicon glyphicon-log-out"></span>
                Đăng Xuất</a></li>
              </ul>
            </li>
          </ul>
        </div><!--/.nav-collapse -->
      </div>
    </div>
    <!-- End Navbar -->
	<div class="row">
    <div class="hidden-xs col-sm-3 col-md-3 col-lg-3">
    	<div class="thongtinad">
    		<img src="images/logo.jpg" alt="Ảnh bìa">
    		<img src="images/<?php echo $_SESSION["avatar"]; ?>" class="avatar" alt="Ảnh đại diện">
    		<p><?php echo $_SESSION["tensv"]; ?></p>
    	</div>

    	<div class="menu">
    		<div class="list-group">
        <a href="#thongtin" class="list-group-item">
          <table>
            <tr>
              <td style="width:30px;" title="Mã Sinh Viên"><span class="glyphicon glyphicon-barcode"></span></td>
              <td><strong><?php echo $_SESSION["taikhoan"]; ?></strong></td>
            </tr>
            <tr>
              <td style="width:30px;"  title="Tên Sinh Viên"><span class="glyphicon glyphicon-user"></span></td>
              <td><strong><?php echo $_SESSION["tensv"]; ?></strong></td>
            </tr>
            <tr>
              <td style="width:30px;" title="Sinh Viên khoa"><span class="glyphicon glyphicon-th-large"></span></td>
              <td><strong><?php echo $_SESSION["khoasv"]; ?></strong></td>
            </tr>
            <tr>
              <td style="width:30px;" title="Sinh Viên Lớp"><span class="glyphicon glyphicon-th-list"></span></td>
              <td><strong><?php echo $_SESSION["lopsv"]; ?></strong></td>
            </tr>
            <tr>
              <td style="width:30px;" title="Số Điện Thoại"><span class="glyphicon glyphicon-phone"></span></td>
              <td> <strong> <?php echo $_SESSION["sdt"]; ?></strong></td>
            </tr>
            <tr>
              <td style="width:30px;" title="Ngày Sinh"><span class="glyphicon glyphicon-calendar"></span></td>
              <td> <strong> <?php echo $_SESSION["ns"]; ?></strong></td>
            </tr>
          </table>
          
        </a>

        <?php if($_SESSION["nhomtk"] == 1){ ?>
			  <a href="admin" class="list-group-item" style="text-align:center">
			  <span style="font-size:50px;" class="glyphicon glyphicon-cog"></span> <br>
			  Trang Quản Trị
			  </a>
        <?php } else {} ?>
			  <a href="tai-khoan/dang-xuat.php" class="list-group-item" style="text-align:center">
			  <span style="font-size:50px;" class="glyphicon glyphicon-log-out"></span> <br>
			  Đăng Xuất
			  </a>
			</div>
    	</div>
    </div>
    <div style="color:#FFF" class="col-xs-12 col-sm-12 col-md-9 col-lg-9">
    <!-- Start Học kỳ -->
      <?php
        $sqlhk = "SELECT * FROM `hoc_ky`";
        $qrhk = mysqli_query($conn, $sqlhk);
       ?>
        <div class="list-group-item">
          <div class="form-group hocky">
            <div class="input-group">
                <div class="input-group-addon">
                  <span class="glyphicon glyphicon-time"></span>
              </div>
                <select id="hockydiem" name="hockydiem" class="form-control">
                <option value="">Chọn Học Kỳ</option>
                <?php while($rowhk = mysqli_fetch_assoc($qrhk)){ ?>
                  <option value="<?php echo $rowhk["id_hoc_ky"];?>">
                  <?php echo $rowhk["ten_hoc_ky"];?>
                  </option>
                <?php } ?>
                </select>
          </div>
        </div>
        <hr><br>
        <!-- End Chọn Học Kỳ -->
			<!-- Bảng Điềm -->
          <input type="text" id="masv" value="<?php echo $_SESSION["taikhoan"]?>" style="display: none">
          <div class="alert alert-info fade in" role="alert" id="note">
          <button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
          <strong>NOTE!</strong> Vui lòng chọn Học kỳ để xem bảng điểm.
        </div>
            <div id="dulieudiem"></div>
          <!-- End Bảng điểm -->
    </div>
    <!-- Thông tin Admin -->

    </div>
</div>
 <?php }
	include_once('footer.php');
 ?>

  <script>
   $(document).ready(function() {
     $('#hockydiem').change(function(event) {
      $('#note').hide();
      var idhk = $(this).val();
       $.ajax({
         url: 'du-lieu-diem.php',
         type: 'POST',
         dataType: 'HTML',
         data: {
          idhk: idhk,
          masv: $('#masv').val()

        },
       success: function(data){
        $('#dulieudiem').html(data);
       }
       });
       
     });
   });
 </script>