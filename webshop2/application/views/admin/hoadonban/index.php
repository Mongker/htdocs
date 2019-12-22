<div class="row">
	<ol class="breadcrumb">
		<li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
		<li class="active">Đơn đặt hàng</li>
	</ol>
</div><!--/.row-->

<div class="row">
	<div class="col-lg-12">
		<div class="panel panel-info">
			<div class="panel-heading">
			<div class="col-md-8">Quản lý hóa đơn bán</div>
			</div>
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-hover">
						<thead>
							<tr class="info">										
								<th class="text-center">STT</th>
								<th>ID_product</th>
								<th>ID_Transaction</th>
								<th>Số lượng</th>
								<th>Giá tiền</th>
								<th>Trạng thái</th>		
								<th>Hành động</th>
							</tr>
						</thead>
						<tbody>

							<?php 
								$stt = 0;
							foreach ($transaction as $value) { 
								$stt = $stt + 1;
								?>
								<tr>
									<td style="vertical-align: middle;text-align: center;"><strong><?php echo $stt; ?></strong></td>
									<td><strong><?php echo $value->product_id; ?></strong></td>
									<td><strong><?php echo $value->transaction_id; ?></strong>
									</td>
									<td><strong><?php echo $value->qty; ?></strong></td>
									<td><strong><?php echo number_format($value->amount); ?></strong> VNĐ</td>
									<td>
										<?php switch ($value->status) {
											case '0':
												echo "<p style='color:red'>Chưa trả tiền</p>";
												break;
											case '1':
												echo "<p style='color:green'>Đã trả tiền</p>";
												break;
											default:
												echo 'Chưa trả tiền';
												break;
										} ?>
									</td>

									<td class="list_td aligncenter">
							            <a href="<?php echo admin_url('hoadonban/detail/'.$value->transaction_id); ?>" title="Chi tiết"><span class="glyphicon glyphicon-list-alt"></span></a>&nbsp;&nbsp;&nbsp;
							            <a href="<?php echo admin_url('hoadonban/accept/'.$value->id); ?>" title="Update"> <span class="glyphicon glyphicon-refresh" onclick=" return confirm('Khách hàng đã thanh toán')"></span> <!-- </a>
							            <a href="<?php echo admin_url('hoadonban/del/'.$value->id); ?>" title="Xóa"> <span class="glyphicon glyphicon-remove" onclick=" return confirm('Bạn chắc chắn muốn xóa')"></span> </a> -->
								    </td>    
				                </tr>
							<?php } ?>

			    		</tbody>

					</table>

					   <?php echo $this->pagination->create_links(); ?>
					
					
				</div>
			</div>
		</div>
	</div>
</div><!--/.row-->
