<!-- Common view -->
<?php $this->load->view('admin/video/_common'); ?>


<!-- Main content wrapper -->
<div class="wrapper">
	<div class="widget">
	
		<div class="title">
			<span class="titleIcon"><input type="checkbox" id="titleCheck" name="titleCheck" /></span>
			
			<h6>
				<?php 
					
						echo lang('title_list');
				?>
			</h6>
			
		 	<div class="num f12"><?php echo lang('total'); ?>: <b>0</b></div>
		</div>
	
		<table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll">
			<thead>
				<tr>
					<td style="width:10px;"><img src="<?php echo public_url('admin'); ?>/images/icons/tableArrows.png" /></td>
					<td style="width:80px;"><?php echo lang('no.'); ?></td>
					<td><?php echo lang('name'); ?></td>
					<td style="width:150px;"><?php echo lang('post_date'); ?></td>
					<td style="width:100px;"><?php echo lang('action'); ?></td>
				</tr>
			</thead>

 			<tfoot class="auto_check_pages">
				<tr>
					<td colspan="6">
						 <div class="list_action itemActions">
								<a href="#submit" id="submit" class="button blueB" url="<?php echo admin_url('video/del_all')?>">
									<span style='color:white;'>Xóa hết</span>
								</a>
						 </div>
							
					     <div class='pagination'>
			               <?php echo $this->pagination->create_links();?>
			            </div>
					</td>
				</tr>
			</tfoot>
			
			<tbody>
			     <!-- List -->
				<?php foreach ($list as $row): ?>
					 <tr class='row_<?php echo $row->id?>'>
						<td><input type="checkbox" name="id[]" value="<?php echo $row->id; ?>" /></td>
						
						<td class="textC"><?php echo $row->id; ?></td>
						
						<td>
							<div class="image_thumb">
								<a href="<?php echo site_url('video/view/'.$row->id); ?>" target="_blank">
									<img src="<?php echo public_url('upload/video/'.$row->images)?>" height="50">
								</a>
								<div class="clear"></div>
							</div>
							<a href="<?php echo site_url('video/view/'.$row->id); ?>" target="_blank">
								<b><?php echo $row->name; ?></b>
							</a>
							<div class="f11">Lượt xem: <?php echo $row->count_view; ?></div>
						</td>
						
						<td class="textC">
							<?php echo mdate('%d-%m-%Y',$row->created)?>
						</td>
					
						<td class="option">
						
								<a href="<?php echo admin_url('video/edit/'.$row->id)?>" title="<?php echo lang('edit'); ?>" class="tipS"><img src="<?php echo public_url('admin') ?>/images/icons/color/edit.png" /></a>
							
								<a href="<?php echo admin_url('video/del/'.$row->id)?>"  title="<?php echo lang('delete'); ?>" class="tipS verify_action" >
									<img src="<?php echo public_url('admin') ?>/images/icons/color/delete.png" />
								</a>
						
						</td>
					</tr>
				<?php endforeach; ?>
			</tbody>
		</table>
		
	</div>
</div>
        