<!DOCTYPE html>
<html>
<head>
	<title>Đây là trang chủ</title>
	<meta charset="utf-8">
</head>
<body>
     <h1> Chào mừng bạn đến với trang web của mk !</h1>
     <?php 
           $username = $_REQUEST['username'];
           $password= $_REQUEST['password'];
           echo 'Tên đăng nhập :'.$username;
           echo 'Pass ban su dung: '.$password;
      ?>
</body>
</html>  