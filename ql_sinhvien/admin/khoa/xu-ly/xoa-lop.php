<?php 
	include_once('../../../config/config.php');

	$id = $_POST["id"];

	$sql = "DELETE FROM `lop` WHERE `lop`.`id_lop` = $id";
	mysqli_query($conn, $sql);
?>