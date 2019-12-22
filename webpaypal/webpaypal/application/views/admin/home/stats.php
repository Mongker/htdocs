
<!-- Amount -->
<div class="oneTwo">
	<div class="widget">
		<div class="title">
			<img src="<?php echo public_url('admin'); ?>/images/icons/dark/money.png" class="titleIcon" />
			<h6><?php echo lang('notice_stats_amount'); ?></h6>
		</div>
		
		<table cellpadding="0" cellspacing="0" width="100%" class="sTable myTable">
			<tbody>
				
					<tr>
							<td class="fontB blue f13"><?php echo lang("notice_stats_amount_total"); ?></td>
							<td class="textR webStatsLink red" style="width:120px;"><?php echo number_format($amount_total)?> đ</td>
					</tr>
				    
				    <tr>
							<td class="fontB blue f13">Doanh số hôm nay</td>
							<td class="textR webStatsLink red" style="width:120px;"><?php echo number_format($amount_to_day)?> đ</td>
					</tr>
					
				    <tr>
							<td class="fontB blue f13">Doanh số theo tháng</td>
							<td class="textR webStatsLink red" style="width:120px;">
							<?php echo number_format($tongtien_thang)?> đ
							</td>
					</tr>
				    
			</tbody>
		</table>
	</div>
</div>


<!-- User -->
<div class="oneTwo">
	<div class="widget">
		<div class="title">
			<img src="<?php echo public_url('admin'); ?>/images/icons/dark/users.png" class="titleIcon" />
			<h6>Thống kê dữ liệu</h6>
		</div>
		
		<table cellpadding="0" cellspacing="0" width="100%" class="sTable myTable">
			<tbody>
				
				<tr>
					<td>
						<div class="left">Tổng số gia dịch</div>
						<div class="right f11"><a href="<?php echo admin_url('transaction')?>"><?php echo lang("detail"); ?></a></div>
					</td>
					
					<td class="textC webStatsLink">
						<?php echo number_format($total_transaction)?>
					</td>
				</tr>
				
				<tr>
					<td>
						<div class="left">Tổng số sản phẩm</div>
						<div class="right f11"><a href="<?php echo admin_url('product')?>"><?php echo lang("detail"); ?></a></div>
					</td>
					
					<td class="textC webStatsLink">
						<?php echo number_format($total_product)?>
					</td>
				</tr>
				
				<tr>
					<td>
						<div class="left">Tổng số bài viết</div>
						<div class="right f11"><a href="<?php echo admin_url('news')?>"><?php echo lang("detail"); ?></a></div>
					</td>
					
					<td class="textC webStatsLink">
						<?php echo number_format($total_news)?>
					</td>
				</tr>
				
				<tr>
					<td>
						<div class="left">Tổng số thành viên</div>
						<div class="right f11"><a href="<?php echo admin_url('user')?>"><?php echo lang("detail"); ?></a></div>
					</td>
					
					<td class="textC webStatsLink">
						<?php echo number_format($total_user)?>
					</td>
				</tr>
				<tr>
					<td>
						<div class="left">Tổng số liên hệ</div>
						<div class="right f11"><a href="<?php echo admin_url('contact')?>"><?php echo lang("detail"); ?></a></div>
					</td>
					
					<td class="textC webStatsLink">
						<?php echo number_format($total_contact)?>
					</td>
				</tr>
			</tbody>
		</table>
	</div>
</div>

