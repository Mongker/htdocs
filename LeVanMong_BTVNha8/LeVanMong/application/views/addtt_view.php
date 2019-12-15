<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Thêm thông tin</title>
	<script type="text/javascript" src="<?= base_url() ?>vendor/bootstrap.js"></script>
	<link rel="stylesheet" href="<?= base_url() ?>vendor/bootstrap.css">
</head>
<body>
    <?php 
    include "navbartt_view.php" 
     ?>
     <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <center><img class="aligncenter wp-image-52787 size-full" src="http://saobiz.net/wp-content/uploads/2016/09/anh-nong-ngoc-trinh.jpg" alt="Ảnh nóng Ngọc Trinh" width="660" height="396">
        </center>
      </div>
    </div><!--Hết row -->
  </div><!--Hết container-->
	
	<div class="container">
		<div class="row">
			<div class="col-sm-6 push-sm-3">
				<form method="POST" action="themtt">
           <div class="form-group">
              <label for="exampleInputEmail1">Tên</label>
              <input name="name" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập tên ">
           </div>
           <div class="form-group">
              <label for="exampleInputEmail1">Địa chỉ</label>
              <input name="address" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập đc">
          </div>
          <div class="form-group">
              <label for="exampleInputEmail1">Ngày sinh</label>
              <input name="birthday" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập ngày sinh">
          </div>
          <div class="form-group">
              <label for="exampleInputEmail1">Lớp</label>
              <input name="class" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập lớp">
          </div>
          <div class="form-group">
              <label for="exampleInputEmail1">Giới tính</label>
              <input name="sex" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập giới tính">
  </div>
  
  
  <button type="submit" class="btn btn-primary">GO</button>
</form>
			</div>
		</div>
	</div>
	
</body>
</html>