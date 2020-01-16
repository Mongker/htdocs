
<!DOCTYPE html>
<html>
<head>
	<title>Form đăng ký</title>
	<meta charset="utf-8">
</head>
<body>
	<h1 style="color: red" align="center">FORM ĐĂNG KÝ</h1>
     <?php
             //kết nối với CSDL
              $username = "root"; // Khai báo username
               $password = "";      // Khai báo password
               $server   = "localhost";   // Khai báo server
               $dbname   = "web";      // Khai báo database
               
               // Create connection
               $conn = mysqli_connect($server, $username, $password,$dbname );
               // Check connection
               if (!$conn) {
                   die("Connection failed: " . mysqli_connect_error());
     }
     
     ?>
     <?php
                $id=(isset($_GET['id']))?$_GET['id']:0;
               // echo 'id:'.$id;
                $sql = "SELECT *FROM ttdk where id =".$id;
               $result = mysqli_query($conn, $sql);

               if (mysqli_num_rows($result) > 0) {
                   // output data of each row 
               while($row = mysqli_fetch_assoc($result)) {

                    ?>
               <form action="insert.php" method="post" enctype="multipart/form-data">
               <!-- enctype="multipart/form-data -->

                    <table border="2" align="center">
                         <tr  >
                         
                         <td colspan="2" align="center"><b>ĐĂNG KÝ</b></td>
                         <input type="hidden" name="id" value="<?= $row['id'] ?>">
                    </tr>
                    <tr>
                         <td colspan="1">Full name</td>
                         <td ><input type="text" name="fullname" placeholder="Nhập full name" value="<?= $row['fullname'] ?>"></td>
                    </tr>
                    <tr>
                         <td colspan="1">username</td>
                         <td ><input type="text" name="username" placeholder="Nhập tên" value="<?= $row['username'] ?>"></td>
                    </tr>
                    <tr>
                         <td colspan="1">Password</td>
                         <td ><input type="password" name="password" placeholder="Nhập mật khẩu" value="<?= $row['password'] ?>"></td>
                    </tr>
                    <tr>
                         <td>Nhập lại Password</td>
                         <td><input type="password" name="repassword" placeholder="Nhập lại mât khẩu" value="<?= $row['repassword'] ?>"></td>
                    </tr>
                    <tr>
                         <td>Giới tính</td>
                         <td>
                              <?php 
                              if ($row['sex']=="Nam") {                                                                    
                              ?>   
                              <input type="radio" name="sex" value="Nam" checked="">Nam
                              <input type="radio" name="sex" value="Nữ" >Nữ 
                              
                              <?php
                              }else {
                              ?>
                              <input type="radio" name="sex" value="Nam" >Nam
                              <input type="radio" name="sex" value="Nữ" checked="">Nữ 
                              
                              <?php 
                              }
                               ?>
                              <!-- <input type="radio" name="sex" value="Nam">Nam
                              <input type="radio" name="sex" value="Nữ">Nữ -->
                         </td>
                    </tr>
                    <tr>
                         <td>Ngày sinh</td>
                         <td><input type="date" name="birthday" value="<?= $row['birthday'] ?>"></td>
                    </tr>
                    <tr>
                         <td>Địa chỉ</td>
                         <td><textarea name="address"><?= $row['address'] ?></textarea></td>
                    </tr>
                    <tr>
                         <td>Avarta</td>
                         <td><input type="file" name="fileToUpload" id="fileToUpload">
                         <img src="<?= $row['avarta'] ?>" alt="" width="50px"></td>
                    </tr>
                    <tr>
                         <td>Sở thích</td>
                         <td>
                              <?php 
                              $xemphim="";
                              $thethao="";
                              $web="";    
                              $arr_sothich= explode("-", $row['hobby']);
                              // var_dump($arr_sothich);
                              foreach ($arr_sothich as $value) {
                                   // echo 'values:'.trim($value);
                                   if (trim($value)=="Xem phim") {
                                        $xemphim="checked";}
                                        else if (trim($value)=="Thể thao") {
                                           $thethao="checked";;   
                                               
                                        }
                                        else if (trim($value)=="Web") {
                                           $web="checked";;  
                                        }
                              }
                               ?>
                              <input type="checkbox" name="sothich[]" value ="Xem phim" <?= $xemphim ?>>Xem phim
                              <input type="checkbox" name="sothich[]" value="Thể thao" <?= $thethao ?>>Thể Thao
                              <input type="checkbox" name="sothich[]" value="Web" <?= $web ?>>Web
                         </td>
                    </tr>
                    <tr>
                         <td align="center" colspan="2"><input type="submit" name="sua" value="Sửa">
                         <input type="reset" name="reset" value="Reset"></td>
                    </tr>
          </table>
     </form>
               <?php
                      // echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
                   }
               } else {
                   echo "0 results";
               }
            mysqli_close($conn);
              
     ?>
     
</body>
</html>