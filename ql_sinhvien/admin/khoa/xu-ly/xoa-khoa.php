<?php 
	include_once('../../../config/config.php');

	$id = $_POST["id"];

	$sql = "DELETE FROM `khoa` WHERE `khoa`.`id_khoa` = $id";
	mysqli_query($conn, $sql);
?>