<?php
//xóa
require ('../data.php');
$sql_delete="";
$sql_delete = "DELETE FROM Visa WHERE id= ".$id;
// echo $sql_delete;
if ($conn->query($sql_delete) === TRUE) {
    header('Location: http://localhost/K3Office/views/Visa/view_select.php');
} else {
    echo "Error deleting record: " . $conn->error;
}
?>
