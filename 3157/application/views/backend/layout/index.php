<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <base href="<?php echo CMS_BASE_URL; ?>"/>
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title><?php echo isset($seo['title']) ? $seo['title'] : 'Quang Na - Phần mềm quản lý'; ?></title>

    <!-- Bootstrap -->
    <link href="public/templates/backend/css/bootstrap.min.css" rel="stylesheet">
    <link href="public/templates/backend/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="public/templates/backend/libs/xdsoft_dtpk/jquery.datetimepicker.css">
    <link href="public/templates/backend/css/style.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<header>
    <?php $this->load->view( 'backend/common/header',isset( $data ) ? $data : NULL ); ?>
</header>
<!-- end header -->
<section class="main" role="main">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-2 padd-0">
                <?php $this->load->view( 'backend/common/sidebar',isset( $data ) ? $data : NULL ); ?>
            </div>
            <div class="col-md-10 padd-left-0">
                <div class="main-content">
                    <?php
                        /*
                         * Panel load popup model
                        /************************************/
                        $this->load->view( 'backend/common/modal',isset( $data ) ? $data : NULL );
                    ?>
                    <?php
                    // load template
                    $this->load->view( $template, isset( $data ) ? $data : NULL );
                    ?>
                </div>
                <!-- end div.main-content -->
            </div>
        </div>
    </div>
</section>
<!--end .main-->
<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="public/templates/backend/js/jquery-1.11.3.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<!-- Library -->
<?php $this->load->view( 'backend/common/lib_custom_tinycme'); ?>
<script src="public/templates/backend/libs/xdsoft_dtpk/jquery.datetimepicker.js"></script>
<script src="public/templates/backend/js/bootstrap.min.js"></script>
<script src="public/templates/backend/libs/autocomplete/jquery.autocomplete.js"></script>
<!-- Library -->
<script src="public/templates/backend/js/main.js"></script>
<script src="public/templates/backend/js/ajax.js"></script>
<script type="text/javascript">
    $(document).on('ready ajaxComplete', function(){
        $('.txttimes').datetimepicker({
            format:'d/m/Y',
        });

        $('.datepk').datetimepicker({
            format:'d/m/Y',
            timepicker:false
        });


    });

</script>

</body>
</html>