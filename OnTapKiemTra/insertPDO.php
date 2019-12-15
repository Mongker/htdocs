<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
	<title>Thêm dữ liệu</title>
</head>
<body>
<?php
$username = "root"; // Khai báo username
$password = "";      // Khai báo password
$server   = "localhost";   // Khai báo server
$dbname   = "tintuc";      // Khai báo database

// Kết nối database tintuc --.
$connect = new mysqli($server, $username, $password, $dbname);

//Nếu kết nối bị lỗi thì xuất báo lỗi và thoát.
if ($connect->connect_error) {
    die("Không kết nối :" . $connect->connect_error);
    exit();
}

//Khai báo giá trị ban đầu, nếu không có thì khi chưa submit câu lệnh insert sẽ báo lỗi
$title = "";
$date = "";
$description = "";
$content = "";

//Lấy giá trị POST từ form vừa submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if(isset($_POST["title"])) { $title = $_POST['title']; }
    if(isset($_POST["date"])) { $date = $_POST['date']; }
    if(isset($_POST["description"])) { $description = $_POST['description']; }
    if(isset($_POST["content"])) { $content = $_POST['content']; }

    //Code xử lý, insert dữ liệu vào table
    $sql = "INSERT INTO tin_xahoi (title, date, description, content)
    VALUES ('$title', '$date', '$description', '$content')";

    if ($connect->query($sql) === TRUE) {
        echo "Thêm dữ liệu thành công";
    } else {
        echo "Error: " . $sql . "<br>" . $connect->error;
    }
}
//Đóng database
$connect->close();
?>

<form action="" method="post">
    <table align="center">
        <tr>
            <th>Tiêu đề:</th>
            <td><input type="text" name="title" value=""></td>
        </tr>

        <tr>
            <th>Ngày tháng:</th>
            <td><input type="date" name="date" value=""></td>
        </tr>

        <tr>
            <th>Mô tả:</th>
            <td><input type="text" name="description" value=""></td>
        </tr>

        <tr>
            <th>Nội dung:</th>
            <td><textarea cols="30" rows="7" name="content"></textarea></td>
        </tr>
        <tr>
            <th></th>
            <td>
                <button type="submit">Lưu</button>
            </td>
        </tr>
    </table>
    
</form>
</body>
</html>
