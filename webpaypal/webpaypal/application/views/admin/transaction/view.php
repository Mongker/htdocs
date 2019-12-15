<script type="text/javascript">
(function($)
{
	$(document).ready(function()
	{
		
	});
})(jQuery);
</script>
<style>
.list_product_info
{
	width:480px;
	float:left;
}
.list_product_info li
{
	width:230px;
	float:left;
}
.action
{
	float:right;
	padding-top:15px;
}
</style>
<div class="widget mg0 form_load" id="main_popup">

	<div class="title">
		<img src="<?php echo public_url('admin'); ?>/images/icons/dark/cart.png" alt="" class="titleIcon" />
		<h6><?php echo lang('title_tran_view'); ?></h6>
	</div>
	
	<div class="body">
	
			
			<div class="left tran_info" style="width:280px;">
				<div class="left fontB f13 mb5 blue"><?php echo lang('title_tran_info'); ?>:</div>
				<div class="clear"></div>
			
				<ul class="list2 valueB link">
					<li>
						<span><?php echo lang('tran_id'); ?>:</span>
						<font class="red"><?php echo $info->id; ?></font>
						<div class="clear"></div>
					</li>
					
					<li>
						<span><?php echo lang('created'); ?>:</span>
						<?php echo mdate('%d-%m-%Y',$info->created)?>
						<div class="clear"></div>
					</li>
					
					<li>
						<span><?php echo lang('tran_amount'); ?>:</span>
						<font class="red"><?php echo $info->_amount; ?></font>
						<div class="clear"></div>
					</li>
				
					
					<li>
						<span><?php echo lang('tran_payment'); ?>:</span>
						<?php echo $info->payment; ?>
						<div class="clear"></div>
					</li>
					
					<li class="status">
						<span><?php echo lang('status'); ?>:</span>
						<font class="<?php echo $info->_status; ?>">
							<?php echo lang('tran_status_'.$info->_status); ?>
						</font>
						<div class="clear"></div>
					</li>
				</ul>
				<div class="clear"></div>
			</div>
			
		    <!-- Order info -->
			<div class="left order_info" style="width:290px;">	
				<div class="left fontB f13 mb5 blue">Thông tin khách hàng:</div>
				<div class="clear"></div>
				<ul class="list2 valueB">
					<li><span><?php echo lang('full_name'); ?>:</span><?php echo $info->user_name; ?></li>
					<li><span><?php echo lang('email'); ?>:</span><?php echo $info->user_email; ?></li>
					<li><span><?php echo lang('phone'); ?>:</span><?php echo $info->user_phone; ?></li>
				    <li><span>Lời nhắn:</span> <?php echo $info->message; ?></li>
				</ul>
			</div>
			
			
		     <div class="clear"></div>
			<!-- Thong tin don hang -->
			<div class="fontB f13 mb5 blue"><?php echo lang('title_order_info'); ?>:</div>
			<div class="clear"></div>
			<?php foreach ($orders as $row):?>
			<div class="left mt5 "  style='margin-left:5px;'>
			    
			    <a target='_blank' href='<?php echo base_url('product/view/'.$row->product_id); ?>' title='<?php echo $row->product_name; ?>'>
				   <img class="left dInline mr10" style="width:100px; max-height:100px;"src='<?php echo base_url('upload/product/'.$row->image_link); ?>' alt='<?php echo $row->product_name; ?>'>
				 
				</a>
				
				<div class="left dInline">
					<ul class="list2 valueB list_product_info" style="margin-top:-8px;">
					    
						<li class="fontB blue f13">
							<a target='_blank' href='<?php echo base_url('product/view/'.$row->product_id); ?>' title='<?php echo $row->product_name; ?>'>
								<?php echo $row->product_name; ?>
							</a>
						</li>
						<li><span><?php echo lang('price'); ?>:</span><?php echo $row->_price; ?></li>
						<li><span><?php echo lang('quantity'); ?>:</span><?php echo $row->qty; ?></li>
						<li class='status'><span><?php echo lang('status'); ?>:</span><font class="<?php echo $row->_status; ?>"><?php echo lang('order_status_'.$row->_status); ?></font></li>
						<li><span><?php echo lang('into_money'); ?>:</span> <font class="red f15"><?php echo $row->_amount; ?></font></li>
						
					</ul>
					
					<div class='action'>
					   <?php if ($row->_can_active): ?>
							<a href="<?php echo $row->_url_active; ?>" class="button blueB mr5">
							<span><?php echo lang('active'); ?></span>
							</a>
					   <?php endif; ?>
					   
						<?php if ($row->_can_cancel): ?>
						<a href="<?php echo $row->_url_cancel; ?>"  class="button redB mr5"><span>
						<?php echo lang('cancel'); ?></span></a>
					    <?php endif;?>
					
				</div>
			</div>
			</div>
			<div class="clear" style='height:5px'></div>	
			<?php endforeach;?>		
			<div class="clear" style='height:5px'></div>
		
		<div class="clear" style='height:5px'></div>	
 </div>
 </div>
