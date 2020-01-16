<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
   <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>

    <title>Danh sách</title>
</head>
<body>

<div class="container">
    <div class="text-xs-center">
        <h3 class="display-3" style="text-align: center;"> DANH SÁCH SINH VIÊN	</h3><!-- hết display-3  -->
    </div> <!-- hết text-xs-center -->
</div> <!-- hết container -->
<div class="container">
    <div class="row">
        <?php  
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
        $sql="SELECT lop,khoa,hoten,ngaysinh,gioitinh,anh,diachi,sodt,email FROM sinhvien,lop,khoa WHERE sinhvien.danhmucidlop=lop.id and sinhvien.danhmucidkhoa=khoa.id";
        $result=$conn->query($sql);
        if ($result->num_rows >0) {
            while ($row =$result->fetch_assoc()) {
            ?>
        <div class="col-sm-4">
            <div class="card">
                   <img class="card-img-top" src="anh/woww.jpg" alt="Card image cap">
                   <div class="card-block">
                       <h4 class="card-title">Họ tên :<?= $row['hoten'] ?></h4>
                       <p class="card-text">Ngày sinh :<?= $row['ngaysinh'] ?></p>
                       <p class="card-text">Lớp :<?= $row['lop'] ?></p>
                       <p class="card-text">Khoa :<?= $row['khoa'] ?></p>
                       <p class="card-text">Địa Chỉ :<?= $row['diachi'] ?></p>
                       <a href="#" class="btn btn-outline-primary">Xem chi tiết</a>
                   </div>
               </div>   
        </div><!-- hết col-sm-4 -->
      <?php 
      }
      }

       ?>
       <?php $conn->close(); ?>
    </div><!-- het row -->
</div><!-- het container -->

</body>
</html>