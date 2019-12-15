<script type="text/javascript">
(function($)
{
	$(document).ready(function()
	{
		
	});
})(jQuery);
</script>


<?php $this->load->view('admin/user/_common'); ?>

<!-- Main content wrapper -->
<div class="wrapper">

   <!-- Form -->
	<form class="form" id="form" action="<?php echo $action; ?>" method="post">
		<fieldset>
			<div class="widget">
				<div class="title">
					<img src="<?php echo public_url('admin'); ?>/images/icons/dark/edit.png" class="titleIcon" />
					<h6><?php echo lang('edit'); ?> <?php echo lang('mod_user'); ?></h6>
				</div>
				
				<div class="formRow">
					<label class="formLeft" for="param_password"><?php echo lang('password'); ?>:<span class="req">*</span></label>
					<div class="formRight">
						<span class="oneTwo"><input name="password" id="param_password" _autocheck="true" type="password" class="tipN" title="<?php echo lang('note_password'); ?>" /></span>
						<div name="password_autocheck" class="autocheck"></div>
						<div name="password_error" class="clear error"><?php echo form_error('password')?></div>
						<div class="formNote clear" style="padding-top:0px;"><?php echo lang('note_password_change'); ?></div>
					</div>
					<div class="clear"></div>
				</div>
				
				<div class="formRow">
					<label class="formLeft" for="param_password_repeat"><?php echo lang('password_repeat'); ?>:<span class="req">*</span></label>
					<div class="formRight">
						<span class="oneTwo"><input name="password_repeat" id="param_password_repeat" _autocheck="true" type="password" /></span>
						<div name="password_repeat_autocheck" class="autocheck"></div>
						<div name="password_repeat_error" class="clear error"><?php echo form_error('password_repeat')?></div>
					</div>
					<div class="clear"></div>
				</div>
				
				<div class="formRow">
					<label class="formLeft" for="param_name"><?php echo lang('name'); ?>:<span class="req">*</span></label>
					<div class="formRight">
						<span class="oneTwo"><input name="name" value="<?php echo $info->name; ?>" id="param_name" type="text" _autocheck="true" /></span>
						<div name="name_autocheck" class="autocheck"></div>
						<div name="name_error" class="clear error"><?php echo form_error('name')?></div>
					</div>
					<div class="clear"></div>
				</div>
				
				<div class="formRow">
					<label class="formLeft" for="param_phone"><?php echo lang('phone'); ?>:</label>
					<div class="formRight">
						<span class="oneTwo"><input name="phone" value="<?php echo $info->phone; ?>" id="param_phone" type="text" _autocheck="true" /></span>
						<div name="phone_autocheck" class="autocheck"></div>
						<div name="phone_error" class="clear error"><?php echo form_error('phone')?></div>
					</div>
					<div class="clear"></div>
				</div>
				
				<div class="formRow">
					<label class="formLeft" for="param_address"><?php echo lang('address'); ?>:</label>
					<div class="formRight">
						<span class="oneTwo"><input name="address" value="<?php echo $info->address; ?>" id="param_address" type="text" _autocheck="true" /></span>
						<div name="address_autocheck" class="autocheck"></div>
						<div name="address_error" class="clear error"><?php echo form_error('address')?></div>
					</div>
					<div class="clear"></div>
				</div>
				
				
           		<div class="formSubmit">
           			<input type="submit" value="<?php echo lang('button_update'); ?>" class="redB" />
           			<input type="reset" value="<?php echo lang('button_reset'); ?>" class="basic" />
           		</div>
        		<div class="clear"></div>
        		
			</div>
		</fieldset>
	</form>
	
</div>
