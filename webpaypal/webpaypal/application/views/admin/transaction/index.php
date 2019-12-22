<!-- head -->
<?php $this->load->view('admin/transaction/head', $this->data)?>

<div class="line"></div>

<div id="main_transaction" class="wrapper">
	<div class="widget">
	
		<div class="title">
			<span class="titleIcon"><input type="checkbox" name="titleCheck" id="titleCheck"></span>
			<h6>
				Danh sách giao dịch			
			</h6>
		 	<div class="num f12">Số lượng: <b><?php echo $total_rows?></b></div>
		</div>
		
		
		<table width="100%" cellspacing="0" cellpadding="0" id="checkAll" class="sTable mTable myTable">
			
			<thead class="filter"><tr><td colspan="9">
				<form class="list_filter form" action="<?php echo current_url(); ?>" method="get">
					<table cellpadding="0" cellspacing="0" width="100%"><tbody>
					
						<tr>
							<td class="label" style="width:60px;"><label for="filter_id"><?php echo lang('no.'); ?></label></td>
							<td class="item"><input name="id" value="<?php if(isset($filter['id'])){echo $filter['id'];}?>" id="filter_id" type="text" style="width:95px;" /></td>
							
							<td class="label" style="width:60px;"><label for="filter_type"><?php echo lang('tran_payment'); ?></label></td>
							<td class="item">
								<select name="payment">
									<option value=""></option>
									<option value='nganluong' <?php if(isset($filter['payment']) && $filter['payment']=='nganluong'){echo 'selected';}?>>Ngân lượng</option>
									<option value='baokim' <?php if(isset($filter['payment']) && $filter['payment']=='baokim'){echo 'selected';}?>>Bảo kim</option>
									<option value='dathang' <?php if(isset($filter['payment']) && $filter['payment']=='dathang'){echo 'selected';}?>>Đặt hàng</option>
								</select>
							</td>
							
							<td class="label" style="width:60px;"><label for="filter_created"><?php echo lang('from_date'); ?></label></td>
							<td class="item"><input name="created" value="<?php if($created){echo $created;}?>" id="filter_created" type="text" class="datepicker" /></td>

							
							<td colspan='2' style='width:60px'>
							<input type="submit" class="button blueB" value="<?php echo lang('filter')?>" />
							<input type="reset" class="basic" value="Reset" onclick="window.location.href = '<?php echo admin_url('transaction'); ?>'; ">
							</td>
							
						</tr>
						
						<tr>
						    <td class="label" style="width:60px;"><label for="filter_user"><?php echo lang('user'); ?></label></td>
							<td class="item"><input name="user" value="<?php if(isset($filter['user_id'])){echo $filter['user_id'];}?>" id="filter_user" class="tipS" title="<?php echo lang('note_enter_user_id')?>" type="text" /></td>

							<td class="label"><label for="filter_status"><?php echo lang('tran'); ?></label></td>
							<td class="item">
								<select name="status">
									<option></option>
									<option value='0' <?php if(isset($filter['status']) && $filter['status']=='0'){echo 'selected';}?>>Đợi xử lý</option>
									<option value='1' <?php if(isset($filter['status']) && $filter['status']=='1'){echo 'selected';}?>>Thành công</option>
									<option value='2' <?php if(isset($filter['status']) && $filter['status']=='2'){echo 'selected';}?>>Hủy bỏ</option>
								</select>
							</td>

							<td class="label"><label for="filter_created_to"><?php echo lang('to_date'); ?></label></td>
							<td class="item"><input name="created_to" value="<?php if($created_to){echo $created_to;}?>" id="filter_created_to" type="text" class="datepicker" /></td>

							<td class="label"></td>
							<td class="item"></td>
						</tr>
						
					</tbody></table>
				</form>
			</td></tr></thead>
			
			<thead>
				<tr>
					<td style="width:21px;"><img src="<?php echo public_url('admin/images')?>/icons/tableArrows.png"></td>
					<td style="width:60px;">Mã số</td>
					<td>Số tiền</td>
					<td>Cổng thanh toán</td>
					<td>Trạng thái</td>
					
					<td style="width:75px;">Ngày tạo</td>
					<td style="width:120px;">Hành động</td>
				</tr>
			</thead>
			
 			<tfoot class="auto_check_pages">
				<tr>
					<td colspan="7">
						 <div class="list_action itemActions">
								<a url="<?php echo admin_url('transaction/delete_all')?>" class="button blueB" id="submit" href="#submit">
									<span style="color:white;">Xóa hết</span>
								</a>
						 </div>
							
					     <div class="pagination">
					          <?php echo $this->pagination->create_links()?>
			             </div>
			             <div class="clear"></div>
					</td>
				</tr>
			</tfoot>
			
			<tbody class="list_item">
			     <?php foreach ($list as $row):?>
			     <tr class="row_<?php echo $row->id?>">
					<td><input type="checkbox" value="<?php echo $row->id?>" name="id[]"></td>
					
					<td class="textC"><?php echo $row->id?></td>
					
					<td>
					  <?php echo number_format($row->amount)?> đ					
					 </td>
				    <td><?php echo $row->payment?></td>
					<td>
					<?php 
					if($row->status == 0)
					{
					    echo 'Chưa thanh toán';
					}elseif ($row->status == 1)
					{
					    echo 'Đã thanh toán';
					}else{
					    echo 'Thanh toán thất bại';
					}
					?>
					</td>
					
					
					<td class="textC"><?php echo get_date($row->created)?></td>
					
					<td class="option textC">
						<a title="Xem chi tiết giao dịch" class="tipS lightbox" href="<?php echo admin_url('transaction/view/'.$row->id)?>">
								<img src="<?php echo public_url('admin/images')?>/icons/color/view.png">
						 </a>
						 
						<a class="tipS verify_action" title="Xóa" href="<?php echo admin_url('transaction/del/'.$row->id)?>">
						    <img src="<?php echo public_url('admin/images')?>/icons/color/delete.png">
						</a>
					</td>
				</tr>
				<?php endforeach;?>
		   </tbody>
			
		</table>
	</div>
	
</div>


