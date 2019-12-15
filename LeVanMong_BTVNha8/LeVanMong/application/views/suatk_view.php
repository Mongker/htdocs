<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Sửa tài khoản</title>
	<script type="text/javascript" src="<?= base_url() ?>vendor/bootstrap.js"></script>
	<link rel="stylesheet" href="<?= base_url() ?>vendor/bootstrap.css">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-12">
			</div>
		</div>
	</div>

	<div class="container">
		<div class="row">
			<div class="col-sm-12">
		       <div class="alert alert-warning" role="alert" align="center">
		     	<strong><h1>Tài Khoản Cần Fix</h1></strong>
			   </div>
		    </div>
	    </div>
    </div>

	<div class="container">
		<div class="row">
			<div class="col-sm-6 push-sm-3">
				<form method="POST" action="<?= base_url() ?>qltk/suatk">
					<?php foreach ($suatk as $value): ?>
				<input type="hidden" name="id" value ="<?= $value['id'] ?>">

  <div class="form-group">
    <label for="exampleInputEmail1">Tên TK</label>
    <input value="<?= $value['Username'] ?>" name="Username" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Nhập tên TK">
    
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Mật khẩu</label>
    <input value="<?= $value['Password'] ?>" name="Password" type="password" class="form-control" id="exampleInputPassword1" placeholder="Nhập MK">
  </div>
  
 <center> <button type="submit" class="btn btn-primary">Sửa</button></center>
</form>
			</div>
		</div>
	</div>
	 <?php endforeach?>
</body>
</html>