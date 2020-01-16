<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Xóa</title>
</head>
<body>
	<?php 
	$del=(isset($_POST['del']))? $_POST['del']:0;
	 

        $strIn="";
        $count=1;
        foreach ($del as $key =>$value) {
        	if ($count<sizeof($del)) {
        		$strIn=$strIn.$value.',';
        	}else {
        		$strIn=$strIn.$value;
        	}
        	$count ++;
        	
        }
        $servername= "localhost";
        $username = "root";
        $password = "";
        $dbname = "qlsvl02";
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }// echo "Connected successfully";
		$sql_del = "DELETE FROM sinhvien WHERE id IN(".$strIn.")";
				$result=$conn->query($sql_del);
				header('Location: dssv.php');
			    
		
	 ?>
</body>
</html>