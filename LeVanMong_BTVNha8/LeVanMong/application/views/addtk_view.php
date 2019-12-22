<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Thêm tài khoản</title>
	<script type="text/javascript" src="<?= base_url() ?>vendor/bootstrap.js"></script>
	<link rel="stylesheet" href="<?= base_url() ?>vendor/bootstrap.css">
</head>
<body>
    <?php 
    include "navbartk_view.php" 
     ?>
	
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
			
			</div>
		</div>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-sm-6 push-sm-3">
				<form method="POST" action="themtk">
  <div class="form-group">
    <label for="exampleInputEmail1">Tài khoản</label>
    <input name="Username" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập tên tài khoản">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Mật Khẩu</label>
    <input name="Password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Nhập mật khẩu">
  </div>
  
  <button type="submit" class="btn btn-primary">Go</button>
</form>
			</div>
		</div>
	</div>
	
</body>
</html>