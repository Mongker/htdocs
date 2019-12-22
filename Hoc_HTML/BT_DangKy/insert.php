<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
      <?php 
        $id=(isset($_POST['id']))?$_POST['id']:0;
        $username=(isset($_POST['username']))?$_POST['username']:"";
        $password=(isset($_POST['password']))?$_POST['password']:"";
        $sex=(isset($_POST['sex']))?$_POST['sex']:"";
        $birthday=(isset($_POST['birthday']))?$_POST['birthday']:"";
        $address=(isset($_POST['address']))?$_POST['address']:"";
        $sothich=(isset($_POST['sothich']))?$_POST['sothich']:"";
        $hobby="";
        foreach ($sothich as $value) {
        	// echo 'value'.$value;
        	$hobby=$hobby.'-'.$value;
        	
        }
        // echo 'Sở thích :'.$hobby;
        $fileToUpload=$_POST['fileToUpload'];
        // echo 'username  : '.$username.'<br>';
        // echo 'password  : '.$password.'<br>';
        // echo 'sex   : '.$sex.'<br>';
        // echo 'birthday  : '.$birthday.'<br>';
        // echo 'address  : '.$address.'<br>';
        // echo 'Sở thích  : '.$sothich.'<br>';
        // echo 'avarta  : '.$fileToUpload.'<br>';


        $target_dir = "uploads/";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$uploadOk = 1;
		$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
		// Check if image file is a actual image or fake image
		if(isset($_POST["submit"])) {
		    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
		    if($check !== false) {
		        // echo "File is an image - " . $check["mime"] . ".";
		        $uploadOk = 1;
		    } else {
		        // echo "File is not an image.";
		        $uploadOk = 0;
		    }
		}
		// Check if file already exists
		// if (file_exists($target_file)) {
		//     // echo "Sorry, file already exists.";
		//     $uploadOk = 0;
		// }
		// Check file size
		if ($_FILES["fileToUpload"]["size"] > 500000) {
		    // echo "Sorry, your file is too large.";
		    $uploadOk = 0;
		}
		// Allow certain file formats
		if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
		&& $imageFileType != "gif" ) {
		    // echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
		    $uploadOk = 0;
		}
		// Check if $uploadOk is set to 0 by an error
		if ($uploadOk == 0) {
		    // echo "Sorry, your file was not uploaded.";
		// if everything is ok, try to upload file
		} else {
		    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		        // echo "The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
		    } else {
		        // echo "Sorry, there was an error uploading your file.";
		    }
		}
		    $duongdanfile="http://localhost/Hoc_HTML/BT_DangKy/uploads/".basename( $_FILES["fileToUpload"]["name"]);
	        // echo '<br> duongdanfile :' .$duongdanfile.'<br>';
	        // echo '<img src="'.$duongdanfile.'" alt="">';
	        $avarta=$duongdanfile;



	    //kết nối với CSDL
	    $username_sql = "root"; // Khai báo username
		$password_sql = "";      // Khai báo password
		$server   = "localhost";   // Khai báo server
		$dbname   = "web";      // Khai báo database
		
		// Create connection
		$conn = mysqli_connect($server, $username_sql, $password_sql,$dbname );

		// Check connection
		if (!$conn) {
		    die("Connection failed: " . mysqli_connect_error());
		}
		echo "Connected successfully";
		//update dl
		if ($id > 0) {
				$sql = "UPDATE ttdk set username='$username', password='$password', sex='$sex',birthday='$birthday',hobby='$hobby' where id = ".$id;
				
				    if (mysqli_query($conn, $sql)) {
		                   echo "Record updated successfully";
		               } else {
		                   echo "Error updating record: " . mysqli_error($conn);
		               }	
		}else{
					$sql = "INSERT INTO ttdk (username, password, sex,birthday,hobby,avarta)
					VALUES ('$username', '$password', '$sex','$birthday','$hobby','$avarta')";

					if (mysqli_query($conn, $sql)) {
					    echo "New record created successfully";}
					    else {
					    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
					}
		} 
		
		
		 // insert CSDL
		// $sql = "INSERT INTO ttdk (username, password, sex,birthday,hobby,avarta)
		// VALUES ('$username', '$password', '$sex','$birthday','$hobby','$avarta')";

		// if (mysqli_query($conn, $sql)) {
		//     echo "New record created successfully";
		// } else {
		//     echo "Error: " . $sql . "<br>" . mysqli_error($conn);
		// }

        mysqli_close($conn);

       ?>
       <hr>
		<br>
		<a href="select.php">Xem kết quả</a>
		<br>
		<a href="">Quay lại</a>
</body>
</html>