<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form >
	<?php 
$username = $_POST['username']; 
$password =$_POST['password'];
if ($username=='admin'&&$password=='12345') {
	include_once('QLBH_view.php');
}
else echo " <p align='center'> bạn đã nhập sai tài khoản hoặc mật khẩu </p>";

	?>
</form>
</body>
</html>