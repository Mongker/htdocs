<?php 
require_once("incfiles/connect.php");
$id= $_GET['id']; 

$query= mysql_query("DELETE FROM theloai where ID=".$id."");
if ($query)
	echo'Đã xóa
		<script type="text/javascript">
		  window.location="/qltv";
		</script>';
else 
	echo'Lỗi';
?>