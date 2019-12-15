
<!-- Common -->
<?php $this->load->view('admin/support/_common'); ?>

<!-- Main content wrapper -->
<div class="wrapper">

	<!-- Static table -->
	<div class="widget">
	
		<div class="title">
			<img src="<?php echo public_url('admin'); ?>/images/icons/dark/frames.png" class="titleIcon" />
			<h6><?php echo lang('list'); ?> <?php echo lang('mod_support'); ?></h6>
		</div>
		
		<table cellpadding="0" cellspacing="0" width="100%" class="sTable myTable">
			<thead>
				<tr>
				    <td style="width:70px;"><?php echo lang('sort_order'); ?></td>
				    
					<td class="sortCol"><?php echo lang('name'); ?></td>
					<td class="sortCol"><?php echo lang('phone'); ?></td>
					<td class="sortCol"><?php echo lang('yahoo'); ?></td>
					<td class="sortCol"><?php echo lang('email'); ?></td>
					<td class="sortCol"><?php echo lang('skype'); ?></td>
					
					<td style="width:100px;"><?php echo lang('action'); ?></td>
				</tr>
			</thead>
			<tbody>
			<?php foreach ($list as $row): ?>
				<tr class="row_<?php echo $row->id?>">
				    <td><?php echo $row->sort_order; ?></td>
				    
					<td>
						<?php echo $row->name; ?> 
					</td>
					
					<td><?php echo $row->phone; ?></td>
					
					<td><?php echo $row->yahoo; ?></td>
					
					<td><?php echo $row->gmail; ?></td>
					
					<td><?php echo $row->skype; ?></td>
					
					<td class="option">
						
						<a href="<?php echo admin_url('support/edit/'.$row->id)?>" title="<?php echo lang('edit'); ?>" class="tipS">
							<img src="<?php echo public_url('admin') ?>/images/icons/color/edit.png" />
						</a>
						
						<a href="<?php echo admin_url('support/del/'.$row->id)?>" title="<?php echo lang('delete'); ?>" class="tipS verify_action" >
								<img src="<?php echo public_url('admin') ?>/images/icons/color/delete.png" />
						</a>
						
					</td>
				</tr>
			<?php endforeach; ?>
			</tbody>
		</table>
	</div>
</div>
        