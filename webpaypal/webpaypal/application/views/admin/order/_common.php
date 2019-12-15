<!-- Title area -->
<div class="titleArea">
	<div class="wrapper">
		<div class="pageTitle">
			<h5>Đơn hàng</h5>
			<span>Thông tin đơn hàng</span>
		</div>
		
		<div class="horControlB menu_action">
			<ul>
				
				<li><a href="<?php echo admin_url('order'); ?>">
					<img src="<?php echo public_url('admin'); ?>/images/icons/control/16/list.png" />
					<span>Danh sách đơn hàng</span>
				</a></li>
				
				<li><a href="<?php echo admin_url('order/export'); ?>">
					<img src="<?php echo public_url('admin'); ?>/images/excel.png" />
					<span><?php echo $this->lang->line('export_to_excel'); ?></span>
				</a></li>
				
			</ul>
		</div>
		
		<div class="clear"></div>
	</div>
</div>
<div class="line"></div>

<!-- Message -->
<?php if (isset($message)):?>
	<div class="wrapper">
		<div class="nNote success hideit">
			<p><strong>Thông báo: </strong><?php echo $message; ?></p>
		</div>
	</div>
<?php endif; ?>





