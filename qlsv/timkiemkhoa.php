<!DOCTYPE html>
<html>
<head>
	<title>Tìm kiếm khoa</title>
	<meta charset="utf-8">

</head>
<body>
    <form action="timkiemkhoa.php" method="get">
        <table align="center">
            <tr>
                <td><input type="text" name="search" placeholder="Nhập tên khoa"></td>
                <td><input type="submit" name="ok" value="Search"></td>
            </tr>
        </table>
    </form>

<!--    // Phần xử lý code tìm kiếm-->
   <?php
        if (isset($_REQUEST['ok'])) {
            $search = addslashes($_GET['search']);
            if (empty($search)) {
                echo "Yeu cau nhap du lieu vao o trong";
            } else {
                // Phan dung vong lap while show du lieu
    ?> 
 
                <?php
                //kết nối database
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "qlsvl02";
                $id=(isset($_GET['id']))?$_GET['id']:0;

                // Create connection
                $conn = new mysqli($servername, $username, $password, $dbname);
                // Check connection
                if ($conn->connect_error) {
                    die("Connection failed: " . $conn->connect_error);
                }
                // echo "Connected successfully";
                //xóa
                $sql_delete="";
                $sql_delete = "DELETE FROM khoa WHERE id= ".$id;

                if ($conn->query($sql_delete) === TRUE) {
                    // echo '<script type="text/javascript">alert("Bạn có chắc chắn muốn xóa ?")</script>';

                } else {
                    echo "Error deleting record: " . $conn->error;
                }

                //select duwxx liệu từ database ra màn hình
                $sql="SELECT*FROM khoa where khoa like '%$search%'";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    echo '<h1 align="center">DANH SÁCH KHOA</h1>';
                    echo "<table align='center' border='1' ><tr><th>STT</th><th>KHOA</th><th>Chức năng</th></tr>";
                    // output data of each row
                    $i=1;

                    while($row = $result->fetch_assoc()) {
                        ?>
                        <tr>
                            <?php echo '<td>'.$i.'</td>'; ?>
                            <td><?= $row["khoa"] ?></td>
                            
                            <td>
                                <a href="dskhoa.php?id=<?= $row["id"] ?>">Xoá</a>
                                <a href="suakhoa.php?id=<?= $row["id"] ?>">Sửa</a>
                            </td>
                            <?php $i++; ?>

                        </tr>
                        <?php

                    }
                    echo "</table>";
                } else {
                    echo "0 results";
                }
                $conn->close();
                ?>
<!--                ---------------------------------------------------------->
    <?php
            }
        }
    ?>
</body>
</html>