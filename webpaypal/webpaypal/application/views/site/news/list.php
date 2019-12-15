<div class="box-center"><!-- The box-center news-->
             <div class="tittle-box-center">
		        <h2>Bài viết mới</h2>
		      </div>
		      <div class="box-content-center news"><!-- The box-content-center -->
		             <div class="list_news">
						    <?php if(empty($list)):?>
						           <h2 style='text-align:center'>Chưa có bài viết nào</h2>
						    <?php else:?>
								<?php foreach ($list as $row): ?>
									<div class="item_news">
										<div class="item_left">
											 <a href="<?php echo site_url('news/view/'.$row->id); ?>" title="<?php echo $row->title?>">
												<img class="item_img" src="<?php echo base_url('upload/news/'.$row->image_link)?>" alt="<?php echo $row->title; ?>" width="140" height="90">
											</a>
										</div>
										
										<div class="item_name link">
											<a href="<?php echo site_url('news/view/'.$row->id); ?>" title="<?php echo $row->title; ?>">
												<b><?php echo $row->title; ?></b>
											</a>
										</div>
											
										<div class="item_time">
											<?php echo mdate('%d-%m-%Y',$row->created)?> - <?php echo $row->count_view?> lượt xem
										</div>
										
										<div class="item_content">
											<?php echo $row->intro; ?>
										</div>
										<div class="clear"></div>
									</div>
								<?php endforeach; ?>
							<?php endif;?>
					</div>   
					 
		            <div class='clear'></div>
		            <div class='pagination'>
		            <?php echo $this->pagination->create_links();?>
		            </div>
		            <div class='clear'></div>
		      </div><!-- End box-content-center -->
</div>	<!-- End box-center news-->	   
 