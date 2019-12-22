<?php 
require_once("incfiles/connect.php");
$id= $_GET['idbook']; 
$idtype= $_GET['idtype']; 

$query= mysql_query("DELETE FROM dsbook where IDbook=".$id."");
if ($query)
	echo'Đã xóa
		<script type="text/javascript">
		  window.location="viewlistbook.php?id='.$idtype.'"
		</script>';
else 
	echo'Lỗi';
?>