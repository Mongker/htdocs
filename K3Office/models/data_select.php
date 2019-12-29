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


//select dữ liệu từ database ra màn hình
$sql="SELECT*FROM K3OfficeExcel";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo '<h1>DANH SÁCH SINH VIÊN</h1>';
    echo "<table border='1' ><tr><th>STT</th><th>Họ Tên</th><th>Ngày sinh</th><th>Giới tính</th><th>Địa chỉ</th><th>Xoá</th><th>Chỉnh sửa</th></th></tr>";
    // output data of each row
    $i=1;

    while($row = $result->fetch_assoc()) {
        ?>
        <tr align="center">
            <?php echo '<td>'.$i.'</td>'; ?>
            <td><?= $row["hoten"] ?></td>
            <td><?= $row["ngaysinh"] ?></td>
            <td><?= $row["gioitinh"] ?></td>
            <td><?= $row["diachi"] ?></td>
            <td align="center">
                <a href="../models/data_delete.php?id=<?= $row["id"] ?>">Xoá</a>
            </td>
            <td align="center">
                <a href="update.php?id=<?= $row["id"] ?>">Sửa</a>
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