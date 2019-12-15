<!-- Title area -->
<div class="titleArea">
	<div class="wrapper">
		<div class="pageTitle">
			<h5><?php echo lang('mod_support'); ?></h5>
			<span><?php echo lang('support_info'); ?></span>
		</div>
		
		<div class="horControlB menu_action">
			<ul>
				<li><a href="<?php echo admin_url('support/add'); ?>">
					<img src="<?php echo public_url('admin'); ?>/images/icons/control/16/add.png" />
					<span><?php echo lang('add'); ?></span>
				</a></li>
				
				<li><a href="<?php echo admin_url('support'); ?>">
					<img src="<?php echo public_url('admin'); ?>/images/icons/control/16/list.png" />
					<span><?php echo lang('list'); ?></span>
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





