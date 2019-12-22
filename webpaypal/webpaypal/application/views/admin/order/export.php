<?php 
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=product_order.xls");
header("Pragma: no-cache");
header("Expires: 0");
?> 
<table>
		<thead>
			<tr>
				<td>STT</td>
				<td style="width:60px;"><?php echo lang('no.'); ?></td>
				<td><?php echo lang('product'); ?></td>
				<td style="width:80px;"><?php echo lang('price'); ?></td>
				<td style="width:50px;"><?php echo lang('quantity'); ?></td>
				<td style="width:70px;"><?php echo lang('amount'); ?></td>
				<td style="width:75px;"><?php echo lang('order'); ?></td>
				<td style="width:75px;"><?php echo lang('tran'); ?></td>
				<td style="width:75px;"><?php echo lang('created'); ?></td>
			
			</tr>
		</thead>
		
		<tbody class="list_item">
		        
		        <?php foreach ($list as $k => $row):?>
			      <tr class='row_<?php echo $row->id?>'>
					<td class="textC"><?php echo $k + 1?></td>
					
					<td class="textC"><?php echo $row->id?></td>
					
					<td>
					<b><?php echo $row->product_name?></b>
					</td>
					
					<td class="textR">
					    <?php if($row->discount > 0){?>
                               <?php 
                               $price_new = $row->price - $row->discount;
                               ?>
                               <?php echo number_format($price_new)?> đ
	                       <p style='text-decoration:line-through'><?php echo number_format($row->price)?> đ</p>
                           <?php }else{?>
                                 <?php echo number_format($row->price)?> đ
                           <?php }?>
					</td>
					
					<td class="textC"><?php echo $row->qty?></td>
					
					<td class="textC"><?php echo $row->_amount?></td>
					
					
					<td class="status textC">
						<span class="<?php echo $row->_status; ?>">
						<?php echo lang('order_status_'.$row->_status); ?>
						</span>
					</td>
					
					<td class="status textC">
						<span class="<?php echo $row->_transaction_status; ?>">
						<?php echo lang('tran_status_'.$row->_transaction_status); ?>
						</span>
					</td>
					
					<td class="textC"><?php echo mdate('%d-%m-%Y',$row->created)?></td>
					
				</tr>
			<?php endforeach;?>	
		</tbody>
</table>
		