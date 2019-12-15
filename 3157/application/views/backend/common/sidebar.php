<div class="sidebar sidebar-fixed hidden-xs hidden-sm hidden-md">
    <ul class="nav nav-pills nav-list nav-stacked">
		<?php 
		$user['group_permission']=array(1,2,3,4,5,6,7);
		?>
        <?php if(in_array(7, $user['group_permission'])) : ?>
            <li><a href="backend/dashboard"><i class="fa fa-tachometer"></i>Tổng quan</a></li>
        <?php endif; ?>
        <?php if(in_array(5, $user['group_permission'])) : ?>
           <li><a href="backend/order"><i class="fa fa-shopping-cart"></i>Đơn hàng</a></li>
        <?php endif; ?>
        <?php if(in_array(6, $user['group_permission'])) : ?>
            <li><a href="backend/product"><i class="fa fa-barcode"></i>Hàng hóa</a></li>
        <?php endif; ?>
        <?php if(in_array(4, $user['group_permission'])) : ?>
            <li><a href="backend/customer"><i class="fa fa-users"></i>Khách hàng</a></li>
        <?php endif; ?>
        <?php if(in_array(4, $user['group_permission'])) : ?>
            <li><a href="backend/import"><i class="fa fa-truck"></i>Nhập kho</a></li>
        <?php endif; ?>
        <?php if(in_array(3, $user['group_permission'])) : ?>
            <li><a href="backend/inventory"><i class="fa fa-list-alt"></i>Tồn kho</a></li>
        <?php endif; ?>
        <li><a href="#"><i class="fa fa-signal"></i>Doanh số</a></li>
        <li><a href="#"><i class="fa fa-file-text"></i>Thu chi</a></li>
        <li><a href="#"><i class="fa fa-usd"></i>Lợi nhuận</a></li>
        <?php if(in_array(2, $user['group_permission'])) : ?>
            <li><a href="backend/config"><i class="fa fa-cogs"></i>Thiết lập</a></li>
        <?php endif; ?>
    </ul>
</div>
<!-- end div.sidebar -->