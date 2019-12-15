<nav id="navbar-container" class="navbar navbar- navbar-fixed-top">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle menu-toggler pull-left" onclick="$('#sidebar').toggleClass('hidden-xs hidden-sm hidden-md')">
                <span class="sr-only">Thanh menu trên - Sidebar</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <?php if(isset($data['store'])){ ?>
                <li>
                    <label style="margin: 13px 15px; color: white">
                        Cửa hàng
                    </label>
                </li>
                <li style="border-right: 1px solid #E1E1E1; padding-right: 15px;">
                    <select id="store-id" class="form-control" style="margin: 8px auto">
                        <?php foreach ($data['store'] as $key => $item) :?>
                            <option <?php if($item['ID']==$data['store_id']) echo 'selected '; ?> value="<?php echo $item['ID']; ?>"><?php echo $item['stock_name']; ?></option>
                        <?php endforeach;?>
                    </select>
                </li>
                <?php } ?>
                <li class="dropdown user-profile">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true"
                       aria-expanded="false"><span class="hello">Xin chào, </span><?php echo (isset($user)) ?
                            $user['display_name'] : $user['username']; ?><span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="account"><i class="fa fa-user"></i>Tài khoản</a></li>
                        <li><a href="authentication/logout"><i class="fa fa-power-off"></i>Thoát</a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>