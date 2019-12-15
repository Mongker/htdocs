<nav id="navbar-container" class="navbar navbar- navbar-fixed-top">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><img src="public/templates/backend/images/logoqn.png" alt="Quang na" class="img-responsive"></a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="#">Quang Na</a></li>
                <li class="dropdown user-profile">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="hello">Xin chào, </span><?php echo ( isset( $user ) ) ?
                            $user[ 'display_name' ] : $user[ 'username' ]; ?><span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="backend/account"><i class="fa fa-user"></i>Tài khoản</a></li>
                        <li><a href="backend/authentication/logout"><i class="fa fa-power-off"></i>Thoát</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>