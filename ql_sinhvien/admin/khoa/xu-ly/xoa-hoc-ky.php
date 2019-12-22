<?php 
	include_once('../../../config/config.php');

	$id = $_POST["id"];

	$sql = "DELETE FROM `hoc_ky` WHERE `hoc_ky`.`id_hoc_ky` = $id";
	mysqli_query($conn, $sql);
?>