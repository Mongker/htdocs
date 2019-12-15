<?php 
	include_once('../../../config/config.php');

	$id = $_POST["id"];

	$sql = "DELETE FROM `mon_hoc` WHERE `mon_hoc`.`id_mon_hoc` = $id";
	mysqli_query($conn, $sql);
?>