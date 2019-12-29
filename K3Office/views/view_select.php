<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="./style/view_insert.css">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <?php require ('./style/boostrap4_1.html')?>
    <title>Hiển thị danh sách</title>
</head>
<body>
    <?php require('view_insert2.php') ?>
    <h5 align="center">-------------------------------------------------------------------------------</h5>
    <div class="container" align="center" >
        <?php require('../models/data_select.php') ?>
    </div>
    <?php require ('./style/boostrap4_2.html')?>
</body>
</html>