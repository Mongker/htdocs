<?php
require ('database.php');
//select dữ liệu từ database ra màn hình
$sql="SELECT*FROM Visa";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
    echo '<h1 align="center">DANH SÁCH HOÁ ĐƠN</h1>';
    echo "<table style='width:100%' border='1' ><tr><th>STT</th>
<th>Đầu thẻ của chủ</th><th>Ngày làm thẻ</th><th>Tên khách hàng:</th><th>Số thẻ khách hàng:</th><th>Số tiền làm:</th><th>Phí % ngân hàng thu</th><th>Phí % thu khách hàng</th><th>Phí thu tổng</th><th>Phí ngân hàng thu</th><th>Phi thu khách hàng</th><th>Xoá</th></th></tr>";
    // output data of each row
    $i=1;

    while($row = $result->fetch_assoc()) {
        ?>
        <tr align="center">
            <?php echo '<td>'.$i.'</td>'; ?>
            <td><?= $row["dauthe"] ?></td>
            <td><?= $row["ngaylam"] ?></td>
            <td><?= $row["khachang"] ?></td>
            <td><?= $row["sothe"] ?></td>
            <td><?= $row["sotienlam"] ?></td>
            <td><?= $row["nht"] ?></td>
            <td><?= $row["kh"] ?></td>
            <td><?= $row["psum"] ?></td>
            <td><?= $row["ptnh"] ?></td>
            <td><?= $row["ptkh"] ?></td>
            <td align="center">
                <a href="../../models/Visa/data_delete.php?id=<?= $row["id"] ?>">Xoá</a>
            </td>
<!--            <td align="center">-->
<!--                <a href="../views/view_updata.php?id=--><?//= $row["id"] ?><!--">Sửa</a>-->
<!--            </td>-->
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