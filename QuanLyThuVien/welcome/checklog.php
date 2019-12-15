<?php 
	session_start();
	require_once("../incfiles/connect.php");
	$username = trim($_POST['username']);
    $password = trim($_POST['password']);
   
    
    
    if (!empty($username) && !empty($password))
    {
           
        $query = mysql_query("select * from account where username = '".$username."' and password = '".$password."'");
        $num_rows = mysql_num_rows($query);
        if ($num_rows==0)
            echo "<b>Tên đăng nhập hoặc mật khẩu không đúng !</b>";
        else {
            $query = mysql_query("select * from account where username = '".$username."' and password = '".$password."'");
            $_SESSION["username"] = $username;
          

            echo'<b>Đăng nhập thành công. ';
            echo'<script type="text/javascript">
            alert("Đăng nhập thành công");
          window.location="/qltv";
        </script>';
        }

    }
    else
        echo'<b>Vui lòng nhập đầy đủ thông tin</b>';
?>