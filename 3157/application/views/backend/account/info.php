<div class="panel-action">
    <div class="row">
        <div class="customer-act act">
            <div class="col-md-4 col-md-offset-2">
                <div class="left-action text-left clearfix">
                    <h2>Thông tin người đăng nhập</h2>
                </div>
            </div>
            <div class="col-md-6">
            </div>
        </div>
    </div>
</div>
<!-- end .panel-action -->
<div class="main-space customer"></div>
<div class="row account-info">
    <div class="col-md-6">
        <div class="form-horizontal">
            <div class="form-group">
                <div class="col-md-4">
                    <label for="name">Tên nhân viên</label>
                </div>
                <div class="col-md-8">
                    <span class=""><?php echo isset( $user ) ? $user[ 'display_name' ] : ''; ?></span>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-4">
                    <label for="name">Mã Nhân Viên</label>
                </div>
                <div class="col-md-8">
                    <strong><span class=""><?php echo isset( $user ) ? $user[ 'username' ] : ''; ?></span></strong>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-4">
                    <label for="name">Mật khẩu</label>
                </div>
                <div class="col-md-8 padd-0">
                    <button class="btn btn-primary btn-changepass"><i class="fa fa-retweet"></i> Đổi mật khẩu</button>
                    <div class="form-hide form-change-password">
                        <?php if( !empty(validation_errors() ) ) : ?>
                            <div class="alert alert-danger">
                                <?php echo validation_errors(); ?>
                            </div>
                        <?php endif; ?>
                        <form action="" method="post" class="form-horizontal">
                            <div class="form-group">
                                <label for="matkhauhientai" class="control-label sr-only">Mat khau hien tai</label>
                                <input type="text" class="form-control" name="data[password]" placeholder="Mật khẩu hiện tại">
                            </div>
                            <div class="form-group">
                                <label for="matkhaumoi" class="control-label sr-only">Mật khẩu mới</label>
                                <input type="password" class="form-control newpassw" name="data[newpassw]" placeholder="Mật khẩu mới">
                            </div>
                            <div class="form-group">
                                <label for="rematkhaumoi" class="control-label sr-only">Nhập lại mật khẩu mới</label>
                                <input type="password" class="form-control renewpassw" name="data[renewpassw]" placeholder="Nhập lại mật khẩu mới">
                                <span class="label label-danger arrowed-right">
                                    <span>Mật khẩu không giống nhau</span>
                                </span>
                            </div>

                            <div class="form-group">
                                <button type="reset"  class="btn btn-default btn-changep btn-sm">Hủy</button>
                                <button type="submit" name="change" class="btn btn-primary btn-sm btn-smf ">Đổi mật khẩu</button>
                                <div class="action-none" style="display: none;">
                                    <input type="submit" name="change" value="Lấy Lại Mật khẩu" class="btn-sm-after"/>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-4">
                    <label for="name">Email</label>
                </div>
                <div class="col-md-8">
                    <span class=""><?php echo isset( $user ) ? $user[ 'email' ] : ''; ?></span>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-4">
                    <label for="name">Nhóm người sử dụng</label>
                </div>
                <div class="col-md-8">
                    <?php echo '<span class="user_group" style="display: inline-block; color: #fff; background: #428BCA; padding: 2px 5px;"><i class="fa fa-male"></i> '. $user['group_name'] . '</span>'; ?>
                </div>
            </div>
        </div>
    </div>
</div>