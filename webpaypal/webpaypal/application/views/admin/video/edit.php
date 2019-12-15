<style>
<!--
.span4 .formRow {padding:5px};
.span4 .formRow .formRight{margin-right:5px !important}
#tag_tagsinput{width:95% !important;}
.oneTwo{width:85%}
-->
</style>

<?php $this->load->view('admin/video/_common'); ?>

<!-- Main content wrapper -->
<div class="wrapper">
    <div class="fluid">
	   	<!-- Form -->
		<form action="<?php echo $action; ?>" class="form" id="form" method="post">
			<fieldset>
				    <div class="span8">
				        <div class="widget">
								<div class="title">
									<img src="<?php echo public_url('admin'); ?>/images/icons/dark/add.png" class="titleIcon" />
									<h6><?php echo lang('edit'); ?> <?php echo lang('mod_video'); ?></h6>
								</div>
								
								<div class="formRow">
									<label class="formLeft" for="param_name"><?php echo lang('name'); ?>:<span class="req">*</span></label>
									<div class="formRight">
										<span class="oneTwo"><input name="name" id="param_name" _autocheck="true" type="text" value='<?php echo $info->name; ?>' /></span>
										<span name="name_autocheck" class="autocheck"></span>
										<div name="name_error" class="clear error"></div>
									</div>
									<div class="clear"></div>
								</div>
                                
                                <div class="formRow">
									<label class="formLeft" for="param_link"><?php echo lang('link'); ?>:<span class="req">*</span></label>
									<div class="formRight">
										<span class="oneTwo"><input name="link" id="param_link" _autocheck="true" class="left"  type="text" value='<?php echo $info->link; ?>' /></span>
										<span name="link_autocheck" class="autocheck"></span>
										<div name="link_error" class="clear error"></div>
									</div>
									<div class="clear"></div>
								</div>
								
							
		
								<div class="formRow">
									<label class="formLeft" for="param_intro"><?php echo lang('intro'); ?>:</label>
									<div class="formRight">
										<span class="oneTwo"><textarea name="intro" id="param_intro" rows="3" cols=""><?php echo $info->intro?></textarea></span>
										<span name="intro_autocheck" class="autocheck"></span>
										<div name="intro_error" class="clear error"></div>
									</div>
									<div class="clear"></div>
								</div>
								
				           		<div class="formSubmit">
				           			<input type="submit" value="<?php echo lang('button_update'); ?>" class="redB" />
				           			<input type="reset" value="<?php echo lang('button_reset'); ?>" class="basic" />
				           		</div>
				        		<div class="clear"></div>
							</div>
						</div>
						
						
			</fieldset>
		</form>
	</div>
</div>
