<?php
        // $id=(isset($_GET['id']))?$_GET['id']:0;
        $hoten=(isset($_POST['hoten']))? $_POST['hoten'] :"";
        $ngaysinh=(isset($_POST['ngaysinh']))? $_POST['ngaysinh']:"";
        $gioitinh=(isset($_POST['gioitinh']))? $_POST['gioitinh']:"";
        $diachi=(isset($_POST['diachi']))? $_POST['diachi']:"";

    //kết nối database
        $servername= "localhost";
        $username = "root";
        $password = "";
        $dbname = "K3Office";
        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }// echo "Connected successfully";

        //insert dữ liệu
        $sql_insert="insert into K3OfficeExcel values(null,'".$hoten."','".$ngaysinh."','".$gioitinh."','".$diachi."') ";
            if ($hoten!='' && $ngaysinh!='' && $gioitinh!='' ) {
               $conn->query($sql_insert);
//               echo' <script type="text/javascript">alert("Thêm mới thành công !");</script>';

           }else {
//            echo '<script type="text/javascript">alert("Bạn phải nhập đầy đủ thông tin để thêm mới !");</script>';
            }
        $conn->close();

     ?>
