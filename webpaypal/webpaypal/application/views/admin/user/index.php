<!-- Common view -->
<?php $this->load->view('admin/user/_common'); ?>


<!-- Main content wrapper -->
<div class="wrapper">
	<div class="widget">
	
		<div class="title">
			<span class="titleIcon"><input type="checkbox" id="titleCheck" name="titleCheck" /></span>
			<h6><?php echo lang('list'); ?> <?php echo lang('mod_user'); ?></h6>
		 	<div class="num f12"><?php echo lang('total'); ?>: <b>0</b></div>
		</div>
		
		<form action="<?php echo $action; ?>" method="get" class="form" name="filter">
		<table cellpadding="0" cellspacing="0" width="100%" class="sTable mTable myTable withCheck" id="checkAll">
			<thead>
				<tr>
					<td style="width:10px;"><img src="<?php echo public_url('admin'); ?>/images/icons/tableArrows.png" /></td>
					<td style="width:80px;"><?php echo lang('no.'); ?></td>
					<td><?php echo lang('name'); ?></td>
					<td><?php echo lang('email'); ?></td>
					<td><?php echo lang('phone'); ?></td>
					<td><?php echo lang('address'); ?></td>
					<td style="width:100px;"><?php echo lang('action'); ?></td>
				</tr>
			</thead>
			
 			<tfoot>
				<tr>
					<td colspan="7">
					    <div class="list_action itemActions">
								<a url="<?php echo admin_url('user/delete_all')?>" class="button blueB" id="submit" href="#submit">
									<span style="color:white;">Xóa hết</span>
								</a>
						 </div>
							
					     <div class='pagination'>
			               <?php echo $this->pagination->create_links();?>
			            </div>
					</td>
				</tr>
			</tfoot>
 			
			<tbody>
				<!-- Filter -->
				<?php foreach ($list as $row): ?>
					<tr class="row_<?php echo $row->id?>">
						<td><input type="checkbox" name="id[]" value="<?php echo $row->id; ?>" /></td>
						
						<td class="textC"><?php echo $row->id; ?></td>
						
						
						<td><span title="<?php echo $row->name; ?>" class="tipS">
							<?php echo $row->name; ?>
						</span></td>
						
						
						<td><span title="<?php echo $row->email; ?>" class="tipS">
							<?php echo $row->email; ?>
						</span></td>
						
						<td>
							<?php echo $row->phone; ?>
						</td>
						
						<td>
							<?php echo $row->address; ?>
						</td>
						
						
						<td class="option">
							 <a href="<?php echo admin_url('user/edit/'.$row->id)?>" title="<?php echo $this->lang->line('edit'); ?>" class="tipS ">
							<img src="<?php echo public_url('admin') ?>/images/icons/color/edit.png" />
							</a>
							
							<a href="<?php echo admin_url('user/del/'.$row->id)?>" title="<?php echo $this->lang->line('delete'); ?>" class="tipS verify_action" >
							    <img src="<?php echo public_url('admin') ?>/images/icons/color/delete.png" />
							</a>
						</td>
					</tr>
				<?php endforeach; ?>	
				
			</tbody>
		</table>
		</form>
	</div>
</div>
        