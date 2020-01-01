<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <?php require('../style/boostrap4_1.html')?>
    <link rel="stylesheet" href="../style/view_insert.css">
    <title>Thêm hóa đơn</title>

</head>
<body>
    <?php require('view_add.php') ?>
    <div style="padding: 50px">
        <?php require('../../models/Visa/data_select.php') ?>
    </div>
<?php require('../style/boostrap4_2.html') ?>
    <SCRIPT Language="JavaScript">
        <!--
        document.attachEvent("onkeydown", OnKeyDownHandler);

        function OnKeyDownHandler()
        {
            switch (event.keyCode)
            {
                case 'F5' :
                    event.returnValue = false;
                    event.keyCode = 0;
                    break;
            }
            return 0;
        }
        //-->
    </SCRIPT>

    <BODY>
</body>
</html>
