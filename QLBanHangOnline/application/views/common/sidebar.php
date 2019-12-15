<div class="sidebar sidebar-fixed hidden-xs hidden-sm hidden-md" id="sidebar">
    <ul class="nav nav-pills nav-list nav-stacked">
        <li id="dashboard"><a href="pos" style=" color: white;background-color: #33CB82!important;"><i class="fa fa-pied-piper-alt"></i><b>POS Bán Hàng</b></a></li>
        <?php if (in_array(1, $user['group_permission'])) : ?>
            <li id="dashboard"><a href="dashboard"><i class="fa fa-gg-circle"></i><b>Trang Chủ</b></a></li>
        <?php endif; ?>
        <?php if (in_array(2, $user['group_permission'])) : ?>
            <li id="orders"><a href="orders"><i class="fa fa-shopping-cart"></i><b>Tạo đơn hàng</b></a></li>
        <?php endif; ?>
        <?php if (in_array(3, $user['group_permission'])) : ?>
            <li id="product"><a href="product"><i class="fa fa-product-hunt"></i><b>Sản phẩm</b></a></li>
        <?php endif; ?>
        <?php if (in_array(4, $user['group_permission'])) : ?>
            <li id="customer"><a href="customer"><i class="fa fa-users"></i><b>Khách hàng</b></a></li>
        <?php endif; ?>
        <?php if (in_array(5, $user['group_permission'])) : ?>
            <li id="import"><a href="import"><i class="fa fa-truck"></i><b>Nhập kho</b></a></li>
        <?php endif; ?>
        <?php if (in_array(6, $user['group_permission'])) : ?>
            <li id="inventory"><a href="inventory"><i class="fa fa-list-alt"></i><b>Tồn kho</b></a></li>
        <?php endif; ?>
        <?php if (in_array(7, $user['group_permission'])) : ?>
            <li id="revenue"><a href="revenue"><i class="fa fa-connectdevelop"></i><b>Doanh số</b></a></li>
        <?php endif; ?>
        <?php if (in_array(8, $user['group_permission'])) : ?>
            <li><a href="#"><i class="fa fa-file-text"></i><b>Thu chi</b></a></li>
        <?php endif; ?>
        <?php if (in_array(9, $user['group_permission'])) : ?>
            <li id="profit"><a href="profit"><i class="fa fa-usd"></i><b> Lợi nhuận</b></a></li>
        <?php endif; ?>
        <?php if (in_array(10, $user['group_permission'])) : ?>
            <li id="config"><a href="setting"><i class="fa fa-empire"></i><b>Thiết lập</b></a></li>
        <?php endif; ?>
    </ul>
</div>