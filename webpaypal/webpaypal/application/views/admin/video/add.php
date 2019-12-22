<script type="text/javascript">
(function($)
{
	$(document).ready(function()
	{
		var main = $('#form');
		
		main.contentTabs();
	});
})(jQuery);
</script>

<?php $this->load->view('admin/video/_common'); ?>

<!-- Main content wrapper -->
<div class="wrapper" id="main_content">
    
   	<!-- Form -->
	<form action="<?php echo $action; ?>" class="form" id="form" method="post">
		<fieldset>
	        <div class="widget">
				<div class="title">
					<img src="<?php echo public_url('admin'); ?>/images/icons/dark/add.png" class="titleIcon" />
					<h6><?php echo lang('add'); ?> <?php echo lang('mod_video'); ?></h6>
				</div>
				
				<div class="formRow">
					<label class="formLeft" for="param_name"><?php echo lang('name'); ?>:<span class="req">*</span></label>
					<div class="formRight">
						<span class="oneTwo"><input name="name" id="param_name" _autocheck="true" type="text" /></span>
						<span name="name_autocheck" class="autocheck"></span>
						<div name="name_error" class="clear error"><?php echo form_error('name')?></div>
					</div>
					<div class="clear"></div>
				</div>
				
				<div class="formRow">
					<label class="formLeft" for="param_link"><?php echo lang('link'); ?>:<span class="req">*</span></label>
					<div class="formRight">
						<span class="oneTwo"><input name="link" id="param_link" _autocheck="true" type="text" /></span>
						<span name="link_autocheck" class="autocheck"></span>
						<div name="link_error" class="clear error"><?php echo form_error('link')?></div>
					</div>
					<div class="clear"></div>
				</div>
				
				
				<div class="formRow">
					<label class="formLeft" for="param_intro"><?php echo lang('intro'); ?>:</label>
					<div class="formRight">
						<span class="oneTwo"><textarea name="intro" id="param_intro" rows="3" cols=""></textarea></span>
						<span name="intro_autocheck" class="autocheck"></span>
						<div name="intro_error" class="clear error"></div>
					</div>
					<div class="clear"></div>
				</div>
				
           		<div class="formSubmit">
           			<input type="submit" value="<?php echo lang('button_add'); ?>" class="redB" />
           			<input type="reset" value="<?php echo lang('button_reset'); ?>" class="basic" />
           		</div>
        		<div class="clear"></div>
			</div>
		</fieldset>
	</form>
</div>
