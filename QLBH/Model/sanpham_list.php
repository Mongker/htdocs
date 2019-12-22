<div align="center">
        <a href="">
            <img src="../img/logo.png">
        </a>
    </div>
<?php
	include_once('../Publish/connect.php');
	$sql="SELECT * FROM sanpham";
	$kq=mysqli_query($conn,$sql);
	
?>
