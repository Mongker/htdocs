<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Xóa</title>
</head>
<body>
	<?php 
	$id=(isset($_GET['id']))? $_GET['id']:0;
	 $servername= "localhost";
        $username = "root";
        $password = "";
        $dbname = "qlsv";
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }// echo "Connected successfully";
           
		$sql_delete = "DELETE FROM lop WHERE id= ".$id;
		// echo $sql_delete;
			if ($conn->query($sql_delete) === TRUE) {
				echo '<script type="text/javascript">alert("Bạn có chắc chắn muốn xóa ?")</script>';
				$result=$conn->query($sql_delete );
				header('Location: dslop.php');
			    
				echo '<script type="text/javascript">alert("Xóa thành công !")</script>';

			    
		} else {
		    echo "Error deleting record: " . $conn->error;
		}
	 ?>
</body>
</html>