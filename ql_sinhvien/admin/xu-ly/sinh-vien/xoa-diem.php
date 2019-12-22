<?php 
	include_once('../../../config/config.php');

	$id = $_POST["id"];

	$sql = "DELETE FROM `diem` WHERE `diem`.`id_diem` = $id";
	mysqli_query($conn, $sql);
?>