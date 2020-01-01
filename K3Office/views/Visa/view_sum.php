<!DOCTYPE html>
<html>
<head>
    <title>Tìm kiếm sinh viên</title>
    <meta charset="utf-8">
</head>
<body>
<form action="" method="get">
    <table align="center">
        <tr>
            <td><input type="date" name="search"></td>
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
        <!--                ---------------------------------------------------------->
        <?php
        //kết nối database
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "K3Office";
        $id=(isset($_GET['id']))?$_GET['id']:0;

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        //select duwxx liệu từ database ra màn hình
//        $sql="SELECT*FROM K3Office where hoten like '%$search%'";
        $sql="SELECT SUM(ptkh) AS 'abc' FROM K3Office where hoten ngaylam='$search'";
        $result = $conn->query($sql);
        $result->num_rows;
        while($row = $result->fetch_assoc()) {
                echo "title: " . $row["title"] ;
            }
        $conn->close();
    }
}
?>
</body>
</html>
